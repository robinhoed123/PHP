<?php

function handleErrors($errno, $errMsg, $errFile, $errLine) {
	$error = "[ " . $errno . " ]: ";
    $error .= $errMsg;
	$error .= " in file " . $errFile;
	$error .= " on line " . $errLine ."\n";
	
	echo $error;
    exit();
}

set_error_handler("handleErrors");

$input = 5;
if($input <= 10)
{
    trigger_error("Input value must be higher than 10!");
}

?>