<?php
include_once "ErrorHandling.php";
include_once "ExceptionHandling.php";

$email = "ik@example.be";

try {
  try {
    if(strpos($email, "example") !== FALSE) {
      //throw exception if email is an example mail
      throw new Exception($email);
    }
  }
  catch(Exception $e) {
    echo("<p>First exception throw brings you here</p>");
    throw new MyException($email);
  }
}

catch (MyException $e) {
  echo("<p>Second exception throw results in:</p>");
  $e->HandleException();
}