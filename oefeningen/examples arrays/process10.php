<?php
    echo("<h3>Processing of the form data</h3>");
    echo("<p>");
    $gender = $_POST["gender"];
    $name= $_POST["name"];

    if ( $gender == "female") 
        echo('Hello Mrs ');
    else 
        echo('Hello sir ');

    echo("<strong>$name</strong>, welcome on our site</p>");
?>

