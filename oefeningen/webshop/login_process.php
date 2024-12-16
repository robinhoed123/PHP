<?php
include 'dataini.php';


$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function bestaatGebruiker($gebruiker, $conn) {
  $hash = "";
  $stmt = $conn->prepare("SELECT hash FROM persoon WHERE email = ? AND verwijderd = 0");
  $stmt->bind_param("s", $gebruiker);
  $stmt->execute();
  $stmt->bind_result($hash);
  if ($stmt->fetch()) {
    return $hash;
  } else {
    return -1;
  }
  $stmt->close();
}

if(empty($_POST['email']) || empty($_POST['wachtwoord'])) {
    header("Location: contact.php");
} else {
    $gebruiker = $_POST['email'];
    $pass = $_POST['wachtwoord'];
    $hash = bestaatGebruiker($gebruiker, $conn);
    if(password_verify($pass, $hash)) {
        if(!isset($_SESSION['sid'])) {
            $_SESSION['sid'] = session_id();
            $stmt = $conn->prepare("SELECT klant_id,voornaam, achternaam, adres, email, admin FROM persoon WHERE email = ?");
            $stmt->bind_param("s", $gebruiker);
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
            header("Location: home.php");
        }
        
    } else {
        header("Location: aanmelden.php");
    }
}

$conn->close();
?>
