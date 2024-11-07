<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="tabel.css">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple php Page</title>
</head>


<body>
    <h1>interest berekenen</h1>
    <div class="content">
        <?php
        $duration = 10;
        $startingCapital = 1000;
        $interestRate = 5;
        $intrest=0;
        echo "<p>Starting capital = $startingCapital, Duration = $duration years, Interest = $interestRate%</p><br>";
        echo "<table>";
        echo "<tr><th>Year</th><th>Capital</th><th>Interest</th></tr>";
        for ($i = 1; $i <= $duration; $i++) {
            $interest = ($startingCapital * $interestRate) / 100;
            $startingCapital += $interest;
            $interest=round($interest,2);
            $startingCapital=round($startingCapital,2);
            echo "<tr><td>$i</td><td>$startingCapital</td><td>$interest</td></tr>";
        }
        echo "</table>";
        ?>
    </div>
</body>

</html>