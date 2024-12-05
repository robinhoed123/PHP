<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Ajax</title>  
<style>
    div{width:500px; border:solid; border-width:1px 0px; background-color:#CCFFCC}
  </style>
 
<script>

function start() {
  xhr = new XMLHttpRequest();
  if (xhr != null) {
    var searchString = document.getElementById("input").value;        
    var url="process_searchAddress.php?search="+searchString;  

    xhr.onreadystatechange=showResult;
    xhr.open("GET",url,true);
    xhr.send(null);
  }
}

function showResult() {
  var output = document.getElementById("output");
  if (xhr.readyState == 4 && xhr.status == 200) {
    if(xhr.responseText) {
      output.innerHTML = xhr.responseText;
    } else {
      output.innerHTML = " NO responseText ";
    }
  } else {
    output.innerHTML = " readyState != 4";
  }
}  

</script>
</head>

<body>
<h2>An introduction to <span>Ajax</span> with processing of data in PHP</h2>
<form action="#">
  <p>
    Search in file <input type="text" id="input" onkeyup="start();" />
  </p>
</form>
<div id="output"></div>

</body>
</html>
