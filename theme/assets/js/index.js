(function () {
  window.onload = function () {
    jQuery(document).ready(function () {
      placeholderSearch();
      load_after_scroll();
      awe_backtotop();
      awe_tab();
      awe_menumobile();
      initStickyHeader();
      renderLayout();
      handleCoupon();
      sliderPage();
      relatedProductSlide();
      customFilter();
      handleCateMenu();
    });
  };
})(jQuery);

var is_load = 0;

function load_after_scroll() {
  if (is_load) return;
  is_load = 1;
  jQuery(".home-slider").slick({
    lazyLoad: "ondemand",
    autoplay: true,
    autoplaySpeed: 3000,
    fade: false,
    cssEase: "linear",
    dots: true,
    arrows: true,
    infinite: true,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          arrows: false,
        },
      },
    ],
  });

  jQuery(".flashsale__news-list").slick({
    speed: 5000,
    autoplay: true,
    autoplaySpeed: 0,
    centerMode: true,
    cssEase: "linear",
    slidesToShow: 1,
    slidesToScroll: 1,
    variableWidth: true,
    infinite: true,
    initialSlide: 1,
    arrows: false,
    buttons: false,
  });
  if (window.matchMedia("(min-width: 992px)").matches) {
    jQuery(".slick-new").removeClass("row");
    jQuery(".slick-new").slick({
      autoplay: false,
      autoplaySpeed: 6000,
      dots: false,
      arrows: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
          },
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
          },
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          },
        },
      ],
    });
    let productItem = jQuery(".slick-pro-banner .item_product_main").length;
    let productLimit = 5;
    let hasbanner = jQuery(".slick-pro-banner").hasClass("has_banner");
    if (hasbanner) {
      productLimit = window.innerWidth < 992 ? 2 : 3;
    }
    let slidetoscroll = productLimit;
    productItem > productLimit &&
      jQuery(".slick-pro-banner").slick({
        autoplay: false,
        autoplaySpeed: 6000,
        dots: false,
        arrows: true,
        infinite: false,
        speed: 300,
        slidesToShow: slidetoscroll,
        slidesToScroll: slidetoscroll,
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: slidetoscroll,
              slidesToScroll: slidetoscroll,
            },
          },

          {
            breakpoint: 991,
            settings: {
              slidesToShow: slidetoscroll,
              slidesToScroll: slidetoscroll,
            },
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: slidetoscroll,
              slidesToScroll: slidetoscroll,
            },
          },
        ],
      });
    let brandsItem = jQuery(".section_brand .row .item").length;

    jQuery(".section_brand .row").slick({
      autoplay: false,
      autoplaySpeed: 6000,
      dots: false,
      arrows: true,
      infinite: false,
      speed: 300,
      slidesToShow: brandsItem > 6 ? 6 : brandsItem,
      slidesToScroll: brandsItem > 6 ? 6 : brandsItem,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: brandsItem > 6 ? 6 : brandsItem,
            slidesToScroll: brandsItem > 6 ? 6 : brandsItem,
          },
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
          },
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          },
        },
      ],
    });
    let collsItem = jQuery(".section_collections .row .item").length;
    jQuery(".section_collections .row").slick({
      autoplay: false,
      autoplaySpeed: 6000,
      dots: false,
      arrows: true,
      infinite: false,
      speed: 300,
      slidesToShow: collsItem,
      slidesToScroll: collsItem,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: collsItem,
            slidesToScroll: collsItem,
          },
        },
        {
          breakpoint: 1025,
          settings: {
            slidesToShow: 8,
            slidesToScroll: 8,
          },
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          },
        },
      ],
    });
  }
}

