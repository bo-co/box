var baron__filter = null,
  filter_height = null,
  url;

function getGoods() {
  "use strict";
  url = $("form[name=filter] > input[name=PATH]").val();
  /* url = url + "?PARENT_ID=" + $("form[name=filter] > input[name=PARENT_ID]").val(); */
  if ($("article > div.catalog > div > form > ul > li > ul > li.checked").length !== 0) {
    $("article > div.catalog > div > form > ul > li > ul > li.checked").each(function () {
      url = url + "&" + $(this).find("input").prop("name") + "=" + $(this).find("input").val();
    });
  }
  history.pushState(null, null, url);
  $.ajax({
    type: "POST",
    data: $("form[name=filter]").serialize(),
    url: "/resources/ajax/?action=filter",
    cache: false,
    dataType: "json"
  }).done(function (result) {
    if (result.status === "success") {
      /* $("div.form." + form).html(result.message); */
      console.log("ВЕБ-форма отправлена");
    } else {
      console.log(result.error);
    }
  }).fail(function () {
    console.log("ошибка отправки формы");
  });
  return false;
  /* $("div.loading").show();
  $("article > div.catalog > div > form").submit(); */
}

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
  if ($(".catalog-section").length !== 0) {
    getGoods();
  }
  return false;
});

$(document).on('touchstart  mousedown', '.wrapper > .container > .alpha', function () {
  "use strict";
  if ($(".wrapper").hasClass("selected")) {
    $(".wrapper").removeClass("selected");
  }
});
