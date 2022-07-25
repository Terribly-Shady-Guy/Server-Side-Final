<?php

class OrderedProduct
{
    private $name;
    private $price;
    private $orderQty;

    public function __construct($productData)
    {
        $this->name = $productData['ProductName'];
        $this->price = $productData['ProductPrice'];
        $this->orderQty = $productData['OrderQty'];
    }

    public function createRow()
    {
        $name = htmlspecialchars($this->name);
        $price = htmlspecialchars($this->price);
        $price = "$" . number_format($price, 2);
        $orderedQty = htmlspecialchars($this->orderQty);
    
        return <<<_END
        <tr>
            <td>$name</td>
            <td>$price</td>
            <td>$orderedQty</td>
        </tr>
        _END;
    }
}

?>