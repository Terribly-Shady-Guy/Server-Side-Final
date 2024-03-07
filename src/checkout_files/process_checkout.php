<?php

require_once "../config.php";
require_once "../utils.php";
require_once "../product_classes/cart_product.php";

session_start();

if (validatePost() && isset($_SESSION['cart']) && isset($_SESSION['total']))
{
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die("Failed to connect to database");

    $orderKey = null;
    $total = round($_SESSION['total'], 2);
    $orderDate = date('Y-m-d', time());
    $customerKey = addCustomer($connection);
    $paymentKey = addPayment($connection, $customerKey);

    $stmt = $connection->prepare("INSERT INTO orders VALUES(?,?,?,?,?)");
    $stmt->bind_param("idsii", $orderKey, $total, $orderDate, $customerKey, $paymentKey);
    $stmt->execute();
    $stmt->close();
    
    $orderKey = $connection->insert_id;

    $stmt = $connection->prepare("INSERT INTO orderdetails VALUES(?,?,?)");

    foreach ($_SESSION['cart'] as $cartItem)
    {
        $productkey = $cartItem->getProductKey();
        $orderQty = $cartItem->getOrderQty();
        $stmt->bind_param("iii", $orderKey, $productkey, $orderQty);
        $stmt->execute();
    }

    $stmt->close();
    $connection->close();

    $_SESSION['order'] = $orderKey;
    unset($_SESSION['cart']);
    unset($_SESSION['total']);
    
    header("Location: ../../confirmation.php");
}
else
{
    header("Location: ../../index.php");
}

function validatePost(): bool {
    $postNames = array('FirstName', 'LastName', 'StreetAddress', 'City', 'State', 'Zip', 'CardNumber', 'CVV', 'ExpiryDate');
    foreach ($postNames as $postName) {
        if (!isset($_POST[$postName])) {
            return false;
        }
    }
    
    return true;
}

function addPayment(mysqli $connection, $customerKey): int {
    $paymentKey = null;
    $cardNumber = sanitizeInput($_POST['CardNumber'], $connection);
    $cvv = sanitizeInput($_POST['CVV'], $connection);
    $expiryDate = sanitizeInput($_POST['ExpiryDate'], $connection);
    
    $row = getPaymentKey($connection, $cardNumber);

    if (!empty($row)) {
        $paymentKey = $row['PaymentKey'];
    } else {
        $stmt = $connection->prepare("INSERT INTO Payment VALUES(?,?,?,?,?)");
        $stmt->bind_param('iisss', $paymentKey, $customerKey, $cardNumber, $cvv, $expiryDate);
        $stmt->execute();
        $stmt->close();
        
        $paymentKey = $connection->insert_id;
    }

    return $paymentKey;
}

function getPaymentKey(mysqli $connection, string $cardNumber): array {
    $stmt = $connection->prepare("SELECT PaymentKey FROM Payment WHERE CardNum = ?");
    $stmt->bind_param("s", $cardNumber);
    $stmt->execute();

    $result = $stmt->get_result();    
    if ($result == false) {
        $row = array();
    } else {
        $row = $result->fetch_array(MYSQLI_ASSOC);
    }

    $result->close();
    $stmt->close();
    
    return $row !== false && $row !== null ? $row : [];
}

function addCustomer(mysqli $connection): int {
    $customerKey = null;
    $firstName = sanitizeInput($_POST['FirstName'], $connection);
    $lastName = sanitizeInput($_POST['LastName'], $connection);
    $street = sanitizeInput($_POST['StreetAddress'], $connection);
    $city = sanitizeInput($_POST['City'], $connection);
    $state = sanitizeInput($_POST['State'], $connection);
    $zip = sanitizeInput($_POST['Zip'], $connection);
    
   $row = getCustomerKey($connection, $firstName, $lastName);

    if (!empty($row)) {
        $customerKey = $row['CustomerKey'];
    } else {  
        $stmt = $connection->prepare("INSERT INTO Customer VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("issssss", $customerKey, $firstName, $lastName, $street, $city, $state, $zip);
        $stmt->execute();
        $stmt->close();
    
        $customerKey = $connection->insert_id;
    }

    return $customerKey;
}

function getCustomerKey(mysqli $connection, string $firstName, string $lastName): array {
    $stmt = $connection->prepare("SELECT CustomerKey FROM Customer WHERE CustFirstName = ? AND CustLastName = ?");
    $stmt->bind_param("ss", $firstName, $lastName);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result == false) {
        $row = array();
    } else {
        $row = $result->fetch_array(MYSQLI_ASSOC);
    }

    $result->close();
    $stmt->close();
    
    return $row !== false && $row !== null ? $row : [];
}
