<?php
	$arr = array(1, 2, 3, 4);
	
	echo("<p>After initialisation the array contains following elements:</p><p>");
	foreach($arr as $value)
	{
		echo ($value.'<br />');
	}

	echo('</p>');
	
	foreach ($arr as &$value) 
	{
		$value = $value * 2;
	}
	unset($value);		// remove reference from $value*/
	
	echo("<p>After doubling the values, the array contains:</p><p>");
	foreach($arr as $value)
	{
		echo ($value.'<br />');
	}
	echo('</p>');
?>