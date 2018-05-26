var myLat = parseFloat(document.getElementById('hidden-itemlat').value); 
var myLng = parseFloat(document.getElementById('hidden-itemlng').value); 
 
// initialises google maps 
function initMap() { 
  var map = new google.maps.Map(document.getElementById('initMap'), { 
    zoom: 15, 
    center: {lat: myLat, lng: myLng} // default coordinate inwhich the map is centered 
  }); 
 
  setMarkers(map); 
} 
 
// responsible for setting all markers on the map 
function setMarkers(map) { 
 
  var infowindow = new google.maps.InfoWindow; // initalises a popup info window to appear 
 
    marker = new google.maps.Marker ({ 
        position: {lat: myLat, lng:myLng}, 
        map: map, 
        title: document.getElementById('hidden-itemname').value 
    }); 
    // event listener to check if the marker has been clicked the info window will appear above the marker 
    google.maps.event.addListener(marker, 'click', (function(marker, i) {  
         return function() { 
             infowindow.setContent(document.getElementById('hidden-itemname').value); 
             infowindow.open(map, marker); 
         } 
    })(marker)); 
}