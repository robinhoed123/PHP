<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>reading XML file</title>
</head>

<body>
<?php
	$books=simplexml_load_file("example08_XML_books.xml") or die("Error:cannot create object");
	
	foreach($books->children() as $book)	//loop over all books in the xml file
	{
		echo"<p>";
		echo $book->title."; ";				//print element title
		echo $book->writer."; ";			//print element wriiter
		echo $book['isbn']."</p>";			//print attribute isbn
	}
?>
</body>
</html>