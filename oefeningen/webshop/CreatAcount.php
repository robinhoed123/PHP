<?php
include 'dataini.php';
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if all required POST fields are set
if (empty($_POST['voornaam']) || empty($_POST['achternaam']) || empty($_POST['adres']) || empty($_POST['email']) || empty($_POST['wachtwoord']) || empty($_POST['bevestig-wachtwoord'])) {
    header("Location: aanmelden.php");
    exit();
}

// Retrieve POST data
$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$adres = $_POST['adres'];
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];
$bevestigWachtwoord = $_POST['bevestig-wachtwoord'];
$hashedPassword = password_hash($wachtwoord, PASSWORD_DEFAULT);



// Check if email already exists
$emailCheckStmt = $conn->prepare("SELECT email FROM persoon WHERE email = ? AND verwijderd = 0");
$emailCheckStmt->bind_param("s", $email);
$emailCheckStmt->execute();
$emailCheckStmt->store_result();

if ($emailCheckStmt->num_rows > 0) {
    $emailCheckStmt->close();
    header("Location: aanmelden.php?error=email_in_use");
    exit();
}
$emailCheckStmt->close();

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO persoon (voornaam, achternaam, adres, email, hash) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $voornaam, $achternaam, $adres, $email, $hashedPassword);

// Execute the statement
if ($stmt->execute()) {
        if(!isset($_SESSION['sid'])) {
            $_SESSION['sid'] = session_id();
            $stmt = $conn->prepare("SELECT klant_id,voornaam, achternaam, adres, email, admin FROM persoon WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($id, $voornaam, $achternaam, $adres, $email, $admin);
            if ($stmt->fetch()) {
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['voornaam'] = $voornaam;
                $_SESSION['achternaam'] = $achternaam;
                $_SESSION['adres'] = $adres;
                $_SESSION['email'] = $email;
                $_SESSION['admin'] = $admin;
            }
            $stmt->close();
        }
header("Location: home.php");
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>