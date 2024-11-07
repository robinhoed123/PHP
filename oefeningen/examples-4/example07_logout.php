<?php
	//start the session
	session_start();
	
	//check to make sure the session variable is registered
	if(isset($_SESSION['username']))
	{
		//session variable is registered, user ready to logout
		session_unset();
		session_destroy();
		echo 'You are succesfully loged out!';
	}
	else
	{
		//session variable isn't registered, user shouldn't be on this page
		header( "Location: example07_index.html" );
	}
?>
