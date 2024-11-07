<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="test.css">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple php Page</title>
</head>

<body>
    <div>
        <?php
        $bereken=0;
        for ($i = 0; $i < 10; $i++) {
            $bereken = $i * $i;
            echo "the sqare of $i =$bereken <br>";
        }
    
        ?>
    </div>
</body>

</html>