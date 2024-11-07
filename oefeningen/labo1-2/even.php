<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empty Page</title>
</head>
<body>
<table>
        <?php
        $van=123;
        $tot=47478;
        $aantal = ceil(($tot-$van) / 2);
        $breete=80;
        $hoogte=ceil($aantal/$breete);
        if ($van % 2 > 0) {
          $van++;
        }
        for ($i = 0; $i < $hoogte; $i++) 
        {
            echo "<tr>";
            for ($j=0; $j < $breete; $j++) {
                echo "<td>$van</td>";
                $van+=2;
              }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>