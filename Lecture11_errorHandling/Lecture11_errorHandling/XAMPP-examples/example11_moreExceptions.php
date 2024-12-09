<?php
include_once "ErrorHandling.php";
include_once "ExceptionHandling.php";

$email = "me@example.be";

try {
    //first check
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
      //throw exception if email is not valid
      throw new MyException("not a valid email address".$email);
    }
    //check if "example" is part of the email
    if(strpos($email, "example") !== FALSE) {
      //throw standard exception if 'example' is part of the mail
      throw new Exception("$email is an example e-mail");
    }
  }
  
  catch (MyException $e) {
    $e->HandleException();
  }
  
  catch(Exception $e) {
    echo $e->getMessage();
  }
?>