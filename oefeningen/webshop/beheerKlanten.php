<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Robin Herickx</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="video-achtergrond.css">
    <link rel="stylesheet" href="menubalk.css">
    <link rel="stylesheet" href="beheerKlanten.css">
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

            if (isset($_COOKIE['PHPSESSID'])) 
            {
                if (!(isset($_SESSION['id']) && $_SESSION['admin'] == 1))
                {
                    header("Location: niceTry.php");
                    exit();
                }
            }
            else 
            {
                header("Location: niceTry.php");
                exit();
            }

            // initialisation
            $host		= "localhost";
            $user       = "Robin";
            $password	= "root";
            $database 	= "webshop";

            // code
            $link = mysqli_connect($host, $user, $password) or die("Error: no connection can be made to $host");
            mysqli_select_db($link, $database) or die("Error: the database could not be opened");
            $query = "SELECT * FROM persoon WHERE verwijderd=0 AND klant_id != " . $_SESSION['id'] . " ORDER BY voornaam";
            $result = mysqli_query($link, $query) or die("Error: an error has occurred while executing the query");
            echo("<table><tr><th>voor naam</th><th>achternaam</th><th>address</th><th>email</th><th>verwijder</th></tr>");
            while ($row = mysqli_fetch_array($result))
            {
                echo("<tr><td>".$row['voornaam']."</td><td>".$row['achternaam']."</td><td>".$row['adres']."</td><td>".$row['email']."</td><td><button type='button' onclick=\"location.href='acount.php?id=".$row['klant_id']."'\">Edit</button></td></tr>");
            }
            echo("</table>");
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
