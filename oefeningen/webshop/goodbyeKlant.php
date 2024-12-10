<?php
$id = $_GET['id'] ?? null;
if (isset($_COOKIE['PHPSESSID']) ) {
    session_start();
    if ($_SESSION['id'] != $_GET['id'] && $_SESSION['admin'] != 1) {
        exit();
    }
} else {
    exit();
}

include 'dataini.php';


$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("UPDATE persoon SET verwijderd = 1 WHERE klant_id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Klant succesvol gemarkeerd als verwijderd.";
} else {
    echo "Er is een fout opgetreden bij het bijwerken van de gegevens.";
}

$stmt->close();
$conn->close();

if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
    header("Location: beheerKlanten.php");
} else {
    header("Location: loguit.php");
}
exit();
?>