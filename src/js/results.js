function initMap() {
  var myLatLng = {lat: -27.4698, lng: 153.0251};
  var myLatLng2 = {lat: -25.363, lng: 135.044};

  var map = new google.maps.Map(document.getElementById('initMap'), {
    zoom: 12,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Hello World!'
  });

var marker2 = new google.maps.Marker({
    position: myLatLng2,
    map: map,
    title: 'Hello World!'
  });
}

// used to pass ID of clicked item to next page
function postID(clicked_item) {
	document.getElementById('hidden').value = clicked_item.name;
	document.getElementById('searchResults').submit();
}

