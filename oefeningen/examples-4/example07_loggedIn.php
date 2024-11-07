<?php
	//start the session
	session_start();
	
	//check to make sure the session variable is registered
	if(isset($_SESSION['username']))
	{
		//session variable is registered, user is allowed to see anything that follows
?>
		<div>
        	<a href="example07_logout.php">logout</a>
        </div>

<?php	        
        echo "Welcome, ". $_SESSION['username'].", you are logged in correctly.";
	}
	else
	{
		//session variable isn't registered, send back to login page
		header( "Location: example07_index.html" );
	}
?>
