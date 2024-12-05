<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Ajax and PHP</title>
  <style>
    div{width:500px; border:solid; border-width:1px 0px;background-color:#CCFFCC}
  </style>
<script>
	function createQueryString() 
	{
		var name = document.getElementById("name").value;
		
		var queryString = "name=" + name;
		
		return queryString;
	}

	function start(method) {
	  xhr = new XMLHttpRequest();
	  if (xhr == null) {
			alert ('Problem creating the XMLHttpRequest object');
	  } else {

		if (method == "get") {
				var queryString = "process_get_post.php?";
				queryString = queryString + createQueryString()+ "&timeStamp=" + new Date().getTime();
				
				xhr.onreadystatechange = showAnswer;
				xhr.open("GET", queryString, true);
				xhr.send(null);
		} else {
				var url = "process_get_post.php?timeStamp=" + new Date().getTime();
				var queryString = createQueryString();
				
				xhr.onreadystatechange = showAnswer;
				xhr.open("POST", url, true);
				//add an HTTP header with setRequestHeader(). Specify the data you want to send in the send() method, in this case you specify the data in the format of a form
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");    
				xhr.send(queryString);
		}
	  }
	}

	function showAnswer() {
	  	if (xhr.readyState == 4) {
			if(xhr.status == 200) {
				var textBox = document.getElementById("textBox");
				if(textBox.hasChildNodes()) {
					textBox.removeChild(textBox.childNodes[0]);
				}
				
				var text = document.createTextNode(xhr.responseText);
				textBox.appendChild(text);
			} else {
				textBox.innerHTML = "wrong status";
			}
		}
	}   
</script>
</head>

<body>
  <h2>AJAX and PHP</h2>
  <form action="#">
    <p>Enter name: <input type="text" id="name"/></p>
  </form>
  <form action="#">
		<p>
    	<input type="button" value="use method GET" onClick="start('get');"/>      
</p>
		<p>
			<input type="button" value="use method POST" onClick="start('post');"/>    
		</p>
  </form>

  
  <h2>Server answer:</h2>

  <div id="textBox"></div>
  
</body>
</html>
