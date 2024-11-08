<!DOCTYPE html>
<html>
<body>

<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
    
function showPosition(position) {
    x.innerHTML="Latitude: " + position.coords.latitude ;
	x.innerHTML +="<br>";
	x.innerHTML +="Longitude: " + position.coords.longitude;
	var locAPI="http://maps.googleapis.com/maps/api/geocode/json?latlang="+position.coords.latitude+","+position.coords.longitude+"&sensor=true";
	x.innerHTML=locAPI;
	
	}
</script>

</body>
</html>