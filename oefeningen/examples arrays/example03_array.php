<!doctype htlm>
<html>
<head>
	<meta charset="utf-8" />
    <title>Multidimensional array</title>
</head>
<body>
	<p>
<?php
	$cars=array(
		array("Volvo","Diesel","black"),
		array("BMW","Petrol","red"),
		array("Opel","Diesel","gray")
	);
	echo("<pre>");
	print_r($cars);
	echo("</pre>");
  
?>
	</p>
</body>
</html>
