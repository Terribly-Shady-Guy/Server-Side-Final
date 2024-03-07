<?php
require_once "src/home_files/get_featured.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home Page</title>
        <link rel="stylesheet" href="styles/index_layout.css">
        <link rel="stylesheet" href="styles/style.css">
    </head>
    <body>
        <?php require_once "templates/header.php" ?>
        <main>
            <div id="Overview">
                <h1>Welcome to Gamers' Emporium!</h1>
                <p>Welcome to Gamers' Emporium! We offer a variety of gaming related merchandise such as figurines and posters. 
                    Our merchandise is the perfect gift for a birthday or christmas. </p>
                <p>Take a look at the featurd products on this page for an overview of our recommendations. 
                    We hope you enjoy the merchandise we have to offer! -Gamer Emporium</p>
            </div>
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
        </main>
        <?php require_once "templates/footer.php" ?>
    </body>
</html>
