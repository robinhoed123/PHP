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
	  $query = "SELECT * FROM students where name LIKE '%". $_POST["searchName"]."%'";
	
	  $result=mysqli_query($link, $query) or die("Error: an error has occurred while executing the query");

	  // step 4: write the results to the screen
	  echo ("<h2>students</h2>");
	  
	  $numberRecords = mysqli_num_rows($result);
	  echo("<p>Number of records selected = $numberRecords</p>");
	  
	  echo("<table><tr><th>id</th><th>name</th><th>firstname</th><th>postalCode</th><th>city</th></tr>");
	  while ($row = mysqli_fetch_array($result))
	  {
		echo("<tr><td>".$row['studNo']."</td><td>".$row['name']."</td><td>".$row['firstname']."</td><td>".$row['postalCode']."</td><td>".$row['city']."</td></tr>");
	  }
	  echo("</table>");
  
	  // step 5: closing the connection to the database
	   mysqli_close($link);
	   
  }  // end if(isset($_POST['searchName']))
?>
</div>
</body>
</html>
