<?php

	// initialisation
	$host		= 'localhost';
	$user 	= 'LectureUser';
	$passw	= 'Lecture';
	$database 	= 'college';
	
	if(isset($_GET['search']))
	{
		if(!empty($_GET['search']))
		{	  
			//establisch database connection
			$mysqli =new mysqli($host, $user, $passw, $database);

			/* create a prepared statement */
			$query = "SELECT * from students WHERE city LIKE ?";
			$stmt = $mysqli->prepare($query);

			/* bind parameters for markers */
			$search = "%".htmlspecialchars($_GET['search'])."%";
			$stmt->bind_param("s", $search);

			/* execute query */
			$stmt->execute();

			/* bind result variables */
			$stmt->bind_result($studNo, $name, $firstname, $postalCode, $city);
			$stmt->store_result();
			
			if($stmt->num_rows() == 0)
			{
				echo "No results found.";
			}
			else
			{
				echo("<table><tr><th>name</th><th>first name</th><th>postal code</th><th>city</th></tr>");
				while($stmt->fetch())
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
		//header("Location:example_10_searchAddress.php");
	}
?>
