$(document).ready(function () {
  "use strict";
  $(".catalog-section-header-filter").on("click", function () {
    $(".wrapper").toggleClass("selected");
  });
  return false;
});

$(document).on('touchstart  mousedown', '.wrapper > .alpha', function () {
  if ($(".wrapper").hasClass("selected")) {
    $(".wrapper").removeClass("selected");
  }
});
