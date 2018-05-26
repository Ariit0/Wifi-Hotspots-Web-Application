function getTotalLocations() {
  var totalLocations = document.getElementById('totalLocations').value;
  return totalLocations;
}

function storeLatLng() {
  var locations = [];

  for (var i = 0; i < getTotalLocations(); i++) {
    // add latlng coords to array
  }

  return locations;
}

// name, latlng, zindex (shows the order which these markers are shown ontop of each other)
var locations = [
      ['Test 1', -27.4698, 153.0251, 1],
      ['Test 2', -27.363, 136.044, 2],
      ['Test 3', -27.363, 135.044, 3]
];

function initMap() {
  var map = new google.maps.Map(document.getElementById('initMap'), {
    zoom: 10,
    center: {lat: -27.493318, lng: 152.91749953} // default coordinate inwhich the map is centered
  });

  setMarkers(map);
}

function setMarkers(map) {

  console.log(getTotalLocations());

  var infowindow = new google.maps.InfoWindow;

  for (var i = 0; i < locations.length; i++) {
    var locale = locations[i];
    marker = new google.maps.Marker ({
        position: {lat: locale[1], lng: locale[2]},
        map: map,
        title: locale[0],
        zIndex: locale[3]
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
         return function() {
             infowindow.setContent(locations[i][0]);
             infowindow.open(map, marker);
         }
    })(marker, i));
  }
}

// used to pass information of clicked item to next page
function postID(clicked_item) {
  
  document.getElementById('hidden-itemname').value = clicked_item.getAttribute('value');
	document.getElementById('hidden-itemid').value = clicked_item.name;
	document.getElementById('searchResults').submit();
}

