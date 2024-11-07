<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>PHP and cookies</title>
  <link href="stijl.css" rel="stylesheet" />
</head>
<body>
  <h2>PHP and cookies</h2>
<?php
  $end = time() + 120;  // 2 minuten
  echo("<p>Expiry date = ".date("d-m-Y H-i-s",$end));
  setcookie("example","number 1",$end);
?>
 <p>View the result via your browser settings (website = localhost)</p>
</body>
</html>
