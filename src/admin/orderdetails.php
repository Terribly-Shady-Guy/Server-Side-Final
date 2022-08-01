<?php

require_once "admin_model_interface.php";

class OrderDetail implements AdminModelInterface
{
    private $orderKey;
    private $productKey;
    private $orderQty;

    public function __construct($orderDetails)
    {
        $this->orderKey = $orderDetails['OrderKey'];
        $this->productKey = $orderDetails['ProductKey'];
        $this->orderQty = $orderDetails['OrderQty'];
    }

    public function createRow()
    {
        $orderKey = htmlspecialchars($this->orderKey);
        $productKey = htmlspecialchars($this->productKey);
        $orderQty = htmlspecialchars($this->orderQty);

        return <<<_END
        \n<tr>
            <td>$orderKey</td>
            <td>$productKey</td>
            <td>$orderQty</td>
            <td>
                <form method="post" action="src/admin/delete_orderdetails.php">
                    <input type="submit" value="Delete">
                    <input type="hidden" name="OrderKey" value="$orderKey">
                    <input type="hidden" name="ProductKey" value="$productKey">
                </form>
            </td>
        </tr>
        _END;
    }
}

?>