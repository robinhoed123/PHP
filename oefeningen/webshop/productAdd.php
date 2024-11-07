<?php
$servername = "localhost";
$username = "Robin";
$password = "root";
$dbname = "webshop";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if all required POST fields are set
// if (empty($_POST['voornaam']) || empty($_POST['achternaam']) || empty($_POST['adres']) || empty($_POST['email']) || empty($_POST['wachtwoord']) || empty($_POST['bevestig-wachtwoord'])) {
//     header("Location: aanmelden.php");
//     exit();
// }

// Retrieve POST data
$productAfbeeldingnaam = $_FILES['productAfbeelding']['name'];
$productNaam = $_POST['productNaam'];
$productBeschrijving = $_POST['productBeschrijving'];
$productGewicht = $_POST['productgewicht'];
$productVissoort = $_POST['productvissoort'];
$productHoeveelheid = $_POST['productHoeveelheid'];
$productPrijs = $_POST['productPrijs'];
move_uploaded_file($_FILES['productAfbeelding']['tmp_name'], "afbeeldingen/" . $productAfbeeldingnaam);



// Prepare and bind
$stmt = $conn->prepare("INSERT INTO product (naam, beschrijving,gewicht,vissoort,prijs,voorraad,foto) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $productNaam, $productBeschrijving, $productGewicht, $productVissoort, $productHoeveelheid, $productPrijs, "afbeeldingen/".$productAfbeeldingnaam);
$result = $stmt->execute();
// Execute the statement
if ($result) {
header("Location: home.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>