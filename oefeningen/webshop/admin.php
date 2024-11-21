<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Robin Herickx</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="video-achtergrond.css">
    <link rel="stylesheet" href="menubalk.css">
    <link rel="stylesheet" href="admin.css">
    
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
        ?>
            <div class="producten">
                <ul class="button-lijst">
                    <li>
                        <button onclick="location.href='beheerKlanten.php'">Beheer Klanten</button>
                    </li>
                    <li>
                        <button onclick="location.href='productAdd.php'">Product toevoegen</button>
                    </li>
                    <li>
                        <button onclick="location.href='home.php?id=1'">Product Aanpassen</button>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>Copyright © Thomas More Mechelen-Antwerpen vzw - Campus De Nayer - Professionele bachelor elektronica-ict – 2025</p>
    </footer>
</body>
</html>