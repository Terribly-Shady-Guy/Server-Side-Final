<?php

function sanitizeInput($string, $connection)
{
    $string = strip_tags($string);
    $string = htmlentities($string);
    $string = stripslashes($string);
    return $connection->real_escape_string($string);
}

function validateInt($number)
{
    return filter_var($number, FILTER_VALIDATE_INT) && $number > 0;
}

function validateFloat($number)
{
    return filter_var($number, FILTER_VALIDATE_FLOAT) && $number > 0;
}
