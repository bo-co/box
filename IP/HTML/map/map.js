ymaps.ready(init);

function init() {
  "use strict";
  var myMap = new ymaps.Map('map', {
    center: [55.8185477, 37.618354],
    zoom: 17,
    controls: [],
    behaviors: []
  }, {
    searchControlProvider: 'yandex#search',
    yandexMapDisablePoiInteractivity: true
  });

  myMap.geoObjects.add(new ymaps.Placemark([55.818927, 37.617754], {
    balloonContent: null,
    hintContent: null
  }, {
    iconLayout: 'default#image',
    iconImageHref: 'https://deltaclinic.ru/local/templates/deltaclinic_2019/img/finish.svg',
    iconImageSize: [48, 48],
    iconImageOffset: [-24, -32]
  }));

}
