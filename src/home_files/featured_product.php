<?php

require_once "src/product_classes/product_interface.php";

class FeaturedProduct implements ProductInterface
{
    private $image;
    private $name;
    private $price;

    public function __construct($productData)
    {
        $this->image = $productData['ProductImage'];
        $this->name = $productData['ProductName'];
        $this->price = $productData['ProductPrice'];
    }

    public function createCard()
    {
        $image = htmlspecialchars($this->image);
        $productName = htmlspecialchars($this->name);
        $price = htmlspecialchars($this->price);
        $price = "$" . number_format($price, 2);

        return <<<_END
            <div class="productCard">
                <img src="images/$image">
                <h3 class="ProductName">$productName</h3>
                <p class="ProductPrice">$price</p>
            </div>
        _END;
    }
}

?>