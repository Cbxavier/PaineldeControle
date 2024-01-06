var map;

function initialize() {
  var mapProp = {
    center: new google.maps.LatLng(-18.2381, -43.611),
    zoom: 14,
    scrollwheel: false,
    styles: [{
      stylers: [{
        saturation: -100
      }]
    }],
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById("map"), mapProp);
}

// <body onload="initialize();"/>
// initialize();
