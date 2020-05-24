var baron__filter = null,
  filter_height = null;

$(document).ready(function () {
  "use strict";
  baron__filter = baron({
    root: "div.baron.baron-filter",
    scroller: "div.baron.baron-filter > div.baron-scroller",
    bar: "div.baron.baron-filter > div.baron-track > div.baron-bar"
  }).autoUpdate();
  $(".filter-toggle").on("click", function () {
    $(".wrapper").toggleClass("selected");
  });
  $("ul.filter-form-list > li > div").on("click", function () {
    if ($(this).parent("li").hasClass("selected")) {
      $(this).parent("li").find("ol").animate({
        height: 0
      }, 250);
    } else {
      filter_height = 0;
      $(this).parent("li").find("ol").find("li").each(function () {
        filter_height = Math.round(filter_height + $(this).outerHeight());
      });
      $(this).parent("li").find("ol").animate({
        height: filter_height
      }, 250);
    }
    $(this).parent("li").toggleClass("selected");
  });
  $("ol.filter-form-list > li > div").on("click", function () {
    $(this).parent("li").toggleClass("selected");
  });
  return false;
});

$(document).on('touchstart  mousedown', '.wrapper > .container > .alpha', function () {
  "use strict";
  if ($(".wrapper").hasClass("selected")) {
    $(".wrapper").removeClass("selected");
  }
});
