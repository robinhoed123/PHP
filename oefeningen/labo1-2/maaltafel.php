<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empty Page</title>
    <style>
        td {
            font-size: 2em; /* Dubbel zo groot */
            font-weight: bold; /* Vet */
            border: 3px solid black;
        }
    </style>
</head>
<body>
<table style="border: 3px solid black; border-collapse: collapse;">
        <?php
        $hor=100;
        $ver=5000;
        $maal=1;
        $uitkomst=0;
        for ($i = 0; $i < $ver; $i++) 
        {
            echo "<tr>";
            for ($j=1; $j <= $hor; $j++) {
                $uitkomst=$maal*$j;
                echo "<td>$uitkomst</td>";
              }
              $maal++;
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>