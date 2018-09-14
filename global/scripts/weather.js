function initWeather() {
  if(supports_html5_storage()) {
//    console.log("Local storage available");
    if(localStorage.getItem("lat") !== null && localStorage.getItem("lng") !== null) {
      retriveWeather(localStorage["lat"], localStorage["lng"])  
    } else {
      var weatherZip = document.getElementById("weather_zip");
      weatherZip.style.display = 'inline-block';
      var weather = document.getElementById("weather");
      weather.style.display = 'none';
    }
  } else {
    
  }
}

function resetWeather() {
  localStorage.removeItem("lat");
  localStorage.removeItem("lng");
}

function retriveWeather(lat, lng) {
  if(lat == null || lng == null) {
    console.log("Lat/lng cannot be null");
    return;
  }
  $.ajax({
    type: 'POST',
    url: '../_lib/weatherbug/weather.php',
    data: {
      lat: lat,
      lng: lng
    },
    dataType: "json",
    success: function(data){
      var weatherZip = document.getElementById("weather_zip");
      var weather = document.getElementById("weather");
      weather.getElementsByClassName('current_temp')[0].innerHTML = data.current_temp+"&deg;F";
      weather.getElementsByClassName('weather_icon')[0].setAttribute('src', '/images/'+data.icon_filepath_md);
      weatherZip.style.display = 'none';
      weather.style.display = 'inline-block';
    },
    error: function(xhr, type, exception) { 
      console.log("ajax error response type: "+type);
    }
  });
}

function resolveZip(zip) {
  $.ajax({
    type: 'POST',
    url: '../_lib/weatherbug/latlng.php',
    data: {
      zip: zip
    },
    dataType: "json",
    success: function(data){
      localStorage.setItem("lat", data.lat);
      localStorage.setItem("lng", data.lng);
      localStorage.setItem("city", data.city);
      localStorage.setItem("state", data.state);
      retriveWeather(data.lat, data.lng);
    },
    error: function(xhr, type, exception) { 
      console.log("ajax error response type: "+type);
    }
  });
}

function supports_html5_storage() {
  try {
    return 'localStorage' in window && window['localStorage'] !== null;
  } catch (e) {
    return false;
  }
}