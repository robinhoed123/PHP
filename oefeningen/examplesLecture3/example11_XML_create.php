<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>Creating xml file</title>
<link href="style_example10.css" rel="stylesheet" />
</head>

<body>
<?php
	$data = array(
		array("9781118008188","Jon Duckett","HTML &amp; CSS: Design and Build Web Sites"),
		array("9780596007645","Elliotte Rusty Harold W. Scott Means","XML in a Nutshell"),
		array("9780596517748","Douglas Crockford","JavaScript: The Good Parts")
	);
	
	$xml="<books>\n";
	
	foreach($data as $book)
	{
		$xml .= "\t<book isbn=\"".$book[0]."\">\n";
		$xml .= "\t\t<writer>".$book[1]."</writer>\n";
		$xml .= "\t\t<title>".$book[2]."</title>\n";
		$xml .= "\t</book>\n\n";
	}
	
	$xml .= "</books>";
	$sxe = new SimpleXMLElement($xml);
	$sxe->asXML("xml_books.xml");
	
	$xml = "<books></books>";
	
	$sxe = new SimpleXMLElement($xml);
	
	foreach($data as $book)
	{
		$nieuw_book = $sxe->addChild("book");
		$nieuw_book->addAttribute("isbn",$book[0]);
		$nieuw_book->addChild("writer",$book[1]);
		$nieuw_book->addChild("title",$book[2]);
	}
	
	$sxe->asXML("xml_books_2.xml");
	
	echo "<p>All data was written to the file xml_books.xml</p>";
	
?>
</body>
</html>