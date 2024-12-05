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

echo $test;

?>