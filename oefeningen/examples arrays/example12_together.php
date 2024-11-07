<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title></title>
</head>
<body>
  <h2>Form with PHP processing</h2>
  <hr />
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >  
     <p>name    : <input type="text" name="name" value="<?php if (isset($_POST["name"])) { echo($_POST["name"]);} ?>" /></p>
     <p>
     	Gender:
     	<input type = "radio" name="gender" value="female" <?php if (isset ($_POST["gender"]) && $_POST["gender"]=="female"){echo " checked=\"checked\"";}?> /> female
     	<input type = "radio" name="gender" value="male" <?php if (isset ($_POST["gender"]) && $_POST["gender"]=="male"){echo " checked=\"checked\"";}?> /> male
     </p>
     <p><input type ="submit" name="send" value="send" /> </p>
  </form>  
  <hr />
<?php
  if (isset($_POST["send"])) {
	  if (isset($_POST["gender"]) && isset($_POST["name"]) && $_POST["name"]!="") {
      if ( $_POST["gender"] == "female") 
        echo('<p>Hello Mrs ');
      else 
        echo('<p>Hello sir ');
		  echo("<strong>". $_POST["name"]." </strong>, welcome on our site.</p>");
	  }
	  else { 
		  echo ("<p>Please fill in all fields.</p>");
	  }
  }
?>
