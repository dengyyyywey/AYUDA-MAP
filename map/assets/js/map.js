    // Check if the browser supports geolocation

    

    var latitude;
    var longitude;
    var marker_data ;
    var map;
    var popup;

// Success callback function
function successCallback(position) {
    // Access latitude and longitude from the position object
    latitude = position.coords.latitude;
    longitude = position.coords.longitude;

    // $('#Latitude').val(latitude);
    // $('#Longitude').val(longitude);

    map.remove();

    // map = L.map('map1').setView([latitude, longitude], 10);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
      }).addTo(map);
    // load map tiles
    // L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
    //     attribution: 'Data <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, '
    //     + 'Map tiles &copy; <a href="https://carto.com/attribution">CARTO</a>'
    //   }).addTo(map);
    popup = L.popup();

    marker_data = L.marker([latitude, longitude]).addTo(map)
    .bindPopup('My Location');
    map.on('click', onMapClick);
}
// Error callback function
function errorCallback(error) {
    switch (error.code) {
    case error.PERMISSION_DENIED:
        console.log("User denied the request for Geolocation.");
        break;
    case error.POSITION_UNAVAILABLE:
        console.log("Location information is unavailable.");
        break;
    case error.TIMEOUT:
        console.log("The request to get user location timed out.");
        break;
    case error.UNKNOWN_ERROR:
        console.log("An unknown error occurred.");
        break;
    }
}

map = L.map('map1').setView([14.655739, 120.976566], 15);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  marker_data = L.marker([14.655739, 120.976566]).addTo(map);

popup = L.popup();
// if ("geolocation" in navigator) {
//     // Request the user's current position
//     navigator.geolocation.getCurrentPosition(successCallback, errorCallback);

    
// } else {
//     console.log("Geolocation is not supported by this browser.");
// }


map.on('click', onMapClick);

    
function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);

    marker_data.remove();
    marker_data = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
    latlang = marker_data.getLatLng();
    convertToAddress(latlang);
    $('#Latitude').val(e.latlng.lat);
    $('#Longitude').val(e.latlng.lng);
}

var apiKey = 'caafea982d2b490ea5117e5af8a295ef';
function convertToAddress(latlng) {
    var url = `https://api.opencagedata.com/geocode/v1/json?q=${latlng.lat},${latlng.lng}&key=${apiKey}`;

    fetch(url)
      .then(response => response.json())
      .then(data => {
        if (data.results && data.results.length > 0) {
          var formattedAddress = data.results[0].formatted;
          $('input[name="address"]').val(formattedAddress);
        } else {
          alert('No address found');
        }
      })
      .catch(error => {
        console.error('Error:', error);
      });
  }