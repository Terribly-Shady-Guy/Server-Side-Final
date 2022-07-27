<?php

class Customer
{
    private $customerKey;
    private $firstName;
    private $lastName;
    private $streetAddress;
    private $city;
    private $state;
    private $zip;

    public function __construct($customerData)
    {
        $this->customerKey = $customerData['CustomerKey'];
        $this->firstName = $customerData['CustFirstName'];
        $this->lastName = $customerData['CustLastName'];
        $this->streetAddress = $customerData['CustStreetAddress'];
        $this->city = $customerData['CustCity'];
        $this->state = $customerData['CustState'];
        $this->zip = $customerData['CustZip'];
    }

    public function createRow()
    {
        $customerKey = htmlspecialchars($this->customerKey);
        $firstName = htmlspecialchars($this->firstName);
        $lastName = htmlspecialchars($this->lastName);
        $streetAddress = htmlspecialchars($this->streetAddress);
        $city = htmlspecialchars($this->city);
        $state = htmlspecialchars($this->state);
        $zip = htmlspecialchars($this->zip);

        return <<<_END
        \n<tr>
            <td>$customerKey</td>
            <td>$firstName</td>
            <td>$lastName</td>
            <td>$streetAddress</td>
            <td>$city</td>
            <td>$state</td>
            <td>$zip</td>
            <td>
                <form method="post" action="src/admin/delete_customer.php">
                    <input type="submit" name="deleteCustomer" value="Delete">
                    <input type="hidden" name="CustomerKey" value="$customerKey">
                </form>
            </td>
        </tr>
        _END;
    }
}

?>