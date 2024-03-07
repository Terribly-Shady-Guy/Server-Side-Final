<?php

require_once "src/config.php";

session_start();

if (isset($_SESSION['order']))
{
    $orderKey = $_SESSION['order'];

    if (isset($_SESSION['username']))
    {
        unset($_SESSION['order']);
    }
    else
    {
        session_destroy();
    }

    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die("Failed to connect to database");

    $order = getOrder($connection, $orderKey);

    $orderDate = htmlspecialchars($order['OrderDate']);
    $total = htmlspecialchars($order['Total']);
    $total = "$" . number_format($total, 2);
    $fullName = htmlspecialchars($order['CustName']);
    $address = htmlspecialchars($order['CustAddress']);
    $cardNumber = htmlspecialchars($order['CardNum']);

    $orderedProducts = getOrderDetails($connection, $orderKey);

    $connection->close();
}
else
{
    header("Location: product_list.php");
}

function getOrder(mysqli $connection, $orderKey): array
{
    $query = "SELECT OrderDate,
                    Total, 
                    CONCAT(CustFirstName,' ', CustLastName) AS CustName, 
                    CONCAT(CustStreetAddress,' ', CustCity, ', ', CustState, ', ', CustZip) AS CustAddress,
                    CardNum 
                FROM Orders
                INNER JOIN payment
                     ON payment.PaymentKey = Orders.PaymentKey
                INNER JOIN Customer 
                    ON Customer.CustomerKey = Orders.CustomerKey 
                WHERE OrderKey = $orderKey";

    $result = $connection->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $result->close();

    if ($row === false) {
        return [];
    }

    return $row;
}

function getOrderDetails(mysqli $connection, $orderKey): array
{
    $query = "SELECT ProductName, 
                    ProductPrice, 
                    OrderQty 
                FROM orderdetails 
                INNER JOIN products 
                    ON orderdetails.ProductKey = products.ProductKey 
                WHERE OrderKey = $orderKey";
                    
    $result = $connection->query($query);

    return $result->fetch_all(MYSQLI_ASSOC);
}
