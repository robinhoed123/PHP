<?php
include_once "ExceptionHandling.php";

try {
    $input = 5;
    if($input <= 10)
    {
        throw new MyException("Input value must be higher than 10!");
    }
    echo "The input was correct!";
} catch (MyException $e) {
    $e->HandleException();
}

?>