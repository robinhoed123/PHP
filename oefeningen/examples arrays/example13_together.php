<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Form</title>
</head>

<body>
  <?php
    if(isset($_POST["name"])) 
      $name=$_POST["name"];
    if(isset($_POST["gender"])) 
      $gender=$_POST["gender"];
    if(isset($name) && isset($gender)) {
      echo("<h2>Welcome ");
      if ($gender == "female" ) 
        echo("Mrs ");
      else 
        echo("sir ");
      echo( htmlspecialchars($name)." on our site</h2>");
    }
    else {
  ?>

  <h2>Form with PHP processing</h2>
  <?php 
    if(isset($_POST["send"]))
      echo("<p>Please fill in all data!</p>");
  ?>
  <hr />
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >  
     <p>name    : <input type="text" name="name" /></p>
     <p>Gender:
     	<input type = "radio" name="gender" value="female" /> female
     	<input type = "radio" name="gender" value="male" /> male
     </p>
     <p>
     	<input type ="submit" name="send" value="send" />
     	<input type ="reset" value="reset"/>
     </p>
  </form>
  <hr />

<?php } ?>

</body>
</html>
