<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>reading XML file</title>
</head>

<body>
<?php
	$books=simplexml_load_file("example08_XML_books.xml") or die("Error:cannot create object");
	echo("<pre>");
	print_r($books);
	echo("</pre>");
?>
</body>
</html>