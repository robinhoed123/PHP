<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>GET</title>
</head>

<body>

<?php
    $pass = $_GET["passwd"];   // or    $pass = $_REQUEST["name"];
    echo("<h3>Processing of the form data</h3>");
    echo("<p>Your password is <strong> $pass </strong>.</p>");
?>

</body>
</html>
