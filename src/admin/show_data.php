<?php

require_once "src/config.php";
require_once "user.php";
require_once "customer.php";
require_once "payment.php";
require_once "order.php";
require_once "orderdetails.php";

session_start();

if (isset($_SESSION['username']))
{
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die ("Failed to connect to database.");

    $users = getUserData($connection);
    $customers = getCustomerData($connection);
    $payments = getPaymentData($connection);
    $orders = getOrderData($connection);
    $orderDetails = getOrderdetailsData($connection);

    $connection->close();
}
else
{
    $dataTables = "you do not have permission to view this page.";
}

function getOrderData($connection)
{
    $query = "SELECT * FROM orders";
    $result = $connection->query($query);
    $rows = $result->num_rows;

    $orders = array();
    for ($rowNum = 0; $rowNum < $rows; $rowNum++)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $orders[$rowNum] = new Order($row);
    }

    $result->close();

    return $orders;
}

function getCustomerData($connection)
{
    $query = "SELECT * FROM customer";
    $result = $connection->query($query);

    $rows = $result->num_rows;
    $customers = array();

    for ($rowNum = 0; $rowNum < $rows; $rowNum++)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $customers[$rowNum] = new Customer($row);
    }

    $result->close();

    return $customers;
}

function getOrderdetailsData($connection)
{
    $query = "SELECT * FROM orderdetails";
    $result = $connection->query($query);
    $rows = $result->num_rows;
    
    $orderDetails = array();
    for ($rowNum = 0; $rowNum < $rows; $rowNum++)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $orderDetails[$rowNum] = new OrderDetail($row);
    }

    $result->close();

    return $orderDetails;
}

function getUserData($connection)
{
    $query = "SELECT * FROM users";
    $result = $connection->query($query);

    $rows = $result->num_rows;
    $users = array();
    for ($rowNum = 0; $rowNum < $rows; $rowNum++)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $users[$rowNum] = new User($row);
    }

    $result->close();

    return $users;
}

function getPaymentData($connection)
{
    $query = "SELECT * FROM payment";
    $result = $connection->query($query);
    $rows = $result->num_rows;

    $payment = array();
    for ($rowNum = 0; $rowNum < $rows; $rowNum++)
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $payment[$rowNum] = new Payment($row);
    }

    $result->close();

    return $payment;
}


?>