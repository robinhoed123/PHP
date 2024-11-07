<!doctype htlm>
<html>
<head>
	<meta charset="utf-8" />
    <title>Associative array</title>
</head>
<body>
	<p>
<?php
	$capital['DE'] = 'Berlin';
	$capital['BE']= "Brussels";
	$capital['ES']="Madrid";
	$capital['DK']="Copenhagen";
	$capital['FR']="Paris";
	$capital["GB"]="London";
	
	echo("<p>The capital of France is ".$capital['FR']."</p>");
  
?>
	</p>
</body>
</html>
