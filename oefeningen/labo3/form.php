<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="test.css">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <style>
        td {
            font-weight: bold; /* Vet */
            border: 3px solid black;
        }
    </style>
</head>

<body>
    <h1>Form with php-processing</h1>
    <form name="form1" method="post" action="form.php" >
    <p>
        <input type = "radio" name="gender" value="0"> Merouw
        <input type = "radio" name="gender" value="1"> Mijnheer
    </p>
    <p>naam: <input type="text" name="naam"></p>
    
        <table style="border: 3px solid black; border-collapse: collapse;">
        <tr><th>Product</th><th>prijs</th><th>Aantal</th></tr>
        <tr><td>TV</td><td>2000$</td><td><input type="text" name="tv"></td></tr>
        <tr><td>iphone</td><td>800$</td><td><input type="text" name="iphone"></td></tr>
        <tr><td>laptop</td><td>2300$</td><td><input type="text" name="laptop"></td></tr>
        </table>
		<p>
        <input type ="submit" value="send">
        <input type ="reset" value="reset">
        </p>
    </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $naam = htmlspecialchars($_POST['naam']);
        $gender=($_POST['gender']);
        $tv;
        $iphone;
        $laptop;
        $prijs1=2000;
        $prijs2=800;
        $prijs3=2300;
        if (!empty($_POST['tv'])) {
            $tv=($_POST['tv']);
        }
        if (!empty($_POST['iphone'])) {
            $iphone=($_POST['iphone']);
        }
        if (!empty($_POST['laptop'])) {
            $laptop=($_POST['laptop']);
        }
        if ($gender==0) {
        echo("<h1>geachte mevrouw $naam dit is u besteling</h1>");
        }
        else {
        echo("<h1>geachte meneer $naam dit is u besteling</h1>");
        }
        echo("<table>");
        echo("<tr><th>aantal</th><th>item</th><th>PPU</th><th>tot prijs</th></tr>");
        if (isset($tv)) {
            echo("<tr><td>$tv</td><td>tv</td><td>$prijs1</td><td>" . ($tv * $prijs1) . "</td></tr>");
        }
        if (isset($iphone)) {
            echo("<tr><td>$iphone</td><td>iphone</td><td>$prijs2</td><td>" . ($iphone * $prijs2) . "</td></tr>");
        }
        if (isset($laptop)) {
            echo("<tr><td>$laptop</td><td>laptop</td><td>$prijs3</td><td>" . ($laptop * $prijs3) . "</td></tr>");
        }
        echo("</table>");
    }
    ?>
</body>


</html>