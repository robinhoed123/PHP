<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
    <title>Read and write cookies</title>
</head>
<body>
	<?php
        if(isset($_COOKIE["name"]))
        {
            $name= htmlspecialchars($_COOKIE["name"]);
            echo("<p>Welcome $name</p>");
        }
        else
        {
		    header('Location:example03_cookie_session.php');
	    }
	 ?>
</body>
</html>