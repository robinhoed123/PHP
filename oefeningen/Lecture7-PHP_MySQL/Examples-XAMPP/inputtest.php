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
	  <p>voor naam: <input type="text" name="voornaam" /></p>
     	<p>achter naam: <input type="text" name="achternaam" /></p>
		 <p>post code: <input type="number" name="post" /></p>
		 <p>stad: <input type="text" name="city" /></p>
     	<p><input type ="submit" name="send" value="add" /> </p>
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
      $stmt = mysqli_prepare($link, "INSERT INTO students (name, firstname, postalCode, city) VALUES (?,?,?,?);");

      //3b: bind parameters
      $achternaam = $_POST["achternaam"];

      mysqli_stmt_bind_param($stmt,"s", $_POST["achternaam"],"s", $_POST["voornaam"],"i", $_POST["post"],"s", $_POST["city"]);

      //3c: execute query
      mysqli_stmt_execute($stmt);
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
