<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Eenvoudig gastenboek - lees alle bijdragen</title>
</head>

<body>
<h2>Een eenvoudig gastenboek - alle bijdragen:</h2>

<?php
   // initialisatie
    $bestandsname = "data/gastenboek2.txt";	// bestandsname van het gastenboek
    $mode = "r"; 			// openen voor (read) lezen
    $delimiter = "###einde_record###" ; // einde record aanduiding
    $l = strlen($delimiter);
	include("functies.php");


  // gastenboek openen voor lezen,
  // maar eerst testen of gastenboek wel bestaat

  if (file_exists($bestandsname))
  {
    $fp = fopen ($bestandsname, $mode); // ja, bestand openen
  }
  else
  {
    echo("<h2>Het gastenboek is nog leeg!</h2>
	<p><a href=\"schrijf_verbeterd.php\">Schrijf de eerste bijdrage!</a></p>");
    exit;
  }

  // Alle bijdragen in een lus op het scherm zetten
	
  while (!feof($fp))
  {
    $buffer = fgets($fp);		// tekst lijn per lijn ophalen
	$buffer = leesTekst($buffer);
    if (strncmp($buffer,$delimiter,$l))	// controleren of het einde van een bijdrage is bereikt, als de delimiter in $buffer zit geeft dit 0 of false, in alle andere gevallen krijg je een pos of negatief geheel getal dat evalueert tot true (automatische conversie van elk geheel getal behalve 0 naar true als een boolean vereist is)
    {
      echo("$buffer <br />") ;	// tekst naar het scherm schrijven      
    }
    else
    {
      echo("<hr />");		// einde van een record bereikt
    }
  }
  ?>
  <p><a href="index_verbeterd.php">Terug naar de homepage</a></p>
</body>
</html>
