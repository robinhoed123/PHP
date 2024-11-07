<!doctype html>
<html>
	<head>
    	<meta charset="utf-8" />
        <title>read cookie</title>
    </head>
    <body>
		<?php
          if(isset($_COOKIE["example"]) )
            echo("<p>Content 'example'= ".htmlspecialchars($_COOKIE["example"])."</p>");
          else
            echo("<p>No cookie 'example' is present</p>");
        ?>
    </body>
</html>