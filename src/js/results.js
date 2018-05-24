function initMap() {
	var mapOptions = {
	    center: new google.maps.LatLng(51.5, -0.12),
	    zoom: 10,
	    mapTypeId: google.maps.MapTypeId.HYBRID
	}


	var marker = new google.maps.Marker({
          position: new google.maps.LatLng(51.5, -0.12),
          map: map,
          title: 'Hello World!'
     });

	var map = new google.maps.Map(document.getElementById("initMap"), mapOptions);
}