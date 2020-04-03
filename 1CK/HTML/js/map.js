var marker;

function init() {
  var mapOptions = {
    zoom: 17,
    center: new google.maps.LatLng(55.909120, 37.917933),
    disableDefaultUI: true,
    scrollwheel: false,
    draggable: false,
    draggableCursor: "default",
    styles: [
      /* основной фон */
      {
        "elementType": "geometry",
        "stylers": [{
          "color": "#F5F5F5"
        }]
  			},
      {
        "elementType": "labels.icon",
        "stylers": [{
          "visibility": "off"
        }]
  			},
      {
        "elementType": "labels.text.fill",
        "stylers": [{
          "color": "#4D4D4D"
        }]
  			},
      /* обводка текста */
      {
        "elementType": "labels.text.stroke",
        "stylers": [{
          "visibility": "off",
          "color": "#F5F5F5"
        }]
  			},
      /* дороги */
      {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [
          {
            "color": "#C8C8C8"
      }
    ]
  }
]
  };
  var mapElement = document.getElementById('map');
  var map = new google.maps.Map(mapElement, mapOptions);
  var tarantul = {
    path: "M15 5c0-2.761-2.238-5-5-5s-5 2.239-5 5c0 4.775 5 10 5 10s5-5.225 5-10zM7.3 5.060c0-1.491 1.208-2.699 2.7-2.699s2.7 1.208 2.7 2.699c0 1.492-1.209 2.7-2.7 2.7s-2.7-1.209-2.7-2.7z",
    fillColor: "#C83834",
    fillOpacity: 1,
    scale: 3,
    strokeColor: "#C83834",
    strokeWeight: 0
  };
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(55.909450, 37.917233),
    icon: tarantul,
    map: map,
    title: "Первая сетевая компания",
    content: "111"
  });
  marker.addListener("click", toggleBounce);
  marker.setAnimation(google.maps.Animation.BOUNCE);
}

function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

google.maps.event.addDomListener(window, "load", init);
