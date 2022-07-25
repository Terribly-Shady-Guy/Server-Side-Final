<?php

require_once "product_interface.php";

class CartProduct implements ProductInterface
{
    private $productKey;
    private $image;
    private $name;
    private $description;
    private $price;
    private $orderQty;

    public function __construct($productValues, $orderQty)
    {
        $this->productKey = $productValues['ProductKey'];
        $this->image = $productValues['ProductImage'];
        $this->name = $productValues['ProductName'];
        $this->description = $productValues['ProductDescription'];
        $this->price = $productValues['ProductPrice'];
        $this->orderQty = $orderQty;
    }

    public function getProductKey()
    {
        return $this->productKey;
    }

    public function getProductSubtotal()
    {
        return $this->price * $this->orderQty;
    }

    public function getOrderQty()
    {
        return $this->orderQty;
    }

    public function addOrderQty($orderQty)
    {
        $this->orderQty += $orderQty;
    }

    public function createCard()
    {
        $productKey = htmlspecialchars($this->productKey);
        $image = htmlspecialchars($this->image);
        $name = htmlspecialchars($this->name);
        $description = htmlspecialchars($this->description);
        $price = htmlspecialchars($this->price);
        $price = "$" . number_format($price, 2);
        $orderQty = htmlspecialchars($this->orderQty);

        $subtotal = $this->getProductSubtotal();
        $subtotal = "$" . number_format($subtotal, 2);

        return <<<_END
        <div class="CartItem">
            <div class="CartItemCol">
                <img src="images/$image">
            </div>
            <div Class="CartItemCol">
                <h3 class="ProductName">$name</h3>
                <p class="ProductDescription">$description</p>
                <p class="ProductQty">$orderQty</p>
                <p class="ProductPrice">$price</p>
            </div>
            <div class="CartItemCol">
                <p class="ItemSubtotal">$subtotal<p>
                <form method="post" action="src/cart_files/remove_item.php">
                    <input type="submit" name="remove" value="remove">
                    <input type="hidden" name="Product" value="$productKey">
                </form>
            </div>
        </div>\n
        _END;
    }
}

?>