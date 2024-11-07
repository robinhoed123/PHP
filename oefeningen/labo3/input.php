<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input test</title>
</head>
<body>
    <form method="post" action="">
        <label for="userInput">Enter something:</label>
        <input type="text" id="userInput" name="userInput">
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userInput = htmlspecialchars($_POST['userInput']);
        echo "You entered: " . $userInput;
    }
    ?>
</body>
</html>