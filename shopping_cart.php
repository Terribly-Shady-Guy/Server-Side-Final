<?php
require_once "src/cart_files/calculate_totals.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shopping Cart</title>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/shopping_cart_layout.css">
    </head>
    <body>
        <?php require_once "templates/header.php" ?>
        <main>
            <?php require_once "templates/cart_list.php" ?>
            <div id="Details">
                <div class="DetailsCol">
                    <p>Subtotal:</p>
                    <p>Tax:</p>
                    <p>Total:</p>
                </div>
                <div class="DetailsCol">
                    <p><?= $subtotal ?></p>
                    <p><?= $tax ?></p>
                    <p><?= $total ?></p>
                </div>
                <div class="DetailsCol">
                    <p><a href="checkout.php">Proceed to Checkout</a></p>
                </div>
            </div>
        </main>
        <?php require_once "templates/footer.php" ?>
    </body>
</html>
