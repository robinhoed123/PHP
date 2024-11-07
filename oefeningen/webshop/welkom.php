<?php

if (isset($_COOKIE['PHPSESSID'])) {
  // Start de sessie, maar alleen als de sessie-cookie al bestaat
  session_start();
  if (isset($_SESSION['sid']) && isset($_SESSION['counter']) && isset($_SESSION['naam']) && isset($_SESSION['wachtwoordt']) && isset($_SESSION['hash']))
    {
    	$_SESSION['counter']++;
        echo "<p style='font-size: 1.5em; color: orange;'>session-id=".$_SESSION['sid']."</p>";
        echo "<p style='font-size: 1.5em; color: orange;'>counter=".$_SESSION['counter']."</p>";
        echo "<p style='font-size: 1.5em; color: orange;'>naam=".$_SESSION['naam']."</p>";
        echo "<p style='font-size: 1.5em; color: orange;'>wachtwoordt=".$_SESSION['wachtwoordt']."</p>";
        echo "<p style='font-size: 1.5em; color: orange;'>hash=".$_SESSION['hash']."</p>";
        echo '<form action="loguit.php" method="post">';
        echo '<button type="submit">Logout</button>';
        echo '</form>';
    }
  else
  {
    header( "Location: inlog.php" );
  }
}
else
{
  header( "Location: inlog.php" );
}
?>
