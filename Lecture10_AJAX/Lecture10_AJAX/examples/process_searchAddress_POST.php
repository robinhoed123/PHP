<?php

	$host="localhost";
	$user="LectureUser";
	$passw = "Lecture";
	$database = "college";
	
	if(isset($_POST['search']))
	{
		if(!empty($_POST['search']))
		{
			//establisch database connection
			$link = mysqli_connect($host,$user,$passw) or die("Server not reachable");
			mysqli_select_db($link, $database) or die("Database not available");

			$query = "SELECT * FROM students WHERE city LIKE ?";
			$stmt = mysqli_prepare($link, $query);			
			$search = "%".htmlspecialchars($_POST['search'])."%";
			mysqli_stmt_bind_param($stmt, "s", $search);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt, $studNo, $name, $firstname, $postalCode, $city);
			
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 0)
			{
				echo "No results found.";
			}
			else
			{
				echo("<table><tr><th>name</th><th>first name</th><th>postal code</th><th>city</th></tr>");
				while(mysqli_stmt_fetch($stmt))
				{
					echo("<tr><td>".htmlspecialchars($name)."</td>");
					echo("<td>".htmlspecialchars($firstname)."</td>");
					echo("<td>".htmlspecialchars($postalCode)."</td>");
					echo("<td>".htmlspecialchars($city)."</td></tr>");
				}
				echo("</table>");
			}
		}
		else
		{
			echo ("Enter 1 or more letters of the city you want to search for.");
		}
	}
	else
	{
		header("Location:example_10_searchAddress.php");
	}
?>
