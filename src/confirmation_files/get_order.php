<?php

require_once "src/config.php";
require_once "ordered_product.php";

session_start();

$orderKey = $_SESSION['order'];

if (isset($_SESSION['order']))
{
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

    $paymentKey = $order['PaymentKey'];

    $cardNumber = getCardNumber($connection, $paymentKey);

    $orderedProducts = getorderDetails($connection, $orderKey);

    $connection->close();
}
else
{
    header("Location: product_list.php");
}

function getOrder($connection, $orderKey)
{
    $query = "SELECT OrderDate, Total, CONCAT(CustFirstName,' ', CustLastName) AS CustName, CONCAT(CustStreetAddress,' ', CustCity, ', ', CustState, ', ', CustZip) AS CustAddress, PaymentKey FROM Orders INNER JOIN Customer ON Customer.CustomerKey = Orders.CustomerKey WHERE OrderKey = $orderKey";
    $result = $connection->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $result->close();

    return $row;
}

function getCardNumber($connection, $paymentKey)
{
    $query = "SELECT CardNum FROM payment WHERE PaymentKey = $paymentKey";
    $result = $connection->query($query);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $result->close();

    return htmlspecialchars($row['CardNum']);
}

function getorderDetails($connection, $orderKey)
{
    $query = "SELECT ProductName, ProductPrice, OrderQty FROM orderdetails INNER JOIN products ON orderdetails.ProductKey = products.ProductKey WHERE OrderKey = $orderKey";
    $result = $connection->query($query);
    $rows = $result->num_rows;

    $orderedProducts = array();
    for ($rowNum = 0; $rowNum < $rows; $rowNum++)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $orderedProducts[$rowNum] = new OrderedProduct($row);
    }

    $result->close();

    return $orderedProducts;
}

?>