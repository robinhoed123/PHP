<?php

// create array with login data (will be replaced by database later on)
$login=array(
		array(htmlspecialchars("Sofie"), password_hash("hello", PASSWORD_DEFAULT)),
		array(htmlspecialchars("John O'Brien"),password_hash("Football", PASSWORD_DEFAULT)),
		array(htmlspecialchars("Kate"), password_hash("horse", PASSWORD_DEFAULT))
);

//write a search function
function search_user($user, $pass, $login)
{
	foreach($login as $validUser)
	{
		if(($validUser[0] == $user) && password_verify($pass, $validUser[1]))
			return 1;
	}
	return 0;			
}


//check if user is calling page from login form and not accessing it directly. Redirect back to login form if necessary
if (!isset($_POST['username']) || !isset($_POST['password']))
{
	header( "Location: example07_index.html" );
}

//check that form fields are not empty. Redirect back to login page if they are
elseif (empty($_POST['username']) || empty($_POST['password']))
{
	header( "Location: example07_index.html" );
}
else
{
	//convert field values to simple variables and use htmlspecialchars to clean user input	
	$user = htmlspecialchars($_POST['username']);	
	$pass = htmlspecialchars($_POST['password']);
	$result=search_user($user,$pass, $login);
	
	//check that at least one row was returned
	if($result == 1)
	{
		//start the session and register a variable
		session_start();
		$_SESSION['username'] = $user;
			
		//successful login code will go here...
		echo 'Success!';
			
		//we will redirect the user to another page where we will make sure they're logged in
		header( "Location: example07_loggedIn.php" );
	}
	else
	{	
		header("Location: example07_index.html");
	}
}
?>