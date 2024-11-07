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
     <p>Add blog</p>
     <p><textarea rows=10 cols=20 name="text"></textarea>
     </p>
     <p>
     	<input type ="submit" name="send" value="save entry" />
     	<input type ="reset" value="reset"/>
     </p>
  </form>
  <hr />
<?php
  if (isset($_POST["send"]))
  {
  	  if (isset($_POST["text"]) && $_POST["text"]!="")
	  {
		echo("<h2>Thanks for your contribution:</h2>");
		echo("<p>".htmlspecialchars($_POST['text'])."</p>");
	  }
  	  else
	  {
		echo ("<p>Please fill in all fields.</p>");
	  }
  }
?>
</body>
</html>
