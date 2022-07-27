<?php

class Payment
{
    private $paymentKey;
    private $customerKey;
    private $cardNumber;
    private $cvv;
    private $expiryDate;

    public function __construct($paymentData)
    {
        $this->paymentKey = $paymentData['PaymentKey'];
        $this->customerKey = $paymentData['CustomerKey'];
        $this->cardNumber = $paymentData['CardNum'];
        $this->cvv = $paymentData['CVV'];
        $this->expiryDate = $paymentData['ExpiryDate'];
    }

    public function createRow()
    {
        $paymentKey = htmlspecialchars($this->paymentKey);
        $customerKey = htmlspecialchars($this->customerKey);
        $cardNumber = htmlspecialchars($this->cardNumber);
        $cvv = htmlspecialchars($this->cvv);
        $expiryDate = htmlspecialchars($this->expiryDate);

        return <<<_END
        \n<tr>
            <td>$paymentKey</td>
            <td>$customerKey</td>
            <td>$cardNumber</td>
            <td>$cvv</td>
            <td>$expiryDate</td>
            <td>
                <form method="post" action="src/admin/delete_payment.php">
                    <input type="submit" name="DeletePayment" value="Delete">
                    <input type="hidden" name="PaymentKey" value="$paymentKey">
                </form>
            </td>
        </tr>
        _END;
    }
}

?>