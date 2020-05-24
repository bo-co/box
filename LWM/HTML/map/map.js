ymaps.ready(init);

function init() {
  "use strict";
  var myMap = new ymaps.Map('map', {
    center: [55.747485, 37.581298],
    zoom: 17,
    controls: [],
    behaviors: []
  }, {
    searchControlProvider: 'yandex#search',
    yandexMapDisablePoiInteractivity: true
  });

  myMap.geoObjects.add(new ymaps.Placemark([55.747625, 37.581298], {
    balloonContent: null,
    hintContent: null
  }, {
    iconLayout: 'default#image',
    iconImageHref: '/resources/img/place.svg?190520201111',
    iconImageSize: [48, 48],
    iconImageOffset: [-24, -32]
  }));

}
