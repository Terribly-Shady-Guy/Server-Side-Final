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
            <div id="CartContainer">
                <?php if (isset($_SESSION['cart'])): ?>
                    <?php foreach ($_SESSION['cart'] as $cartItem): ?>
                        <div class="CartItem">
                            <div class="CartItemCol">
                                <img src="images/<?= htmlspecialchars($cartItem->getImage()) ?>">
                            </div>
                            <div Class="CartItemCol">
                                <h3 class="ProductName"><?= htmlspecialchars($cartItem->getName()) ?></h3>
                                <p class="ProductDescription"><?= htmlspecialchars($cartItem->getDescription()) ?></p>
                                <p class="ProductQty"><?= htmlspecialchars($cartItem->getOrderQty()) ?></p>
                                <p class="ProductPrice"><?= htmlspecialchars($cartItem->getPrice()) ?></p>
                            </div>
                            <div class="CartItemCol">
                                <p class="ItemSubtotal">$<?= number_format($cartItem->getProductSubtotal(), 2) ?><p>
                                <form method="post" action="src/cart_files/remove_item.php">
                                    <input type="submit" name="remove" value="remove">
                                    <input type="hidden" name="Product" value="<?= htmlspecialchars($cartItem->getProductKey()) ?>">
                                </form>
                            </div>
                        </div>
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
        <?php require_once "templates/footer.php" ?>
    </body>
</html>
