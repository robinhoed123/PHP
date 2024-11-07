<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="video-achtergrond.css">
    <link rel="stylesheet" href="menubalk.css">
    <link rel="stylesheet" href="test.css">
</head>

<body>
    <!-- Video achtergrond -->

    <!-- Wrapper voor inhoud en menu -->
    <div class="wrapper">
        <div class="menu">
            <ul class="menu-bar">
            <?php include 'menubalk.php'; ?>
            </ul>
        </div>

    <!-- Hoofdinhoud -->
    <div class="content">
    <?php
  // initialisation
  $host		= "localhost";
  $user 	= "Robin";
  $password	= "root";
  $database 	= "webshop";

  // step 1: establishing the connection
  $link = mysqli_connect($host, $user, $password) or die("Error: no connection can be made to $host");

  // Step 2: check whether the database can be opened
  mysqli_select_db($link, $database) or die("Error: the database could not be opened");

  // Step 3: create and execute the query
  $query = "SELECT * FROM persoon";

  $result = mysqli_query($link, $query) or die("Error: an error has occurred while executing the query");
  
  // step 4: write the results to the screen
  echo ("<h2>table gebuikers</h2>");
  
  $numberRecords = mysqli_num_rows($result);
  echo("<p>Number of records selected = $numberRecords</p>");
  
  echo("<table><tr><th>id</th><th>voor naam</th><th>achternaam</th><th>address</th><th>email</th><th>hash</th><th>admin</th><th>verwijderd</th></tr>");
  while ($row = mysqli_fetch_array($result))
  {
    echo("<tr><td>".$row['klant_id']."</td><td>".$row['voornaam']."</td><td>".$row['achternaam']."</td><td>".$row['adres']."</td><td>".$row['email']."</td><td>".$row['hash']."</td><td>".$row['admin']."</td><td>".$row['verwijderd']."</td></tr>");
  }
  echo("</table>");

// Query to fetch all records from the 'producten' table
$query = "SELECT * FROM product";

$result = mysqli_query($link, $query) or die("Error: an error has occurred while executing the query");

// Display the results in a table
echo ("<h2>Table Producten</h2>");

$numberRecords = mysqli_num_rows($result);
echo("<p>Number of records selected = $numberRecords</p>");

echo("<table><tr><th>Product ID</th><th>Naam</th><th>Beschrijving</th><th>Gewicht</th><th>Vissoort</th><th>Prijs</th><th>Voorraad</th><th>Foto</th></tr>");
while ($row = mysqli_fetch_array($result))
{
    echo("<tr><td>".$row['product_id']."</td><td>".$row['naam']."</td><td>".$row['beschrijving']."</td><td>".$row['gewicht']."</td><td>".$row['vissoort']."</td><td>".$row['prijs']."</td><td>".$row['voorraad']."</td><td>".$row['foto']."</td></tr>");
}
echo("</table>");

  
  // step 5: closing the connection to the database
  mysqli_close($link);
  

if ($_COOKIE['PHPSESSID']) {
    session_start();
    echo session_id(); 
    echo $_COOKIE['PHPSESSID']; // De SID uit cookies
    echo "<h2>Session Data</h2>";
    echo "<table><tr><th>Key</th><th>Value</th></tr>";
    foreach ($_SESSION as $key => $value) {
        echo "<tr><td>" . htmlspecialchars($key) . "</td><td>" . htmlspecialchars($value) . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No active session found.</p>";
}
?>


    </div>
</div>
</body>

</html>
