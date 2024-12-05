<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Robin Herickx</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="video-achtergrond.css">
    <link rel="stylesheet" href="menubalk.css">
    <link rel="stylesheet" href="homePage.css">
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
        <ul class="item-lijst">
                <?php
                //na kijken of de gebruiker al is ingelogd
                $ingelogd=FALSE;
                if(session_status()===PHP_SESSION_ACTIVE){
                    if(isset($_SESSION['id']))
                    $ingelogd=TRUE;
                } 
                // Database connection
                $link = mysqli_connect("localhost", "root", "", "webshop");
                if (!$link) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $query = "SELECT product_id,naam, beschrijving, gewicht, vissoort, prijs, voorraad, foto FROM product";
                $result = mysqli_query($link, $query);

                

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li><div class="item">';
                        echo '<img src="' . htmlspecialchars($row['foto']) . '" alt="foto van vis">';
                        echo '<p><span class="selector">Naam: </span>' . htmlspecialchars($row['naam']) . ' <span class="selector">Gewicht: </span>' . htmlspecialchars($row['gewicht']) . ' gram</p>';
                        echo '<p><span class="selector">Beschrijving: </span>' . htmlspecialchars($row['beschrijving']) . '</p>';
                        echo '<div class="aankoop">';
                        echo '<p><span class="selector">Prijs: </span>' . htmlspecialchars($row['prijs']) . ' €</p>';
                        echo '<form action="home.php" method="post">';
                        if($ingelogd){
                        if ($_SESSION['admin'] == 1 && isset($_GET['id'])) {
                            echo '<button type="button" onclick="location.href=\'Editproduckt.php?id=' . htmlspecialchars($row['product_id']) . '\'">Wijzig</button>';
                        }
                        else
                        {
                            echo '<label for="aantal">Aantal:</label>';
                            echo '<input type="number" id="aantal" name="aantal" min="1" max="' . htmlspecialchars($row['voorraad']) . '" required>';
                            echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($row['product_id']) . '">';
                            echo '<button type="submit">Toevoegen</button>';
                        }}
                        echo '</form>';
                        echo '</div>';
                        echo '</div></li>';
                    }
                } else {
                    echo
                     "Error: " . mysqli_error($link);
                }
                if(!isset($_SESSION["aantal"])){
                    $_SESSION['aantal'] = array();
                }
                if(!isset($_SESSION["vis"])){
                    $_SESSION['vis'] = array();
                }
                if(isset($_POST["aantal"]) && isset($_POST["product_id"])){
                    $_SESSION['test'][] = $_POST["aantal"];
                    $_SESSION['vis'][] = $_POST["product_id"];
                }



                // Close connection
                mysqli_close($link);
                ?>
        </ul>
    </div>
</div>

    <!-- Footer -->
    <footer>
        <p>Copyright © Thomas More Mechelen-Antwerpen vzw - Campus De Nayer - Professionele bachelor elektronica-ict – 2025</p>
    </footer>
</body>

</html>
