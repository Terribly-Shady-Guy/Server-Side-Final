<?php
require_once "src/admin/show_data.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta charset="utf-8">
    </head>
    <body>
        <style>
            table {
                width: 90%;
            }

            td, h3, h1 {
                text-align: center;
            }
        </style>
        <header>
            <h1>Admin Page</h1>
            <nav>
                <a href="index.php">To home</a>
                <a href="product_list.php">To shop</a>
            </nav>
        </header>
        <main>
            <?php require_once "templates/admin/users_table.php" ?>
            <?php require_once "templates/admin/customer_table.php" ?>
            <?php require_once "templates/admin/payment_table.php" ?>
            <?php require_once "templates/admin/orders_table.php" ?>
            <?php require_once "templates/admin/orderdetails_table.php" ?>
        </main>
    </body>
</html>
