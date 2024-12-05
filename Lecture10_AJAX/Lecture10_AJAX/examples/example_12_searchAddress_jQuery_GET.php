<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Ajax</title>  
  <style>
    div{width:500px; border:solid; border-width:1px 0px; background-color:#CCFFCC}
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>

	$(document).ready(function()
	{
		$("#search").keyup(function()
		{
			$searchString = $("#search").val();
			console.log($searchString);
			
			$request = $.ajax({
				method:"GET",
				url:"process_searchAddress.php",
				data: {search: $searchString},
			});
			
			$request.done(function(msg)
			{
				$("#feedback").fadeOut("slow", function()
				{
					$("#feedback").html(msg);
					$("#feedback").fadeIn("slow");
				});
				
			});
			
			$request.fail(function(jqXHR, textStatus)
			{
				$("#feedback").html("Request failed: " + textStatus);
			});
			
		});
	
	});
//-->
</script>
</head>

<body>
	<h2>AJAX and Jquery</h2>
	<form action="#">
	  <p>
		search in file &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="search" name="input"/>
	  </p>
	</form>
	<div id="feedback"></div>

</body>
</html>
