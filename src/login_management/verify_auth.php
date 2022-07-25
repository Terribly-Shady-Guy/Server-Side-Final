<?php

session_start();

$response = Array();

if (isset($_SESSION['username']))
{
    $response['auth'] = true;
    $response['username'] = $_SESSION['username'];
}
else
{
    $response['auth'] = false;
}

echo json_encode($response);

?>