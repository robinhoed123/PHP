<?php
    include 'dataini.php';
    session_start();
    $link = mysqli_connect($host, $user, $password, $database) or die("Error: no connection can be made to $host");

    $klant_id = $_SESSION['id'];
    $datum = date('Y-m-d');
    $totaal_prijs = $_POST['totaalprijs'];

    // Voeg bestelling toe aan de database
    $stmt = $link->prepare("INSERT INTO bestelling (klant_id, datum, totaal_prijs) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $klant_id, $datum, $totaal_prijs);
    $stmt->execute();
    $bestelling_id = $stmt->insert_id;
    $stmt->close();

    // Voeg producten toe aan producten_besteld
    foreach ($_SESSION['vis'] as $index => $product_id) {
        $aantal_besteld = $_SESSION['aantal'][$index];

        // Verkrijg de prijs van het product
        $stmt = $link->prepare("SELECT prijs FROM product WHERE product_id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $stmt->bind_result($prijs);
        $stmt->fetch();
        $stmt->close();

        // Voeg product toe aan producten_besteld
        $stmt = $link->prepare("INSERT INTO producten_besteld (bestelling_id, product_id, aantal_besteld, prijs) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiid", $bestelling_id, $product_id, $aantal_besteld, $prijs);
        $stmt->execute();
        $stmt->close();
    }

    // Maak de sessie arrays leeg
    $_SESSION['vis'] = [];
    $_SESSION['aantal'] = [];

    // Sluit de database verbinding
    mysqli_close($link);
    header("Location: winkelmandje.php");
    exit();
?>