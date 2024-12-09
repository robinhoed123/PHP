<?php
// process_get_post.php

  $name = $_REQUEST['name'];
  echo("Hello $name. \n");
  echo("The methode used was: ".$_SERVER['REQUEST_METHOD']);
?>
