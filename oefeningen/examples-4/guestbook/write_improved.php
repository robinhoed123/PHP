<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Eenvoudig gastenboek - schrijf</title>
  <style type="text/css">    .ster{color:red;}  </style>
</head>

<body>
  <?php
    // controleren of de pagina zichzelf heeft aangeroepen en name en bijdrage zijn ingevuld
    // zo ja, alles opslaan in het gastenboek

  if ( !empty($_POST["name"]) && !empty($_POST["bijdrage"]))
  {
    // initialisatie
    $bestandsname = "data/gastenboek2.txt";	// bestandsname van het gastenboek
    $mode = "a"; 			// openen voor (append) toevoegen
    $delimiter = "###einde_record###" ; // einde record aanduiding
    $datum=date("d-m-Y. G:i");
	include("functies.php");
	
    // gastenboek openen, of maken als het nog niet bestaat.
    $fp = fopen ($bestandsname, $mode);
    if (!$fp)
    {
      echo("<h2>Het openen van $bestandsname is mislukt.</h2> ");
      echo("Controleer of de juiste rechten voor het schrijven van bestanden zijn toegekend.");
      exit;
    };
    // De velden toevoegen aan het gastenboek
    
	fwrite ($fp, beveiligTekst($_POST["name"]));
    fwrite ($fp, "\n");
    fwrite ($fp, beveiligTekst($_POST["email"]));
    fwrite ($fp, "\n");
    fwrite ($fp, beveiligTekst($_POST["bijdrage"]));
    fwrite ($fp, "\n");
    fwrite ($fp, beveiligTekst($datum));
    fwrite ($fp, "\n");
    fwrite ($fp, $delimiter);
    fwrite ($fp, "\n");
    fclose($fp);
    echo("<h2>De bijdrage is opgeslagen in het gastenboek!</h2>");
    echo("<p><a href=\"lees_verbeterd.php\">Lees alle bijdragen</a><br />");
    echo("<a href=\"index_verbeterd.php\">Terug naar de homepage</a></p>");
  }
  else
  {
    // De pagina heeft niet zichzelf aangeroepen,
    // het HTML-formulier op het scherm tonen
  ?>

  <h2>Een eenvoudig gastenboek: Schrijf een bijdrage</h2>
  <p>Velden met een <span class="ster">*</span> zijn verplicht in te vullen</p>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <pre>
    name:          <input type="text" name="name" size="30"/><span class="ster">*</span>
    E-mailadres:   <input type="text" name="email"  size="30" />
    <textarea rows="10" cols="40" name="bijdrage">Uw bijdrage</textarea><span class="ster">*</span>
    <hr />
    <input type="submit" value="Verzenden" name="verzenden" /><input type="reset" value="Leegmaken" />
  </pre>
  </form>
</body>
</html>
<?php
}	// Het else-blok afsluiten
?>
