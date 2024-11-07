

<?php


if (isset($_COOKIE['PHPSESSID']) ) {
    session_start();
    if ( isset($_GET['id']) && $_SESSION['admin'] = 1) {
        $id = $_GET['id'];
    }
} else {
    $id = $_SESSION['id'];
}


$servername = "localhost";
$username = "Robin";
$password = "root";
$dbname = "webshop";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$voornaam = $_POST['voornaam'] ?? '';
$achternaam = $_POST['achternaam'] ?? '';
$email = $_POST['email'] ?? '';
$adres = $_POST['adres'] ?? '';
$wachtwoord = $_POST['wachtwoord'] ?? '';
$herhaalWachtwoord = $_POST['herhaalWachtwoord'] ?? '';

if ($wachtwoord !== $herhaalWachtwoord) {
    echo "Wachtwoorden komen niet overeen.";
    exit();
}

$stmt = $conn->prepare("SELECT COUNT(*) FROM persoon WHERE email = ? AND klant_id != ?");
$stmt->bind_param("si", $email, $id);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    echo "Email adres bestaat al.";
    exit();
}

if (!empty($wachtwoord)) {
    $hash = password_hash($wachtwoord, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE persoon SET voornaam = ?, achternaam = ?, email = ?, adres = ?, hash = ? WHERE klant_id = ?");
    $stmt->bind_param("sssssi", $voornaam, $achternaam, $email, $adres, $hash, $id);
} else {
    $stmt = $conn->prepare("UPDATE persoon SET voornaam = ?, achternaam = ?, email = ?, adres = ? WHERE klant_id = ?");
    $stmt->bind_param("ssssi", $voornaam, $achternaam, $email, $adres, $id);
}

if ($stmt->execute()) {
if ($_SESSION['admin'] == 1 && $_GET['id'] != $_SESSION['id']) {
    header("Location: beheerKlanten.php");
} else {
    $_SESSION['voornaam'] = $voornaam;
    $_SESSION['achternaam'] = $achternaam;
    $_SESSION['email'] = $email;
    $_SESSION['adres'] = $adres;
    header("Location: acount.php");
}
} else {
    echo "Er is een fout opgetreden bij het bijwerken van de gegevens.";
}

$stmt->close();
$conn->close();
?>