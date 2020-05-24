$(document).ready(function () {
  "use strict";
  $(".filter-toggle").on("click", function () {
    $(".wrapper").toggleClass("selected");
  });
  return false;
});

$(document).on('touchstart  mousedown', '.wrapper > .container > .alpha', function () {
  if ($(".wrapper").hasClass("selected")) {
    $(".wrapper").removeClass("selected");
  }
});
