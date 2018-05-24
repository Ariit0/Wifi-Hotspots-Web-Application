function initMap() {
  var myLatLng = {lat: -27.4698, lng: 153.0251};
  var myLatLng2 = {lat: -25.363, lng: 135.044};

  var map = new google.maps.Map(document.getElementById('initMap'), {
    zoom: 10,
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