var lat = document.getElementById("hidden-lat");
var long = document.getElementById("hidden-long");
var suburb = document.getElementById("suburbOption");

// Used to obtain geo location
function getLocation() { 
    if (navigator.geolocation && suburb.value == "NearMe" ) {
        navigator.geolocation.getCurrentPosition(postPosition);
        return true;
    } else {
        long.value = "";
        lat.value = "";
    }
}

function postPosition(position) {
	long.value = position.coords.longitude;
	lat.value = position.coords.latitude;
}