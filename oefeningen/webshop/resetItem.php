<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $index = $_POST['index'];

    if ($index == -1) {
        // Clear the arrays completely
        $_SESSION['aantal'] = [];
        $_SESSION['vis'] = [];
    } else {
        // Remove the item at the given index
        unset($_SESSION['aantal'][$index]);
        unset($_SESSION['vis'][$index]);

        // Re-index the arrays
        $_SESSION['aantal'] = array_values($_SESSION['aantal']);
        $_SESSION['vis'] = array_values($_SESSION['vis']);
    }

    // Redirect back to winkelmandje.php
    header('Location: winkelmandje.php');
    exit();
}
?>