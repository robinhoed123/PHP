<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
    <title>Read and write cookies</title>
</head>
<body>
	<?php
      if(isset($_POST["name"])) 
	  	$name=htmlspecialchars($_POST["name"]);
      else if(isset($_COOKIE["name"])) 
	  	$name= htmlspecialchars($_COOKIE["name"]);
    
      if(isset($name))
      {
         setcookie("name", $name, time()+60*60*24);  // Cookie is saved for 1 day;
         echo("<p>Welcome $name</p>");
      }
      else
      {
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >  
        <p>What's your name?    : <input type="text" name="name" /></p>
        <p><input type ="submit" name="send" value="send" /></p>
    </form>
<?php } ?>
</body>
</html>