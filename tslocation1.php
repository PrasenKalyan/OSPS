<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>OSPS Billing App</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/grid/">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="grid.css" rel="stylesheet">
  </head>

  <body>
      <?php 
  error_reporting(E_ALL);
ini_set('display_errors', 1);
require "Geocoding.php";
use myPHPnotes\Geocoding;
$latitude=$_GET['latitude'];
$longitude=$_GET['longitude'];
$geo=new Geocoding("AIzaSyB2SYwTIY8VtfkR65iyqw8KI7SG4jPA_HM");
$address=$geo->getAddress($latitude,$longitude);
?>
    <div class="container">
  
      <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
		<img src="OSPS TELECOM.png"  class="img-fluid"/>
		</div>
		</div>
      
      <div class="row">
	  <div class="col-12 col-sm-12 col-lg-12">
        <form action="" method="post">
    <div class="form-group">
      <input type="text" class="form-control" id="location" placeholder="Enter Location" name="location" value="<?php echo $address?>">
    </div>
    <div class="form-group">
      <label for="pwd">Indus Id:</label>
      <input type="text" class="form-control" id="sid" placeholder="Enter Indus id" name="sid">
    </div>
    <div id="demo"> </div>
    <button type="submit" name="submit" class="btn btn-primary">Search</button>
  </form>
  </div >
  <div class="col-12 col-sm-12 col-lg-12">
        <form action="" method="post">
    <div class="form-group">
        <label for="pwd">Reference no:</label>
      <input type="none" class="form-control" id="location" placeholder="Enter referenceno" name="referenceno">
    </div>
    <div class="form-group">
      <label for="pwd">State :</label>
      <input type="none" class="form-control" id="sid"  name="sid">
    </div>
    <div class="form-group">
      <label for="pwd">Sitename :</label>
      <input type="none" class="form-control" id="sid"  name="sitename">
    </div>
    <div class="form-group">
      <label for="pwd">Ptw :</label>
      <input type="none" class="form-control" id="sid"  name="ptw">
    </div>
    <div class="form-group">
      <label for="pwd">Comments :</label>
      <input type="text" class="form-control" id="sid"  name="comments">
    </div>
    <div id="demo"> </div>
    <button type="submit" name="submit" class="btn btn-primary">Search</button>
  </form>
  </div >
      </div>
     
    </div> <!-- /container -->
	<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
	var x1=position.coords.latitude;
	var y1=position.coords.longitude;
	//alert(x1+","+y1);
 showHint(x1,y1);
//show(x1,y1);
}

function showHint(x,y)
{
alert(x);

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("location"+i).value=strar[1];
	
    }
  }
  
 x = encodeURIComponent(x);
xmlhttp.open("GET","get_state.php?x="+x+"&y="+y,true);
xmlhttp.send();
alert(y);
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      x.innerHTML = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.innerHTML = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML = "An unknown error occurred."
      break;
  }
}
</script>
  

  </body>
</html>
