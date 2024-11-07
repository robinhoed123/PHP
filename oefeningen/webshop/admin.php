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
                        <button type="button" onclick="location.href='beheerKlanten.php'">Beheer Klanten</button>
                    </li>
                    <li>
                        <button class="add">product toe voegen</button>
                    </li>
                </ul>
            </div>
        <div class="add-product" style="display:none;">
            <h2>add Product</h2>
            <form id="bewerkProductFormulier" action="productAdd.php" method="post" enctype="multipart/form-data">
                <p>
                    <label for="productAfbeelding">Productafbeelding (PNG):</label>
                    <input type="file" id="productAfbeelding" name="productAfbeelding" accept="image/png" required>
                </p>
                <p>
                    <label for="productNaam">Productnaam:</label>
                    <input type="text" id="productNaam" name="productNaam" required>
                </p>
                <p>
                    <label for="productBeschrijving">Productbeschrijving:</label>
                    <textarea id="productBeschrijving" name="productBeschrijving" required></textarea>
                </p>
                <p>
                    <label for="productvissoort">vissoort:</label>
                    <input type="text" id="productvissoort" name="productvissoort" required>
                </p>
                <p>
                    <label for="productgewicht">productgewicht:</label>
                    <input type="number" id="productgewicht" name="productgewicht" required>
                </p>
                <p>
                    <label for="productPrijs">Productprijs (€):</label>
                    <input type="number" id="productPrijs" name="productPrijs" step="0.01" required>
                </p>
                <p>
                    <label for="productHoeveelheid">Beschikbare hoeveelheid:</label>
                    <input type="number" id="productHoeveelheid" name="productHoeveelheid" min="1" max="69" required>
                </p>
                <div class="knop">
                    <input type="submit" value="Opslaan">
                    <input type="reset" value="Reset">
                </div>
            </form>


            <script>
  

                document.querySelector('.add').addEventListener('click', function() {
                       document.querySelector('.producten').style.display = 'none';
               document.querySelector('.add-product').style.display = 'block';
                  });
      
                document.getElementById('addProductForm').addEventListener('submit', function() {
                    document.querySelector('.producten').style.display = 'block';
                    document.querySelector('.add-product').style.display = 'none';

                });

            </script>
        </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>Copyright © Thomas More Mechelen-Antwerpen vzw - Campus De Nayer - Professionele bachelor elektronica-ict – 2025</p>
    </footer>
</body>
</html>