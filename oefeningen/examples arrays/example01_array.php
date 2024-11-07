<!doctype htlm>
<html>
<head>
	<meta charset="utf-8" />
    <title>Indexed array</title>
</head>
<body>
	<p>
<?php
	$cars=array("Volvo","BMW","Toyota");
	$arrlength = count($cars);
	
	for($i=0;$i<$arrlength;$i++)
	{
		echo("$cars[$i]");
		echo("<br />");
	}
  
?>
	</p>
</body>
</html>
