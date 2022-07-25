<?php

require_once "src/config.php";
require_once "featured_product.php";

$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error) die("Failed to connect to database");

$query = "SELECT ProductImage, ProductName, ProductPrice FROM Products LIMIT 2";
$result = $connection->query($query);
if (!$result) die("Failed to retreive data.");

$rows = $result->num_rows;
$featuredProducts = array();

for ($rowNum = 0; $rowNum < $rows; $rowNum++)
{
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $featuredProducts[$rowNum] = new FeaturedProduct($row);
}

$result->close();
$connection->close();

?>