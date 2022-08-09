<?php
require_once "html_utils.php";
require_once "src/confirmation_files/get_order.php";
require_once "src/confirmation_files/ordered_product.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Confirmation</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/confirmation_layout.css">
    </head>
    <body>
        <div id="Content">
            <header>
                <h1>Order Confirmation</h1>
            </header>
            <main>
                <p><a href="index.php">Return to home page</a></p>
                <table id="OrderInfo">
                    <tr>
                        <td>Order Number:</td>
                        <td><?= $orderKey ?></td>
                    </tr>
                    <tr>
                        <td>Order Date:</td>
                        <td><?= $orderDate ?></td>
                    </tr>
                    <tr>
                        <td>Total:</td>
                        <td><?= $total ?></td>
                    </tr> 
                    <tr>
                        <td>Name:</td>
                        <td><?= $fullName ?></td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td><?= $address ?></td>
                    </tr>
                    <tr>
                        <td>Card Number:</td>
                        <td><?= $cardNumber ?></td>
                    </tr>
                </table>
                <table id="OrderedProducts">
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Ordered Qty</th>
                    </tr>
                    <?php foreach ($orderedProducts as $product): ?>
                        <?= $product->createRow(); ?>
                    <?php endforeach; ?>
                </table>
            </main>
            <?= $footer ?>
        </div>
    </body>
</html>
