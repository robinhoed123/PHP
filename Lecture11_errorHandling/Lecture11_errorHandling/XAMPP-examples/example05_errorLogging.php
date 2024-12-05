<?php

include_once "ErrorHandling.php";

$input = 5;
if($input <= 10)
{
    trigger_error("Input value must be higher than 10!");
}

?>