var lat = document.getElementById("hidden-lat");
var long = document.getElementById("hidden-long");
var e = document.getElementById("suburbOption");

// used to obtain geo location
function getLocation() { 
    if (navigator.geolocation && e.value == "NearMe" ) {
        navigator.geolocation.getCurrentPosition(postPosition);
        return true;
    } else { // reset hidden field
        long.value = "";
        lat.value = "";
    }
}

function postPosition(position) {
	long.value = position.coords.longitude;
	lat.value = position.coords.latitude;
}