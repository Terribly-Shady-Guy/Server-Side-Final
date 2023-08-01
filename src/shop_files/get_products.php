<?php

require_once "src/config.php";

$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error) die("Failed to connect to database");

$query = "SELECT * FROM Products";
$result = $connection->query($query);
if(!$result) die("Failed to retreive product data");

$rows = $result->num_rows;
$products = $result->fetch_all(MYSQLI_ASSOC);

$result->close();
$connection->close();