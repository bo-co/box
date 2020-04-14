var vhCSS = null,
  baron__nav = null,
  baron__article = null,
  baron__choose = null,
  baron__scroller = "div.baron > div.baron-scroller",
  baron__bar = "div.baron > div.baron-track > div.baron-bar",
  menuHeight = null,
  isLoad = false,
  isInit = parseInt($("div.baron.baron-article > div.baron-scroller > ul").outerHeight() - $("li.footer-li").outerHeight() - $(window).innerHeight() + $("div.header").outerHeight());

function loadJS(source, order) {
  "use strict";
  var s = document.getElementsByTagName('head')[0],
    sc = document.createElement('script');
  sc.acync = order;
  sc.src = source;
  s.appendChild(sc);
}

function loadCSS(source, type) {
  "use strict";
  var s = document.getElementsByTagName("head")[0],
    sc = document.createElement("link");
  sc.rel = type;
  sc.href = source;
  s.appendChild(sc);
}

function isVH() {
  "use strict";
  setTimeout(function () {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty("--vh", `${vh}px`);
  }, 50);
}

function isResize() {
  "use strict";
  if ($("div.container").hasClass("opened")) {
    $("div.container").removeClass("opened").addClass("closed");
  }
  if (!vhCSS) {
    loadCSS("css/vh.css?" + $.now(), "stylesheet");
    vhCSS = true;
  }
  isVH();
  setTimeout(function () {
    baron__nav.update();
    baron__article.update();
  }, 50);
}

$(document).ready(function () {
  "use strict";
  baron__nav = baron({
    root: "div.baron-nav",
    scroller: baron__scroller,
    bar: baron__bar
  }).autoUpdate();
  baron__article = baron({
    root: "div.baron-article",
    scroller: baron__scroller,
    bar: baron__bar
  }).autoUpdate();
  $("div.baron-scroller").on("scroll", $.debounce(250, true, function () {
    $(this).next("div.baron-track").find("div.baron-bar").css({
      "opacity": "0.5"
    });
  }));
  $("div.baron-scroller").on("scroll", $.debounce(500, function () {
    $(this).next("div.baron-track").find("div.baron-bar").css({
      "opacity": "0"
    });
  }));
  $("ul.burger").on("click", function () {
    if ($("div.container").hasClass("opened")) {
      $("div.container").removeClass("opened").addClass("closed");
    } else {
      $("div.container").removeClass("closed").addClass("opened");
    }
  });
  $("nav > ul > li > span").on("click", function () {
    if ($(this).parent("li.more").hasClass("selected")) {
      $(this).parent("li.more").find("ul").animate({
        height: 0
      }, 250);
      $(this).parent("li.more").removeClass("selected");
    } else {
      menuHeight = 0;
      $(this).parent("li.more").find("ul").find("li").each(function () {
        menuHeight = Math.round(menuHeight + $(this).outerHeight());
      });
      $(this).parent("li.more").find("ul").animate({
        height: menuHeight
      }, 250);
      $(this).parent("li.more").addClass("selected");
    }
  });
  $(".move").on("click", function (e) {
    if ($("div.container").hasClass("opened")) {
      $("div.container").removeClass("opened").addClass("closed");
    }
    $("div.baron.baron-article > div.baron-scroller").scrollTo($("#" + $(this).data("move")), 600);
    e.preventDefault();
  });
  $("div.baron.baron-article > div.baron-scroller").scroll(function () {
    if ($("div.baron.baron-article > div.baron-scroller").scrollTop() > isInit && !isLoad) {
      loadJS("https://api-maps.yandex.ru/2.1.72/?lang=ru_RU", true);
      loadJS("js/jquery.inputmask.js?" + $.now(), true);
      setTimeout(function () {
        loadJS("map/map.js?" + $.now(), true);
        $("input[type=tel]").inputmask("+7 (999) 999-99-99");
      }, 600);
      isLoad = true;
    }
  });
  return false;
});
