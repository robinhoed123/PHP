
<?php
    $capital = array("DE" => "Berlin",
                       "BE" => "Brussels",
                       "ES" => "Madrid",
                       "DK" => "Copenhagen",
                       "FR" => "Paris",
                       "GB" => "London");

    echo('<p>The array $capital contains ' . count($capital) . ' elements </p>');
    echo('<p>');

    foreach($capital as $value)
    {
        echo ('value = ' . $value . '<br />');
    }

    echo('</p><p>');
	
	foreach($capital as $country => $city)
    {
        echo ('index = ' . $country . ' =>  value = ' . $city . '<br />');
    }
	
	echo('</p>');
?>

<?php
 /*   $capital['DE']="Berlin";
    $capital['BE']="Brussels";
    $capital['ES']="Madrid";
    $capital['DK']="Copenhagen";
    $capital['FR']="Paris";
    $capital['GB']="London";

    echo("The capital of France is ". $capital['FR'] . '<br /><br />');

    foreach($capital as $key => $value)
    {
      echo ('index = ' . $key . ' =>  value = ' . $value . '<br />');
    }*/
?>
