<?php
  require("header.php");
  echo("\t<h2>Form with php processing</h2>\n");
  if(isset($_POST["name"]))
  {
    $name = $_POST["name"];  
    echo("\t<h3>Processing the form data</h3>\n");
    echo("\Hello <strong>$name</strong>, welcome on our site.<br />\n");
  }
  else
  {
    echo("\t<hr />\n");
    echo("\t<form method=\"post\" action=\"\" >\n");
    echo("\t\t<p>name    : <input type=\"text\" name=\"name\" /></p>\n");
    echo("\t\t<p>\n\t\t\t<input type =\"submit\" value=\"send\" />\n");
    echo("\t\t\t<input type =\"reset\" />\n\t\t</p>\n");
    echo("\t</form>\n\t<hr />\n");
  }
  require("footer.php");
?>
