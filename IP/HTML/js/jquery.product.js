$(document).ready(function () {
  "use strict";
  $(".product-tabs-li-ul-li").on("click", function () {
    if (!$(this).hasClass("selected")) {
      $(".product-tabs-li-ul-li").removeClass("selected");
      $(".product-tabs-li-div").removeClass("selected");
      $(this).addClass("selected");
      $(".product-tabs-li-div." + $(this).data("tab")).addClass("selected");
      $("div.baron.baron-article > div.baron-scroller").scrollTo($("#" + $(this).data("move")), 600);
    }
  });
  $(".buy-info-div-form-button").on("click", function () {
    if ($(this).hasClass("basket") && !$(this).hasClass("selected")) {
      $(this).addClass("selected");
    }
  });
  var galleryThumbs = new Swiper('.product-gallery-wrapper-thumbs', {
    spaceBetween: 5,
    slidesPerView: 5,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });
  var galleryTop = new Swiper('.product-gallery-swiper-container', {
    pagination: {
      el: '.product-swiper-container-pagination',
      type: 'fraction',
    },
    scrollbar: {
      el: '.product-swiper-container-scrollbar',
      hide: true,
    },
    thumbs: {
      swiper: galleryThumbs
    }
  });
  return false;
});
