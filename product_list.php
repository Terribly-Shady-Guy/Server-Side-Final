<?php
require_once "src/shop_files/show_products.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Shop</title>
        <link rel="stylesheet" href="styles/product_list_layout.css">
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <?php require_once "templates/header.php" ?>
        <main>
            <p id="CartLink"><a href="shopping_cart.php">To Cart</a></p>
            <p id="AddProductLink" hidden><a href="product_form.php">Add product</a></p>
            <div id="GridWrapper">
                <?php foreach ($products as $product): ?>
                    <?= $product->createCard(); ?>
                <?php endforeach; ?>
            </div>
        </main>
        <?php require_once "templates/footer.php" ?>
        <script src="js/login.js"></script>
        <script src="js/add_cart.js"></script>
    </body>
</html>
