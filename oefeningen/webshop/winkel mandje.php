<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Robin Herickx</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="video-achtergrond.css">
    <link rel="stylesheet" href="menubalk.css">
    <link rel="stylesheet" href="test.css">
</head>

<body>
    <!-- Video achtergrond -->
    <video autoplay muted loop class="Video">
        <source src="Aquarium.mp4" type="video/mp4">
        Je browser ondersteunt geen HTML5 video.
    </video>

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
            $host        = "localhost";
            $user     = "Robin";
            $password    = "root";
            $database     = "webshop";

            // step 1: establishing the connection
            $link = mysqli_connect($host, $user, $password) or die("Error: no connection can be made to $host");

            // Step 2: check whether the database can be opened
            mysqli_select_db($link, $database) or die("Error: the database could not be opened");

            // Step 3: create and execute the query
            $query = "SELECT * FROM product";

            $result = mysqli_query($link, $query) or die("Error: an error has occurred while executing the query");

            // step 4: write the results to the screen
            echo ("<h2>Table Producten</h2>");

$numberRecords = mysqli_num_rows($result);
echo("<p>Number of records selected = $numberRecords</p>");

echo("<table><tr><th>Product ID</th><th>Naam</th><th>Beschrijving</th><th>Gewicht</th><th>Vissoort</th><th>Prijs</th><th>Voorraad</th><th>Foto</th></tr>");
while ($row = mysqli_fetch_array($result))
{
    echo("<tr><td>".$row['product_id']."</td><td>".$row['naam']."</td><td>".$row['beschrijving']."</td><td>".$row['gewicht']."</td><td>".$row['vissoort']."</td><td>".$row['prijs']."</td><td>".$row['voorraad']."</td><td>".$row['foto']."</td></tr>");
}
echo("</table>");

            $numberRecords = mysqli_num_rows($result);
            mysqli_close($link);
  
            ?>

        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>Copyright © Thomas More Mechelen-Antwerpen vzw - Campus De Nayer - Professionele bachelor elektronica-ict – 2025</p>
    </footer>
</body>

</html>