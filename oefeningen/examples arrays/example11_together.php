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
     <p>Name    : <input type="text" name="name" /></p>
     <p>Gender:
     	<input type = "radio" name="gender" value="female" /> Female
     	<input type = "radio" name="gender" value="male" /> Male
     </p>
     <p>
     	<input type ="submit" name="send" value="send" />
     	<input type ="reset" value="reset" />
     </p>
  </form>
  <hr />
<?php
	if (isset($_POST["send"])) {
		if (isset($_POST["gender"]) && isset($_POST["name"]) && $_POST["name"]!="") {
			$name = $_POST["name"];
			$gender = $_POST["gender"];
			if ($gender == "female") 
				echo('<p>Hello Mrs ');
			else 
				echo('Hello sir ');
			echo("<strong> $name </strong>, welcome on our site.</p>");
		}
		else {
			echo ("<p>Please fill in all fields.</p>");
		}
	}
?>
</body>
</html>
