// grabs the total amount items displayed as a result, this is used to set the upper bound of a loop to store data
function getTotalLocations() {
  var totalLocations = document.getElementById('totalLocations').value;
  return totalLocations;
}
// stores geo location data (latitude / longitude)
function storeLatLng() {
  var listLatLng = document.getElementsByClassName("resultLatLngs");
  var latLngs = [];

  for (var i = 0; i < getTotalLocations(); i++) {
    latLngs.push(listLatLng[i].value);    // add latlng coords to array
  }

  return latLngs;
}
// stores name data
function storeName() {
  var listName = document.getElementsByClassName("resultLatLngs");
  var names = [];

  for (var i = 0; i < getTotalLocations(); i++) {
    names.push(listName[i].name);     // add names to array
  }

  return names;
}
// initialises google maps
function initMap() {
  var map = new google.maps.Map(document.getElementById('initMap'), {
    zoom: 11,
    center: {lat: -27.461318, lng: 153.043644} // default coordinate inwhich the map is centered
  });

  setMarkers(map);
}
// responsible for setting all markers on the map
function setMarkers(map) {
  var latLng = storeLatLng();
  var name = storeName();

  var lats = [];
  var lngs = [];

  for (var i = 0; i < latLng.length; i++) {   // split lat and long into separate arrays 
      var split = latLng[i].split(" "); 
      lats.push(split[0]);
      lngs.push(split[1]);
  }

  var infowindow = new google.maps.InfoWindow; // initalises a popup info window to appear

  for (var i = 0; i < latLng.length; i++) { // assigns are marker at the designated positon
    marker = new google.maps.Marker ({
        position: {lat: parseFloat(lats[i]), lng: parseFloat(lngs[i])}, // convert string vars to float
        map: map,
        title: name[i],
        zIndex: i
    });
    // event listener to check if the marker has been clicked the info window will appear above the marker
    google.maps.event.addListener(marker, 'click', (function(marker, i) { 
         return function() {
             infowindow.setContent(name[i]);
             infowindow.open(map, marker);
         }
    })(marker, i));
  }
}

// used to pass information of clicked item to next page
function postID(clicked_item) {
  document.getElementById('hidden-itemlat').value = clicked_item.getAttribute('data-lat');
  document.getElementById('hidden-itemlng').value = clicked_item.getAttribute('data-lng');
  document.getElementById('hidden-itemname').value = clicked_item.getAttribute('value');
	document.getElementById('hidden-itemid').value = clicked_item.name;
	document.getElementById('searchResults').submit();
}

