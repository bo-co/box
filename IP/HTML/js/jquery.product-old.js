var quantity = null,
  quantity_user = null;

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
  $(".product-quantity-button").on("click", function () {
    quantity = parseInt($(".buy-info-div-form-quantity-input." + $(this).data("form")).data("value"));
    if ($(this).hasClass("plus")) {
      quantity = quantity + 1;
      quantity_user = quantity;
      if (!$(this).parent(".buy-info-div-form-quantity").hasClass("selected")) {
        $(this).parent(".buy-info-div-form-quantity").addClass("selected");
      }
    } else {
      quantity = quantity - 1;
      if (quantity < 1) {
        quantity = 0;
        quantity_user = 1;
        if ($(this).parent(".buy-info-div-form-quantity").hasClass("selected")) {
          $(this).parent(".buy-info-div-form-quantity").removeClass("selected");
        }
      } else {
        quantity_user = quantity;
      }
    }
    $(".buy-info-div-form-quantity-input." + $(this).data("form")).val(quantity_user);
    $(".buy-info-div-form-quantity-input." + $(this).data("form")).data({
      "value": quantity
    });
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
