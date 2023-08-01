<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

?>

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
