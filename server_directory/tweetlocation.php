<html>
  <head>
    <meta charset="utf-8">
    <title>Analysis of tweets</title>


 

    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
	background:#bbb;
      }
	body
	{background:#bbb;
	}	
      #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
    </style>

<center>
<div id="head" style="width:100%;box-shadow: 10px 10px 10px 10px #454545; color:#454545;background-color:#bbb;">
<font size="6">Analysis of tweets</font><br>
<font size="4">Mapped according to their Geocodes</font></center><br><br></div>
 </center>   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>


    <script>
// If you're adding a number of markers, you may want to
// drop them on the map consecutively rather than all at once.
// This example shows how to use setTimeout() to space
// your markers' animation.



 
var neighborhoods = [
  
  <?php

$string = file_get_contents("location.json");
$json_a = json_decode($string, true);

foreach ($json_a as $person_name => $person_a) {
  echo "new google.maps.LatLng(".$person_a['latitude'].", ".$person_a['longitude']."),";
}
?> 
];


var berlin = neighborhoods[0];

var markers = [];
var iterator = 0;

var map;

function initialize() {
  var mapOptions = {
    zoom: 3,
    center:berlin };

  map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);
}

function drop() {
  for (var i = 0; i < neighborhoods.length; i++) {
    setTimeout(function() {
      addMarker();
    }, i * 100);
  }
}

function addMarker() {
  markers.push(new google.maps.Marker({
    position: neighborhoods[iterator],
    map: map,
    draggable: false,
    animation: google.maps.Animation.DROP
  }));
  iterator++;
}

google.maps.event.addDomListener(window, 'load', initialize);
 setTimeout(function() {
      drop();
    }, 500);




    </script>
  </head>
  <body>
   
    <div id="map-canvas" style="position:absolute;top:10%;left:0%; width:100%;height:90%;border:2px solid #454545;box-shadow: 2px 2px 2px 2px #454545;"></div>
 

 </body>
</html>



