<?php
include_once "log.php";

try {
    $input = 5;
    if($input <= 10)
    {
        throw new Exception("Input value must be higher than 10!");
    }
    echo "The input was correct!";
} catch (Exception $e) {
    $log = new ErrorLog($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
    $log->WriteError();
    exit("Error: check the logfile for more info.");
}

?>