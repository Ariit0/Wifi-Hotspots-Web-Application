var lat = document.getElementById("hidden-lat");
var long = document.getElementById("hidden-long");
var e = document.getElementById("suburbOption");

var a;
var b;

function getLocation() {
    if (navigator.geolocation && e.value == "NearMe" ) {
        navigator.geolocation.getCurrentPosition(postPosition);
        return true;
    } else { 
        return false;
    }
}

function test() {
    navigator.geolocation.getCurrentPosition(postPosition);
}

function postPosition(position) {
	long.value = position.coords.longitude;
	lat.value = position.coords.latitude;

	a =  position.coords.longitude;
	b =  position.coords.latitude;
}

function getLong(){
	return a;
}

function getLong(){
	return b;
}
