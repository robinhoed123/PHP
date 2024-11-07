<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>POST</title>
</head>

<body>
<?php
    $name = $_POST["name"];   // or    $name = $_REQUEST["name"];
    echo("<h3>Processing of the form data</h3>");
    echo("<p>Hello <strong>".htmlspecialchars($name)." </strong> welcome on our site.</p>");
    
?>

</body>
</html>

