// grabs the total amount items displayed as a result, this is used to set the upper bound of a loop to store data
function getTotalLocations() {
  var totalLocations = document.getElementById('totalLocations').value;
  return totalLocations;
}

// stores attribute data from the search result html hidden elements
function storeAttributeValue(attr) {
  var list = document.getElementsByClassName("resultData");
  var values = [];

  for (var i = 0; i < getTotalLocations(); i++) {
    values.push(list[i].getAttribute(attr)); 
  }

  return values;
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
  var latArray = storeAttributeValue('data-lat');
  var lngArray = storeAttributeValue('data-lng');
  var nameArray = storeAttributeValue('data-name');
  var idArray = storeAttributeValue('data-id'); 

  for (var i = 0; i < getTotalLocations(); i++) { // assigns are marker at the designated positon
    marker = new google.maps.Marker ({
        position: {lat: parseFloat(latArray[i]), lng: parseFloat(lngArray[i])}, // convert string vars to float
        map: map,
        id: idArray[i],
        title: nameArray[i],
        zIndex: i
    });
    // event listener to check if the marker has been clicked the info window will appear above the marker
    google.maps.event.addListener(marker, 'click', (function(marker, i) { 
         return function() {
             postIDMarker(marker.getPosition().lat(), marker.getPosition().lng(), marker.getTitle(), marker.id);
         }
    })(marker, i));
  }
}

// used to pass information of clicked marker to next page
function postIDMarker(lat, lng, itemName, itemID) {
  document.getElementById('hidden-itemlat').value = lat;
  document.getElementById('hidden-itemlng').value = lng;
  document.getElementById('hidden-itemname').value = itemName;
  document.getElementById('hidden-itemid').value = itemID;
  document.getElementById('searchResults').submit();
}

// used to pass information of clicked item to next page
function postID(clicked_item) {
  document.getElementById('hidden-itemlat').value = clicked_item.getAttribute('data-lat');
  document.getElementById('hidden-itemlng').value = clicked_item.getAttribute('data-lng');
  document.getElementById('hidden-itemname').value = clicked_item.getAttribute('data-value');
	document.getElementById('hidden-itemid').value = clicked_item.getAttribute('data-name');
	document.getElementById('searchResults').submit();
}

