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

    <!-- Hoofdinhoud -->

            <div class="add-product">
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
        </div>
    <script src="produckt.js"></script>
    <!-- Footer -->
    <footer>
        <p>Copyright © Thomas More Mechelen-Antwerpen vzw - Campus De Nayer - Professionele bachelor elektronica-ict – 2025</p>
    </footer>
</body>

</html>

<?php
        if (isset($_COOKIE['PHPSESSID'])) 
        {
            session_start();
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

        $servername = "localhost";
        $username = "Robin";
        $password = "root";
        $dbname = "webshop";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check if all required POST fields are set
        if (!isset($_FILES['productAfbeelding'], $_POST['productNaam'], $_POST['productBeschrijving'], $_POST['productgewicht'], $_POST['productvissoort'], $_POST['productHoeveelheid'], $_POST['productPrijs'])) {
            die("All fields are required.");
        }

        // Retrieve POST data
        $productAfbeeldingnaam = htmlspecialchars($_FILES['productAfbeelding']['name']);
        $productNaam = htmlspecialchars($_POST['productNaam']);
        $productBeschrijving = htmlspecialchars($_POST['productBeschrijving']);
        $productGewicht = htmlspecialchars($_POST['productgewicht']);
        $productVissoort = htmlspecialchars($_POST['productvissoort']);
        $productHoeveelheid = htmlspecialchars($_POST['productHoeveelheid']);
        $productPrijs = htmlspecialchars($_POST['productPrijs']);
        $afbeeldingspad = "afbeeldingen/" . $productAfbeeldingnaam;
        move_uploaded_file($_FILES['productAfbeelding']['tmp_name'], $afbeeldingspad);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO product (naam, beschrijving,gewicht,vissoort,prijs,voorraad,foto) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisids", $productNaam, $productBeschrijving, $productGewicht, $productVissoort, $productHoeveelheid, $productPrijs,$afbeeldingspad);
        $result = $stmt->execute();
        // Execute the statement
        if ($result) {
        header("Location: productAdd.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close connections
        $stmt->close();
        $conn->close();
?>