(function ($) {
  "use strict";
  $.fn.placeholderTypewriter = function (options) {
    var settings = $.extend({ delay: 50, pause: 1000, text: [] }, options);
    function typeString($target, index, cursorPosition, callback) {
      var text = settings.text[index];
      var placeholder = $target.attr("placeholder");
      $target.attr("placeholder", placeholder + text[cursorPosition]);
      if (cursorPosition < text.length - 1) {
        setTimeout(function () {
          typeString($target, index, cursorPosition + 1, callback);
        }, settings.delay);
        return !0;
      }
      callback();
    }
    function deleteString($target, callback) {
      var placeholder = $target.attr("placeholder");
      var length = placeholder.length;
      $target.attr("placeholder", placeholder.substr(0, length - 1));
      if (length > 1) {
        setTimeout(function () {
          deleteString($target, callback);
        }, settings.delay);
        return !0;
      }
      callback();
    }
    function loopTyping($target, index) {
      $target.attr("placeholder", "");
      typeString($target, index, 0, function () {
        setTimeout(function () {
          deleteString($target, function () {
            loopTyping($target, (index + 1) % settings.text.length);
          });
        }, settings.pause);
      });
    }
    return this.each(function () {
      loopTyping(jQuery(this), 0);
    });
  };
})(jQuery);

function placeholderSearch() {
  jQuery(document).ready(function () {
    if (jQuery(".search-bar").length) {
      const placeholderText = [
        "Tìm theo tên sản phẩm...",
        "Tìm theo thương hiệu...",
      ];
      jQuery(".search-bar .auto-search").placeholderTypewriter({
        text: placeholderText,
      });
    }
  });
}

function awe_backtotop() {
  if (jQuery(".back-to-top").length) {
    var scrollTrigger = 100, // px
      backToTop = function () {
        var scrollTop = jQuery(window).scrollTop();
        if (scrollTop > scrollTrigger) {
          jQuery(".back-to-top").addClass("show");
        } else {
          jQuery(".back-to-top").removeClass("show");
        }

        if (scrollTop > jQuery(document).height() - 700) {
          jQuery(".back-to-top").addClass("end");
        } else {
          jQuery(".back-to-top").removeClass("end");
        }
      };
    backToTop();
    jQuery(window).on("scroll", function () {
      backToTop();
    });
    jQuery(".back-to-top").on("click", function (e) {
      e.preventDefault();
      jQuery("html,body").animate(
        {
          scrollTop: 0,
        },
        700
      );
    });
  }
}

function awe_tab() {
  jQuery(".e-tabs:not(.not-dqtab)").each(function () {
    jQuery(this)
      .find(".tabs-title li")
      .click(function (e) {
        console.log(123);
        var tab_id = jQuery(this).attr("data-tab");
        var url = jQuery(this).attr("data-url");
        var tab_content = jQuery(this).parents(".e-tabs").next(".e-tabs");
        jQuery(this).closest(".e-tabs").find(".tab-viewall").attr("href", url);
        jQuery(this)
          .closest(".e-tabs")
          .find(".tabs-title li")
          .removeClass("current");
        tab_content.find(".tab-content").removeClass("current");
        jQuery(this).addClass("current");
        console.log(tab_content.html());

        tab_content.find("#" + tab_id).addClass("current");
      });
  });
}

/********************************************************
# MENU MOBILE
********************************************************/
function awe_menumobile() {
  jQuery(".menu-bar").click(function (e) {
    e.preventDefault();
    jQuery("#nav").toggleClass("open");
  });
  jQuery("#nav .fa").click(function (e) {
    e.preventDefault();
    jQuery(this).parent().parent().toggleClass("open");
  });
}

function initStickyHeader() {
  const stickyHeader = jQuery(".header_menu");
  const sticky = jQuery(window).height() / 2;
  jQuery(window).scroll(() => {
    let searchValue = jQuery(
      " .header_menu #search-header .custom-input-group .input-group-field"
    ).val();
    if (window.pageYOffset > sticky) {
      stickyHeader.addClass("active");
    } else if (
      (window.innerWidth >= 992 && window.pageYOffset < sticky - 30) ||
      (window.innerWidth < 992 && window.pageYOffset < sticky - 83)
    ) {
      stickyHeader.removeClass("active");
    }
  });
}

