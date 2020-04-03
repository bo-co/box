ymaps.ready(init);

function init() {
  var myMap = new ymaps.Map("map", {
    center: [52.574699, 39.615821],
    zoom: 17,
    controls: [],
    behaviors: []
  }, {
    searchControlProvider: 'yandex#search',
    yandexMapDisablePoiInteractivity: true
  });

  myMap.geoObjects.add(new ymaps.Placemark([52.574699, 39.615821], {
    balloonContent: '<strong>Первая сетевая компания</strong><br />г. Лицепк, улица Суворова, 28',
    iconCaption: 'Первая сетевая компания'
  }, {
    preset: 'islands#circleDotIcon',
    iconColor: '#C83834',
    balloonCloseButton: false,
    hideIconOnBalloonOpen: false
  }));
}
