<?php

require_once "product_interface.php";

class CartProduct implements ProductInterface {
    private $productKey;
    private $image;
    private $name;
    private $description;
    private $price;
    private $orderQty;

    public function __construct($productValues, $orderQty) {
        $this->productKey = $productValues['ProductKey'];
        $this->image = $productValues['ProductImage'];
        $this->name = $productValues['ProductName'];
        $this->description = $productValues['ProductDescription'];
        $this->price = $productValues['ProductPrice'];
        $this->orderQty = $orderQty;
    }

    public function getProductKey() {
        return $this->productKey;
    }

    public function getImage() {
        return $this->image;
    }

    public function getPrice() {
        return "$" . number_format($this->price, 2);
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getOrderQty() {
        return $this->orderQty;
    }

    public function addOrderQty($orderQty) {
        $this->orderQty += $orderQty;
    }

    public function getProductSubtotal() {
        return $this->price * $this->orderQty;
    }
}
