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
        <!-- Zoekveld -->
        <div class="search-bar">
            <input type="text" id="search" placeholder="Zoek producten...">
        </div>

    <!-- Hoofdinhoud -->
    <div class="content">
        <ul class="item-lijst">
                <?php
                if (!isset($_SESSION['vis'])) {
                    $_SESSION['vis'] = array();
                }
                if (!isset($_SESSION['aantal'])) {
                    $_SESSION['aantal'] = array();
                }
                if (isset($_POST["aantal"]) && isset($_POST["product_id"])){
                    $product_id = $_POST['product_id'];
                    $aantal = $_POST['aantal'];
                    $index = array_search($product_id, $_SESSION['vis']);
                    if ($index !== false) {
                        // Update
                        $_SESSION['aantal'][$index] += $aantal;
                    } else {
                        // Add new 
                        $_SESSION['vis'][] = $product_id;
                        $_SESSION['aantal'][] = $aantal;
                    }
                }

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
                ?>
                        <li>
                            <div class="item">
                                <img src="<?php echo htmlspecialchars($row['foto']); ?>" alt="foto van vis">
                                <p><span class="selector">Naam: </span><?php echo htmlspecialchars($row['naam']); ?> <span class="selector">Gewicht: </span><?php echo htmlspecialchars($row['gewicht']); ?> gram</p>
                                <p><span class="selector">Beschrijving: </span><?php echo htmlspecialchars($row['beschrijving']); ?></p>
                                <div class="aankoop">
                                    <p><span class="selector">Prijs: </span><?php echo htmlspecialchars($row['prijs']); ?> €</p>
                                    <form action="home.php" method="post">
                                        <?php if ($ingelogd) {
                                            if ($_SESSION['admin'] == 1 && isset($_GET['id'])) { ?>
                                                <button type="button" onclick="location.href='Editproduckt.php?id=<?php echo htmlspecialchars($row['product_id']); ?>'">Wijzig</button>
                                            <?php } else { ?>
                                                <label for="aantal">Aantal:</label>
                                                <input type="number" id="aantal" name="aantal" min="1" max="<?php
                                                $index = array_search($row['product_id'], $_SESSION['vis']);
                                                if ($index !== false) {
                                                    $aantal=$_SESSION['aantal'][$index];
                                                    echo htmlspecialchars($row['voorraad']-$aantal);
                                                } else {
                                                    echo htmlspecialchars($row['voorraad']);
                                                } ?>" required>
                                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($row['product_id']); ?>">
                                                <button type="submit">Toevoegen</button>
                                        <?php }
                                        } ?>
                                    </form>
                                </div>
                            </div>
                        </li>
                <?php

                    }
                } else {
                    echo "Error: " . mysqli_error($link);
                }
                // Close connection
                mysqli_close($link);
                ?>
        </ul>
    </div>
</div>
<script src="search.js"></script>
    <!-- Footer -->
    <footer>
        <p>Copyright © Thomas More Mechelen-Antwerpen vzw - Campus De Nayer - Professionele bachelor elektronica-ict – 2025</p>
    </footer>
</body>

</html>