function renderLayout() {
  jQuery(".close-pop").click(function () {
    jQuery("#popup-cart").removeClass("opencart");
    jQuery("body").removeClass("opacitycart");
  });
  jQuery(document).on(
    "click",
    ".overlay, .close-popup, .btn-continue, .fancybox-close",
    function () {
      hidePopup(".awe-popup");
      setTimeout(function () {
        jQuery(".loading").removeClass("loaded-content");
      }, 500);
      return false;
    }
  );
  jQuery(".dropdown-toggle").click(function () {
    jQuery(this).parent().toggleClass("open");
  });

  jQuery(".btn-close").click(function () {
    jQuery(this).parents(".dropdown").toggleClass("open");
  });
  var wDWs = jQuery(window).width();

  jQuery(document).on("click", ".open-filters", function (e) {
    e.stopPropagation();
    jQuery(this).toggleClass("openf");
    jQuery(".dqdt-sidebar").toggleClass("openf");
    jQuery("body").toggleClass("modal-open");
    jQuery(".opacity_menu").toggleClass("open_opacity");
  });
  jQuery(document).ready(function () {
    jQuery(".btn-wrap").click(function (e) {
      jQuery(this).parent().slideToggle("fast");
    });
  });
  jQuery(document).ready(function () {
    var wDW = jQuery(window).width();
    /*Footer*/
    if (wDW > 767) {
      jQuery(".toggle-mn").show();
    } else {
      jQuery(".footer-click > .clicked").click(function () {
        jQuery(this).toggleClass("open_");
        jQuery(this).next("ul").slideToggle("fast");
        jQuery(this).next("div").slideToggle("fast");
      });
    }
  });

  /*MENU MOBILE*/
  var ww = jQuery(window).width();
  if (ww < 992) {
    jQuery(".menu-bar").on("click", function () {
      jQuery(".menu_mobile").slideToggle("400");
    });
  }
  jQuery(".opacity_menu").click(function (e) {
    jQuery(".menu_mobile").removeClass("open_sidebar_menu");
    jQuery(".opacity_menu").removeClass("open_opacity");
    jQuery(".sidebar").removeClass("openf");
    jQuery("body").toggleClass("modal-open");
  });

  if (jQuery(".dqdt-sidebar").hasClass("openf")) {
    jQuery(".wrapmenu_full").removeClass("open_menu");
  }
  jQuery(".ul_collections li > .fa").click(function () {
    jQuery(this).parent().toggleClass("current");
    jQuery(this).toggleClass("fa-angle-down fa-angle-up");
    jQuery(this).next("ul").slideToggle("fast");
    jQuery(this).next("div").slideToggle("fast");
  });
  jQuery(".searchion").mouseover(function () {
    jQuery(".searchmini input").focus();
  });
  jQuery(".quenmk").on("click", function () {
    jQuery(".h_recover").slideToggle();
  });

  jQuery('a[data-toggle="collapse"]').click(function (e) {
    if (jQuery(window).width() >= 767) {
      // Should prevent the collapsible and default anchor linking
      // behavior for screen sizes equal or larger than 768px.
      e.preventDefault();
      e.stopPropagation();
    }
  });
  /** custom **/

  jQuery(
    "#mobile-menu  .menu__category > ul > li.menu-item-has-children>ul"
  ).before(`<span data-toggle-submenu></span>`);

  jQuery("[data-toggle-submenu]").click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    jQuery(this).parents(".menu-item").addClass("active");
  });
  jQuery(".toggle-submenu").click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    jQuery("#mobile-menu .menu-item ").removeClass("active");
  });

  jQuery(".toggle-nav").click(function () {
    jQuery("#mobile-menu").addClass("active");
    jQuery("body").addClass("modal-open");
  });
  jQuery(".menu-overlay").click(function () {
    jQuery("#mobile-menu,.menu__category .menu-item-has-children").removeClass(
      "active"
    );

    jQuery("body").removeClass("modal-open");
  });

  jQuery(".auto-search").on("focus input", function (e) {
    if (e.target.value) {
      jQuery(".search-overlay").addClass("active");
    } else {
      jQuery(".search-overlay").removeClass("active");
    }
  });

  jQuery(".search-overlay").click(() => {
    jQuery(".search-overlay").removeClass("active");
  });

  if (jQuery(window).width() >= 992) {
    jQuery("body:not(.home ) .subheader .toogle-nav-wrapper").hover(
      function () {
        jQuery("body").addClass("menu-is-hover");
      },
      function () {
        jQuery("body").removeClass("menu-is-hover");
      }
    );
  }
}

