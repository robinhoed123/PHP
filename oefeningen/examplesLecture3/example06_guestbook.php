<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <style type="text/css">    
  	.star{color:red;}  
  </style>
  <title>guest book</title>
</head>
<body>
  <h2>A simple guest book</h2>
  <p>Fields with a <span class="star">*</span> are mandatory</p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >  
    <table>
      <tr><td>Name: </td><td><input type="text" name="name" /><span class="star">*</span> </td></tr>
      <tr><td>Email: </td><td><input type="text" name="email" /></td></tr>
      <tr><td>comment: </td>
          <td><textarea cols="55" rows="5" name="comment"></textarea>
              <span class="star">*</span></td></tr>
    </table>

     <p><input type ="submit" name="send" value="send" /> </p>
  </form>
  <hr />
  
<?php
  $textFile="comment.txt";
  if(!file_exists($textFile))
	{
		$fp=fopen($textFile, "w");
		fwrite($fp,"Overview of comments");
		fclose($fp);
	}
  if(isset($_POST["send"]))
  {	
	  $comment=htmlspecialchars($_POST["comment"]);
    $name=htmlspecialchars($_POST["name"]);
    $email=htmlspecialchars($_POST["email"]);
	
    if (!empty($comment) && !empty($name))
    {
    	$fp=fopen($textFile,"r+");
    	$oldComment=fread($fp,filesize($textFile));
    	$email="<a href=\"mailto:$email\">$email</a>";
    	$date=date("j.n.Y");  
    	$comment=nl2br($comment);  // nl2br = \n to <br />
    	$newComment="<p><strong>$name</strong> ($email) wrote a comment on <i>$date</i> :</p>
    	<p>$comment</p><hr />\n";
    	rewind($fp);
    	fputs($fp,"$newComment\n$oldComment\n"); // alias voor fwrite()
    }
  }
  
  readfile($textFile);

?>
</body>
</html>
