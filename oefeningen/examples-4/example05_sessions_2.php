<?php
  session_start();
?>
<!doctype html>
<html>
<head>
  <meta charset='utf-8' />
  <title>PHP and SESSION</title>
</head>

<body>
  <h2>PHP and SESSION</h2>
  <?php  
    if(isset($_POST['send']) && !empty($_POST['name'])) {
      $name= htmlspecialchars($_POST['name']);
      $_SESSION['name']=$name;
    
      echo("<pre>");
      print_r($_SESSION);
      echo("</pre>");
    
      echo("<p>Welcome $name</p>");
      echo("<p>Move on the next <a href=\"example06_sessionContinued.php\">page</a></p>");
    }
    else { 
  ?>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" >  
      <p>What's your name?     <input type="text" name="name" /></p>
      <p><input type ="submit" name="send" value="send" /></p>
    </form>

  <?php 
    }
  ?>
</body>
</html>