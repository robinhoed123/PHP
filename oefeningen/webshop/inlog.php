<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php

if (isset($_COOKIE['PHPSESSID'])) { header( "Location: welkom.php" );}
?>
    <h2>Login</h2>
    <form action="login_process.php" method="post">
        <div>
            <label for="username">gebruiker:</label>
            <input type="text" name="naam">
        </div>
        <div>
            <label for="password">wachtwoordt:</label>
            <input type="password"  name="wachtwoordt">
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>