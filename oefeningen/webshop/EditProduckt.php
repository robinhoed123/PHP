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
    <?php
        if (session_status()===PHP_SESSION_ACTIVE) 
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
        $id = $_GET['id'];
        include 'dataini.php';

        $conn = new mysqli($host, $user, $password, $database);
        $sql = "SELECT naam,beschrijving,gewicht,vissoort,prijs,voorraad,foto FROM product WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        ?>

            <div class="add-product">
                    <h2>edit Product</h2>
                    <form id="bewerkProductFormulier" action="EditProduckt.php?id=<?php echo htmlspecialchars($id)?>" method="post" enctype="multipart/form-data">
                        <p>
                            <label for="productAfbeelding">Productafbeelding Aanpassen (PNG):</label>
                            <input type="file" id="productAfbeelding" name="productAfbeelding"  accept="image/png">
                        </p>
                        <p>
                            <label for="productNaam">Productnaam:</label>
                            <input type="text" id="productNaam" name="productNaam" 
                            value="<?php echo htmlspecialchars($data['naam'])?>"
                            required>
                        </p>
                        <p>
                            <label for="productBeschrijving">Productbeschrijving:</label>
                            <textarea id="productBeschrijving" name="productBeschrijving" required><?php echo htmlspecialchars($data['beschrijving'])?></textarea>
                        </p>
                        <p>
                            <label for="productvissoort">vissoort:</label>
                            <input type="text" id="productvissoort" name="productvissoort" 
                            value="<?php echo htmlspecialchars($data['vissoort'])?>"
                            required>
                        </p>
                        <p>
                            <label for="productgewicht">productgewicht:</label>
                            <input type="number" id="productgewicht" name="productgewicht" 
                            value="<?php echo htmlspecialchars($data['gewicht'])?>"
                            required>
                        </p>
                        <p>
                            <label for="productPrijs">Productprijs (€):</label>
                            <input type="number" id="productPrijs" name="productPrijs" step="0.01"
                            value="<?php echo htmlspecialchars($data['prijs'])?>"
                            required>
                        </p>
                        <p>
                            <label for="productHoeveelheid">Beschikbare hoeveelheid:</label>
                            <input type="number" id="productHoeveelheid" name="productHoeveelheid" min="1" max="69" 
                            value="<?php echo htmlspecialchars($data['voorraad'])?>"
                            required>
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
        // Check if all required POST fields are set
        if (!isset($_POST['productNaam'], $_POST['productBeschrijving'], $_POST['productgewicht'], $_POST['productvissoort'], $_POST['productHoeveelheid'], $_POST['productPrijs'])) {
            die("All fields are required.");
        }

        // Retrieve POST data
        $productNaam = htmlspecialchars($_POST['productNaam']);
        $productBeschrijving = htmlspecialchars($_POST['productBeschrijving']);
        $productGewicht = htmlspecialchars($_POST['productgewicht']);
        $productVissoort = htmlspecialchars($_POST['productvissoort']);
        $productHoeveelheid = htmlspecialchars($_POST['productHoeveelheid']);
        $productPrijs = htmlspecialchars($_POST['productPrijs']);
        if (isset($_FILES['productAfbeelding']) && $_FILES['productAfbeelding']['error'] == UPLOAD_ERR_OK) {
            $productAfbeeldingnaam = $_FILES['productAfbeelding']['name'];
            $afbeeldingspad = "afbeeldingen/" . $productAfbeeldingnaam;
        } else {
            $afbeeldingspad = $data['foto'];
        }
        move_uploaded_file($_FILES['productAfbeelding']['tmp_name'], $afbeeldingspad);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind
        $conn->execute_query(
            "UPDATE product SET naam=?, beschrijving=?, gewicht=?, vissoort=?, prijs=?, voorraad=?, foto=? WHERE product_id=?",
            [$productNaam, $productBeschrijving, $productGewicht, $productVissoort, $productPrijs, $productHoeveelheid, $afbeeldingspad, $id]
        );
        // Execute the statement
        if ($result) {
        header("Location: home.php?id=1");
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close connections
        $stmt->close();
        $conn->close();
?>