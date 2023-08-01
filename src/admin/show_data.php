<?php

require_once "src/config.php";

session_start();

if (isset($_SESSION['username']))
{
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die ("Failed to connect to database.");

    $users = getDataFromSql("SELECT * FROM users", $connection);
    $customers = getDataFromSql("SELECT * FROM customer", $connection);
    $payments = getDataFromSql("SELECT * FROM payment", $connection);
    $orders = getDataFromSql("SELECT * FROM orders", $connection);
    $orderDetails = getDataFromSql("SELECT * FROM orderdetails", $connection);

    $connection->close();
}
else
{
    die("you do not have permission to view this page.");
}

function getDataFromSql(string $sql, mysqli $connection): array {
    $result = $connection->query($sql);
    if ($result === false || $result->num_rows < 0) {
        return [];
    }

    return $result->fetch_all(MYSQLI_ASSOC);
}
