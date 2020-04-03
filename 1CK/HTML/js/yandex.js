ymaps.ready(init);

function init() {
  "use strict";
  var myMap = new ymaps.Map('map', {
    center: [52.574399, 39.616821],
    zoom: 17,
    controls: [],
    behaviors: []
  }, {
    searchControlProvider: 'yandex#search',
    yandexMapDisablePoiInteractivity: true
  });

  myMap.geoObjects.add(new ymaps.Placemark([52.574699, 39.615821], {
    iconCaption: 'г. Лицепк, улица Суворова, 28'
  }, {
    preset: 'islands#circleDotIcon',
    iconColor: '#C83834',
    iconOffset: [-8, 8]
  }));
}
