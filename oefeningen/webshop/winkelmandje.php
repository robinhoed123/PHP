<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Robin Herickx</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="video-achtergrond.css">
    <link rel="stylesheet" href="menubalk.css">
    <link rel="stylesheet" href="winkelmand.css">
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
            $link = mysqli_connect($host, $user, $password) or die("Error: no connection can be made to $host");
            mysqli_select_db($link, $database) or die("Error: the database could not be opened");

            echo ("<h2>Factuur</h2>");
            echo ("<table><tr><th>Foto</th><th>Naam</th><th>Beschrijving</th><th>Gewicht</th><th>Vissoort</th><th>Prijs per vis</th><th>aantal</th><th>totaal</th></tr>");
            $tel=0;
            $totaalprijs=0;
            foreach ($_SESSION['vis'] as $item) {
                $stmt = $link->prepare("SELECT naam, beschrijving, gewicht, vissoort, prijs, foto FROM product WHERE product_id = ?");
                $stmt->bind_param("i", $item);
                $stmt->execute();
                $stmt->bind_result($naam, $beschrijving, $gewicht, $vissoort, $prijs, $foto);
                while ($stmt->fetch()) {
                    echo ("<tr><td><img src='" . htmlspecialchars($foto) . "' alt='Product Foto' width='50'></td><td>" . htmlspecialchars($naam) . "</td><td>" . htmlspecialchars($beschrijving) . "</td><td>" 
                    . htmlspecialchars($gewicht) . "</td><td>" . htmlspecialchars($vissoort) ."</td><td>" . htmlspecialchars($prijs) . "</td><td>" . $_SESSION['aantal'][$tel] . "</td><td>" .($prijs*$_SESSION['aantal'][$tel]). "</td></tr>");
                }
                $totaalprijs+=($prijs*$_SESSION['aantal'][$tel]);
                $tel++;
                $stmt->close();
            }
            echo ("</table>");
            echo ("<h2 class='totaal'>Totaal prijs: " . htmlspecialchars($totaalprijs) . "</h2>");
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