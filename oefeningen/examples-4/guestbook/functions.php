<?php

function beveiligTekst($tekst)
{
  $tekst = trim($tekst);  // voorafgaande spaties en tabs verwijderen
  if(!get_magic_quotes_gpc() )
  {
    // magic-quotes zijn op de server uitgezet
  $tekst = addslashes($tekst);
    // speciale tekens worden van slashes voorzie:  Vb:  “ wordt \”
  }
  return strip_tags($tekst);   // HTML-tags verwijderen
}

function leesTekst($tekst)
{
  return stripslashes($tekst);
}
?>