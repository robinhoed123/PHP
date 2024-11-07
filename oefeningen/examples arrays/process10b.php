<?php
    echo("<h3>Processing of the form data</h3>");
    
    $name= $_POST["name"];
    echo("<p>");
    if(!isset($_POST["gender"])) {
        echo('Hello genderless ');
    } 
    else {
        $gender = $_POST["gender"];
        if ( $gender == "female") echo('Hello Mrs ');
        else echo('Hello sir ');
    }
    echo("<strong>$name</strong>, welcome on our site</p>");
?>

