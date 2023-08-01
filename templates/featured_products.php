<?php
require_once "src/home_files/get_featured.php";
?>

<div id="FeaturedProducts">
    <h3>Featured Products:</h3>
    <?php foreach ($featuredProducts as $product): ?>
        <div class="productCard">
            <img src="images/<?= htmlspecialchars($product['ProductImage']) ?>">
            <h3 class="ProductName"><?= htmlspecialchars($product['ProductName']) ?></h3>
            <p class="ProductPrice">$<?= number_format(htmlspecialchars($product['ProductPrice']), 2) ?></p>
        </div>
    <?php endforeach ?>
</div>