function handleCoupon() {
  jQuery(".coupon_info_toggle").click(function () {
    let coupon = jQuery(this)
      .parent()
      .prev(".coupon_head")
      .find(".coupon-code")
      .text();
    let couponDesc = jQuery(this)
      .parent()
      .prev(".coupon_head")
      .find(".coupon_info")
      .text();
    let popupCode = jQuery("#popupCoupon .coupon-code");
    let popupDesc = jQuery("#popupCoupon .coupon-info");
    popupCode.text(coupon);
    popupDesc.text(couponDesc);
  });

  jQuery(document).on("click", ".coupon_copy", function () {
    let $couponCode = jQuery(this)
      .parent()
      .siblings(".coupon_head")
      .find(".coupon-code");
    let $copyButton = jQuery(this);

    // Lưu nội dung của coupon code vào clipboard
    let textToCopy = $couponCode.text().trim();
    let tempInput = jQuery("<input>");
    jQuery("body").append(tempInput);
    tempInput.val(textToCopy).select();
    document.execCommand("copy");
    tempInput.remove();

    $copyButton.children().text("Đã sao chép").prop("disabled", true);

    setTimeout(function () {
      $copyButton.children().text("Sao chép mã").prop("disabled", false);
    }, 3000);
  });
}

function sliderPage() {
  if (jQuery(".product__detail-thumbnail .flex-control-thumbs li").length > 4) {
    jQuery(".product__detail-thumbnail .flex-control-thumbs").slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      focusOnSelect: true,
      infinite: false,
    });
  }
}

function relatedProductSlide() {
  if (jQuery(".slickrelated .item").length >= 6) {
    jQuery(".slickrelated").slick({
      autoplay: false,
      autoplaySpeed: 6000,
      dots: false,
      arrows: true,
      infinite: false,
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 5,
      centerMode: false,
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
          },
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          },
        },
      ],
    });
  }
}

function customFilter() {
  jQuery("ul.content_ul li[data-sort]").on("click", function (e) {
    e.preventDefault();

    jQuery("ul.content_ul li").removeClass("active");

    jQuery(this).addClass("active");

    var selectedSortValue = jQuery(this).data("sort");

    jQuery("select.orderby").val(selectedSortValue);

    executeFilter(selectedSortValue);
  });

  jQuery("select.orderby").on("change", function () {
    var selectedValue = jQuery(this).val();

    jQuery("ul.content_ul li").removeClass("active");

    jQuery('ul.content_ul li[data-sort="' + selectedValue + '"]').addClass(
      "active"
    );

    executeFilter(selectedValue);
  });

  var initialSortValue = jQuery("select.orderby").val();
  jQuery('ul.content_ul li[data-sort="' + initialSortValue + '"]').addClass(
    "active"
  );

  function executeFilter(selectedValue) {
    window.location.href = "?orderby=" + selectedValue;
  }
}

function handleCateMenu() {
  if (jQuery(".menu__category").length) {
    jQuery(".menu__category .list-menu .menu-item").each(function () {
      jQuery(this)
        .children(".sub-menu")
        .find("> li")
        .wrapAll("<div class='sub-menu-wrapper' />");
    });
  }
}

function countDownTimer() {
  var hours = parseInt(jQuery(".ega-badge-ctd__h").text());
  var minutes = parseInt(jQuery(".ega-badge-ctd__m").text());
  var seconds = parseInt(jQuery(".ega-badge-ctd__s").text());
  var countDownDate = new Date();
  countDownDate.setHours(countDownDate.getHours() + hours);
  countDownDate.setMinutes(countDownDate.getMinutes() + minutes);
  countDownDate.setSeconds(countDownDate.getSeconds() + seconds);
  var countdown = setInterval(function () {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var hours = Math.floor(
      (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    jQuery(".ega-badge-ctd__h").text(hours);
    jQuery(".ega-badge-ctd__m").text(minutes);
    jQuery(".ega-badge-ctd__s").text(seconds);
    if (hours < 10) {
      jQuery(".ega-badge-ctd__h").html("0" + hours);
    }
    if (minutes < 10) {
      jQuery(".ega-badge-ctd__m").html("0" + minutes);
    }
    if (seconds < 10) {
      jQuery(".ega-badge-ctd__s").html("0" + seconds);
    }
    if (distance < 0) {
      clearInterval(countdown);
      jQuery(".ega-badge-ctd").text("Countdown expired");
    }
  }, 1000);
}
countDownTimer();
