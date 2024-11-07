
<?php
function basic() {
    echo '<li><a href="home.php">Home</a></li>';
    echo '<li><a href="aanmelden.php">Aanmelden</a></li>';
    echo '<li><a href="contact.php">Help</a></li>';
    echo '<li><a href="test.php">Test</a></li>';
}

if (isset($_COOKIE['PHPSESSID'])) {
  session_start();
  if (isset($_SESSION['id']))
    {
        echo '<li><a href="home.php">Home</a></li>';
        echo '<li><a href="winkelwagen.php">Winkelwagen</a></li>';
        echo '<li><a href="acount.php">acount</a></li>';
        echo '<li><a href="contact.php">Help</a></li>';
        if ($_SESSION['admin']==1) {
          echo '<li><a href="admin.php">Admin</a></li>';
        echo '<li><a href="test.php">Test</a></li>';
        }
    }
  else
  {
    basic();
  }
}
else
{
    basic();
}


?>
