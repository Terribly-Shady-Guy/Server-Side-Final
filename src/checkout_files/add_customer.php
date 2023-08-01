<?php

require_once "../utils.php";

function addCustomer($connection)
{
    $customerKey = null;
    $firstName = sanitizeInput($_POST['FirstName'], $connection);
    $lastName = sanitizeInput($_POST['LastName'], $connection);
    $street = sanitizeInput($_POST['StreetAddress'], $connection);
    $city = sanitizeInput($_POST['City'], $connection);
    $state = sanitizeInput($_POST['State'], $connection);
    $zip = sanitizeInput($_POST['Zip'], $connection);
    
   $row = getCustomerKey($connection, $firstName, $lastName);

    if (!empty($row))
    {
        $customerKey = $row['CustomerKey'];
    }
    else
    {
        
        $stmt = $connection->prepare("INSERT INTO Customer VALUES(?,?,?,?,?,?,?)");
        $stmt->bind_param("issssss", $customerKey, $firstName, $lastName, $street, $city, $state, $zip);
        $stmt->execute();
        $stmt->close();
    
        $customerKey = $connection->insert_id;
    }

    return $customerKey;
}

function getCustomerKey($connection, $firstName, $lastName)
{
    $stmt = $connection->prepare("SELECT CustomerKey FROM Customer WHERE CustFirstName = ? AND CustLastName = ?");
    $stmt->bind_param("ss", $firstName, $lastName);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result == false)
    {
        $row = array();
    }
    else
    {
        $row = $result->fetch_array(MYSQLI_ASSOC);
    }

    $result->close();
    $stmt->close();
    
    return $row;
}
