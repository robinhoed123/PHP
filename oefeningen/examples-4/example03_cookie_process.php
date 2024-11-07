<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
    <title>Read and write cookies</title>
</head>
<body>
	<?php
      if(!empty($_POST["name"])) 
	  	  $name=htmlspecialchars($_POST["name"]);
      else if(isset($_COOKIE["name"])) 
	  	  $name= htmlspecialchars($_COOKIE["name"]);
    
      if(isset($name)) {
        setcookie("name", $name, time()+60*60*24);  // Cookie is saved for 1 day;
        echo("<p> Your name was saved! You can now move on to the <a href='example03_cookie_show.php'>next</a> page</p>");
      }
      else {
		    header('Location:example03_cookie_session.php');
	    }
	 ?>
</body>
</html>