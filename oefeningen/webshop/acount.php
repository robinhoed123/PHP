

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Robin Herickx</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="video-achtergrond.css">
    <link rel="stylesheet" href="menubalk.css">
    <link rel="stylesheet" href="acount.css">
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
<h1 class="title">ACOUNT</h1>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['id'])) {
    if ($_SESSION['admin'] == 1 && isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = $_SESSION['id'];
    }
    $sql = "SELECT voornaam, achternaam, email, adres FROM persoon WHERE Klant_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if ($user) {
        echo '<div class="card">';
        echo '<form action="EditAcount.php?id=' . $id . '" method="post">';
        echo '<div class="inputs">';
        echo '<label for="voornaam">Voornaam:</label>';
        echo '<input type="text" name="voornaam" value="' . htmlspecialchars($user['voornaam']) . '">';
        echo '<label for="achternaam">Achternaam:</label>';
        echo '<input type="text" name="achternaam" value="' . htmlspecialchars($user['achternaam']) . '">';
        echo '<label for="email">Email:</label>';
        echo '<input type="email" name="email" value="' . htmlspecialchars($user['email']) . '">';
        echo '<label for="adres">Adres:</label>';
        echo '<input type="text" name="adres" value="' . htmlspecialchars($user['adres']) . '">';
        echo '<label for="wachtwoord">Wachtwoord:</label>';
        echo '<input type="password" name="wachtwoord">';
        echo '<label for="herhaalWachtwoord">Herhaal Wachtwoord:</label>';
        echo '<input type="password" name="herhaalWachtwoord">';
        echo '</div>';
        echo '<div class="buttons">';
        if ($_SESSION['admin'] == 1 && $id != $_SESSION['id']) {
            echo '<button type="button" onclick="location.href=\'beheerKlanten.php\'">Terug</button>';
        } 
        echo '<input type="submit" value="Opslaan">';
        echo '<input type="reset" value="Reset">';
        if ( $id == $_SESSION['id']) {
            echo '<button type="button" onclick="location.href=\'loguit.php\'">Logout</button>';
        } 
        echo '<button type="button" onclick="location.href=\'goodbyeKlant.php?id=' . $id . '\'">Verwijder</button>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
    } else {
        echo "Geen gegevens gevonden.";
    }

    $stmt->close();
} else {
    header("Location: loguit.php");
}

$conn->close();
?>


</div>
</div>

    <!-- Footer -->
    <footer>
        <p>Copyright © Thomas More Mechelen-Antwerpen vzw - Campus De Nayer - Professionele bachelor elektronica-ict – 2025</p>
    </footer>
</body>

</html>

