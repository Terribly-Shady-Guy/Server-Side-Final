<?php
require_once "html_utils.php";
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
        <?= $header ?>
        <main>
            <div id="CartContainer">
                <?php if (isset($_SESSION['cart'])): ?>
                    <?php foreach ($_SESSION['cart'] as $cartItem): ?>
                        <?= $cartItem->createCard(); ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
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
        <?= $footer ?>
        <?= $loginScript ?>
    </body>
</html>
