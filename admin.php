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
        <h1>Admin Page</h1>
        <a href="index.php">To home</a>
        <a href="product_list.php">To shop</a>
        <h3>Users</h3>
        <table>
            <tr>
                <th>UserKey</th>
                <th>Username</th>
                <th>UserPassword</th>
                <th>AccountType</th>
                <th>UserFirstName</th>
                <th>UserLastName</th>
                <th>UserEmail</th>
                <th>Delete</th>
            </tr>
            <?php
                if (isset($users))
                {
                    foreach ($users as $user)
                    {
                        echo $user->createRow();
                    }
                }
            ?>
        </table>
        <h3>Customers</h3>
        <table>
            <tr>
                <th>CustomerKey</th>
                <th>CustFirstName</th>
                <th>CustLastName</th>
                <th>CustStreetAddress</th>
                <th>CustCity</th>
                <th>CustState</th>
                <th>CustZip</th>
                <th>Delete</th>
            </tr>
            <?php
                if (isset($customers))
                {
                    foreach ($customers as $customer)
                    {
                        echo $customer->createRow();
                    }
                }
            ?>
        </table>
        <h3>Payment</h3>
        <table>
            <tr>
                <th>PaymentKey</th>
                <th>CustomerKey</th>
                <th>CardNum</th>
                <th>CVV</th>
                <th>ExpiryDate</th>
                <th>Delete</th>
            </tr>
            <?php
                if (isset($payments))
                {
                    foreach ($payments as $payment)
                    {
                        echo $payment->createRow();
                    }
                }
            ?>
        </table>
        <h3>Orders</h3>
        <table>
            <tr>
                <th>OrderKey</th>
                <th>Total</th>
                <th>OrderDate</th>
                <th>CustomerKey</th>
                <th>PaymentKey</th>
                <th>Delete</th>
            </tr>
            <?php
                if (isset($orders))
                {
                    foreach ($orders as $order)
                    {
                        echo $order->createRow();
                    }
                }
            ?>
        </table>
        <h3>OrderDetails</h3>
        <table>
            <tr>
                <th>OrderKey</th>
                <th>ProductKey</th>
                <th>OrderQty</th>
                <th>Delete</th>
            </tr>
            <?php
                if (isset($orderDetails))
                {
                    foreach ($orderDetails as $orderDetail)
                    {
                        echo $orderDetail->createRow();
                    }
                }
            ?>
        </table>
    </body>
</html>
