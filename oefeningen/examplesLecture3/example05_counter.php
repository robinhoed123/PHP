<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Count visits</title>
</head>
<body>
<?php
    define("FILE", "counter.txt");

    if (file_exists(FILE))
    {
        $fp = fopen(FILE,"r+");
        $counter = (int)(fread($fp,filesize(FILE)));

        echo("<h3>This page has been shown $counter times.</h3>");
 
        $counter++;
        rewind($fp);
        fwrite($fp, (string)$counter);
        fclose($fp);
    }
    else
    {
        echo("<h3>This is the first time this page is shown.</h3>");
        $fp = fopen(FILE,"w");
        fwrite($fp, "1");
        fclose($fp);
    }    
?>
</body>
</html>
