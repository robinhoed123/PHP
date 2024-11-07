<?php
  session_start();

  if(isset($_SESSION['sid']))
  {
    echo("<pre>");
    print_r($_SESSION);
    echo("</pre>");
    $_SESSION['counter']++;
    echo("<p>counter = ".$_SESSION['counter']."</p>");
  }
  else
  {
    $_SESSION['sid'] = session_id();
    $_SESSION['counter']=0;
  }

echo("<p>session-id=".$_SESSION['sid']."</p>");

?>
