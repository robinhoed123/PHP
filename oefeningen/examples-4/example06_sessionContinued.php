<?php
  session_start();
?>
<!doctype html>
<html>
<head>
  <meta charset='utf-8' />
  <title>PHP and SESSION</title>
</head>

<body>
  <h2>PHP and SESSION: continued</h2>
  <?php
  echo("<pre>");
	print_r($_SESSION);
	echo("</pre>");
  
  if(isset($_SESSION["name"]))
  {
	  $name= htmlspecialchars($_SESSION["name"]);
  
  	echo("<p>Hello <strong> $name </strong>, as you can see, your are still known on this page</p>");
  }
  else
  {
	  echo("<p>First go to the <a href=\"example05_sessions_2.php\">starting page</a></p>");
  }
  
?>

</body>
</html>