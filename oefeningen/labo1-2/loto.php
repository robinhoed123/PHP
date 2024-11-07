<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotto</title>
</head>
<body>
<form method="post" action="">
        <label for="userInput">you cijfers:</label>
        <input type="text" id="userInput" name="userInput">
        <input type="submit" value="Submit">
    </form>
    <h1>Lotto</h1>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $userInput = htmlspecialchars($_POST['userInput']);
                echo "opgegeven cijfers: " . $userInput."<br>";
                loto();
            }

        function loto(){
            $min=0;
            $max=42;
            $aantalnumers=6;
            $random = 0;
            $ton = [];
            $loto = [];
            function sorteer($aray){
            
            for($i = 0; $i < count($aray); $i++) {
                for($j = 0; $j < count($aray) - 1; $j++) {
                if($aray[$j] > $aray[$j + 1]) {
                    $temp = $aray[$j];
                    $aray[$j] = $aray[$j + 1];
                    $aray[$j + 1] = $temp;
                }
                }
            }
            return $aray;
        }   
            for ($i = $min; $i <= $max; $i++) 
            {
                array_push($ton, $i);
            }
            for ($i = 0; $i < $aantalnumers; $i++)
    
            {
                $random = rand(0, count($ton)-1);
                array_push($loto, $ton[$random]);
                array_splice($ton, $random, 1);
            }
            $loto = sorteer($loto);
            for ($i = 0; $i < $aantalnumers; $i++)
            {
                echo $loto[$i] . " ";
            }
        }
        ?>
        

</body>
</html>