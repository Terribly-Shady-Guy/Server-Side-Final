<?php

require_once "product_interface.php";

class StoreProduct
{
    private $productKey;
    private $image;
    private $name;
    private $description;
    private $price;
    private $invQty;

    public function __construct($productValues)
    {
        $this->productKey = $productValues['ProductKey'];
        $this->image = $productValues['ProductImage'];
        $this->name = $productValues['ProductName'];
        $this->description = $productValues['ProductDescription'];
        $this->price = $productValues['ProductPrice'];
        $this->invQty = $productValues['InventoryQty'];
    }

    public function createCard()
    {
        $productKey = htmlspecialchars($this->productKey);
        $image = htmlspecialchars($this->image);
        $name = htmlspecialchars($this->name);
        $description = htmlspecialchars($this->description);
        $price = htmlspecialchars($this->price);
        $price = "$" . number_format($price, 2);
        $invQty = htmlspecialchars($this->invQty);

        return <<<_END
        <div class="ProductCard">
            <img src="images/$image">
            <h3 class="ProductName">$name</h3>
            <p class="ProductDescription">$description</p>
            <p class="ProductQty">Items in stock: $invQty</p>
            <p class="ProductPrice">$price</p>
            <form class="AddCartForm" action="" method="post">
                <div class="FormRow">
                    <label>Qty:</label> 
                    <input type="text" name="Qty" size="3" maxlength="2" value="1" autocomplete="off">
                    <input type="hidden" name="Product" value="$productKey">
                    <button type="button" name="Add" class="Add">Add</button>
                </div>
                <div class="FormRow">
                    <button type="submit" name="update" class="Update" hidden formaction="update_form.php">Update</button>
                    <button type="submit" name="delete" class="Delete" hidden formaction="src/shop_files/delete_product.php">Delete</button>
                </div>
            </form>
        </div>
        _END;
    }
}

?>