<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Creating xml file</title>
</head>

<body>
<?php
	$data = array("9781118008188","Jon Duckett","HTML &amp; CSS: Design and Build Web Sites");
	
	$xml=simplexml_load_file("xml_books.xml");
	
	$xml_string = $xml->asXML();
	
	echo "<p>The current content of the file written as string is ".htmlspecialchars($xml_string)." </p>";	
	
	$new_book = $xml->addChild("book");
	$new_book->addAttribute("isbn",$data[0]);
	$new_book->addChild("writer",$data[1]);
	$new_book->addChild("title",$data[2]);
	
	$xml->asXML("xml_books_extra.xml");
	
	echo "<p>All data was added and written to the file xml_books_extra.xml</p>";
	
?>
</body>
</html>