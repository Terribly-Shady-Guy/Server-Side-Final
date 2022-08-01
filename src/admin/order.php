<?php

require_once "admin_model_interface.php";

class Order implements AdminModelInterface
{
    private $orderKey;
    private $total;
    private $date;
    private $customerKey;
    private $paymentKey;

    public function __construct($orderData)
    {
        $this->orderKey = $orderData['OrderKey'];
        $this->total = $orderData['Total'];
        $this->date = $orderData['OrderDate'];
        $this->customerKey = $orderData['CustomerKey'];
        $this->paymentKey = $orderData['PaymentKey'];
    }

    public function createRow()
    {
        $orderKey = htmlspecialchars($this->orderKey);
        $total = htmlspecialchars($this->total);
        $orderDate = htmlspecialchars($this->date);
        $customerKey = htmlspecialchars($this->customerKey);
        $paymentKey = htmlspecialchars($this->paymentKey);

        return <<<_END
        \n<tr>
            <td>$orderKey</td>
            <td>$total</td>
            <td>$orderDate</td>
            <td>$customerKey</td>
            <td>$paymentKey</td>
            <td>
                <form method="post" action="src/admin/delete_order.php">
                    <input type="submit" value="Delete">
                    <input type="hidden" name="orderKey" value="$orderKey">
                </form>
            </td>
        </tr>
        _END;
    }
}

?>