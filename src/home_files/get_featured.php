<?php

require_once "src/config.php";

$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error) die("Failed to connect to database");

$query = "SELECT ProductImage, ProductName, ProductPrice FROM Products LIMIT 2";
$result = $connection->query($query);
if (!$result) die("Failed to retreive data.");

$featuredProducts = $result->fetch_all(MYSQLI_ASSOC);

$result->close();
$connection->close();
