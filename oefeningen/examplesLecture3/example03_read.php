<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>reading file</title>
</head>

<body>
<?php
	$filename = "file.txt";
	$file=@fopen($filename,"r")or die("File $filename not found");
	echo("<p>");
	while(!feof($file))
	{
		$line=fgets($file);
		echo($line);
	}
	
	fclose($file);
	
	echo("</p>");
	
	$file=@fopen($filename,"r")or die("File $filename not found");
	echo("<p>");
	while(!feof($file))
	{
		$line=fgets($file);
		echo($line."<br />");
	}
	
	fclose($file);
	
	echo("</p>");
	
?>
</body>
</html>