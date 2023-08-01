<?php
require_once "src/shop_files/get_products.php";
?>

<div id="GridWrapper">
    <?php foreach ($products as $product): ?>
        <div class="ProductCard">
            <img src="images/<?= htmlspecialchars($product['ProductImage']) ?>">
            <h3 class="ProductName"><?= htmlspecialchars($product['ProductName']) ?></h3>
            <p class="ProductDescription"><?= htmlspecialchars($product['ProductDescription']) ?></p>
            <p class="ProductQty">Items in stock: <?= htmlspecialchars($product['InventoryQty']) ?></p>
            <p class="ProductPrice">$<?= number_format(htmlspecialchars($product['ProductPrice']), 2) ?></p>
            <form class="AddCartForm" action="" method="post">
                <div class="FormRow">
                    <label>Qty:</label> 
                    <input type="text" name="Qty" size="3" maxlength="2" value="1" autocomplete="off">
                    <input type="hidden" name="Product" value="<?= htmlspecialchars($product['ProductKey']) ?>">
                    <button type="button" name="Add" class="Add">Add</button>
                </div>
                <div class="FormRow">
                    <button type="submit" name="update" class="Update" hidden formaction="update_form.php">Update</button>
                    <button type="submit" name="delete" class="Delete" hidden formaction="src/shop_files/delete_product.php">Delete</button>
                </div>
            </form>
        </div>
    <?php endforeach ?>
</div>
