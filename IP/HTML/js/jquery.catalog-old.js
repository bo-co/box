var quantity = null,
  quantity_user = null;

$(document).ready(function () {
  "use strict";
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


    if ($(".catalog-section-item." + $(this).data("form")).length !== 0) {
      if (quantity < 1) {
        if ($(".catalog-section-item." + $(this).data("form")).hasClass("selected")) {
          $(".catalog-section-item." + $(this).data("form")).removeClass("selected");
        }
      } else {
        if (!$(".catalog-section-item." + $(this).data("form")).hasClass("selected")) {
          $(".catalog-section-item." + $(this).data("form")).addClass("selected");
        }
      }
      $(".catalog-section-item." + $(this).data("form") + " a > div > div > .catalog-section-item-alpha-div-value").text(quantity);
    }


  });
  return false;
});
