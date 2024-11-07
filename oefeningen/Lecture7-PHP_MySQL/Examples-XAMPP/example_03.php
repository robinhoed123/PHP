<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>PHP and MySQL</title>
</head>
<body>
 <div class="wrapper">
	<h2>students</h2>
  	<hr />
  	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >  
     	<p>name: <input type="text" name="searchName" /></p>
     	<p><input type ="submit" name="send" value="search" /> </p>
  	</form>
  	<hr />
    
<?php
  if (isset($_POST['searchName']))
  {
	  // initialisation
	  $host		= "localhost";
	  $user 	= "test";
	  $password	= "root";
	  $database 	= "college";

	  // step 1: establishing the connection
	  $link = mysqli_connect($host, $user, $password) or die("Error: no connection can be made to $host");

	  // Step 2: check whether the database can be opened
	  mysqli_select_db($link, $database) or die("Error: the database could not be opened");

      // Step 3: create and execute the query
      // 3a: create prepared statement
      $stmt = mysqli_prepare($link, "SELECT * FROM students where name LIKE ?");

      //3b: bind parameters
      $searchName = "%".$_POST["searchName"]."%";
      mysqli_stmt_bind_param($stmt, "s", $searchName);

      //3c: execute query
      mysqli_stmt_execute($stmt);

      //3d: bind resultats
      mysqli_stmt_bind_result($stmt, $studNo, $name, $firstname, $postalCode, $city);
	
	 // step 4: write the results to the screen
	  echo ("<h2>students</h2>");
	  
	  echo("<table><tr><th>id</th><th>name</th><th>firstname</th><th>postalCode</th><th>city</th></tr>");
	  while (mysqli_stmt_fetch($stmt))
	  {
		echo("<tr><td>$studNo</td><td>$name</td><td>$firstname</td><td>$postalCode</td><td>$city</td></tr>");
	  }
	  echo("</table>");
  
      // step 5: closing the connection to the database
      //5a: close statement
       mysqli_stmt_close($stmt);
       
       //5b: close connection
       mysqli_close($link);
	   
  }  // end if(isset($_POST['searchName']))
?>
</div>
</body>
</html>
