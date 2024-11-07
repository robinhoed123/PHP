<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>error handling</title>
</head>

<body>
<?php
	$file=@fopen("text.txt","r") or die("Unable to open file");
?>
</body>
</html>