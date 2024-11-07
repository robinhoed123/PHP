<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>reading RSS feed</title>
<link href="style_example10.css" rel="stylesheet" />
</head>

<body>
<?php
	$url="http://feeds.bbci.co.uk/news/world/rss.xml";
	$xml=file_get_contents($url);
	
	$feed = simplexml_load_string($xml);
	
	
	/*echo("<pre>");
	print_r($feed);
	echo("</pre>");*/
	

	foreach($feed->channel->item as $item)
	{
		echo("<div>\n");
		echo("\t<h1>".$item->title."</h1>\n");
		echo("\t<p>".$item->description."</p>\n");
		echo("\t<a href=\"".$item->link."\">read article</a>\n");
		echo("</div>\n\n");
	}
?>
</body>
</html>