<?php

require_once "src/config.php";
require_once "src/product_classes/store_product.php";

$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error) die("Failed to connect to database");

$query = "SELECT * FROM Products";
$result = $connection->query($query);
if(!$result) die("Failed to retreive product data");

$rows = $result->num_rows;
$products = array();

for ($rowNum = 0; $rowNum < $rows; $rowNum++)
{
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $products[$rowNum] = new StoreProduct($row);
}

$result->close();
$connection->close();

?>