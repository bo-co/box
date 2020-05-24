$(document).ready(function () {
  "use strict";
  $(".filter-button-div-span").on("click", function () {
    $(".wrapper").toggleClass("selected");
  });
  $(".filter-close").on("click", function () {
    $(".wrapper").toggleClass("selected");
  });
  return false;
});

$(document).on('touchstart  mousedown', '.wrapper > .alpha', function () {
  if ($(".wrapper").hasClass("selected")) {
    $(".wrapper").removeClass("selected");
  }
});
