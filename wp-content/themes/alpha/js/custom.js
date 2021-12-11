jQuery(document).ready(function() {
  //console.log(value1);
  //alert("asdasd");
  // Menu Responsive
  jQuery(".touch .main-navigation ul li > a").on("click touchstart", function(
    event
  ) {
    if (
      !jQuery(this)
        .parent()
        .hasClass("open") &&
      jQuery(this)
        .parent()
        .has("ul").length > 0
    ) {
      event.preventDefault();
      event.stopPropagation();
      jQuery(this)
        .parent()
        .addClass("open")
        .siblings()
        .removeClass("open");
    }
  });

  jQuery(".mobile-icon a").on("touchstart", function(event) {
    event.stopPropagation();
    jQuery("body").toggleClass("open-menu");
    jQuery(this).toggleClass("active");
  });

  jQuery(document).on("touchstart", function(e) {
    if (!jQuery(e.target).closest(".header-right").length) {
      jQuery("body").removeClass("open-menu");
      jQuery(".hamburger").removeClass("active");
    }
  });

  /**/
  jQuery(".home-slider").slick({
    dots: jQuery(this).find(".home-slider .item").length > 1 ? true : false,
    infinite: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 1,
    slidesToScroll: 1
  });

  mainsectionheight();
  globle();

  var mySwiper = new Swiper ('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  });


});

jQuery(window).load(function() {
  mainsectionheight();
  globle();
});

jQuery(window).resize(function() {
  mainsectionheight();
  globle();
});

mainsectionheight = function(container) {
  var headerh = jQuery(".navigation").outerHeight();
  jQuery(".inner-page .banner").css("padding-top", headerh + "px");
};

equalheight = function(container) {
  if (jQuery(window).width() > 767) {
    var currentTallest = 0,
      currentRowStart = 0,
      rowDivs = new Array(),
      jQueryel;

    jQuery(container).each(function() {
      jQueryel = jQuery(this);
      jQuery(jQueryel).innerHeight("auto");
      rowDivs.push(jQueryel);
      currentTallest =
        currentTallest < jQueryel.innerHeight()
          ? jQueryel.innerHeight()
          : currentTallest;

      for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
        rowDivs[currentDiv].innerHeight(currentTallest);
      }
    });
  } else {
    jQuery(container).height("auto");
  }
};

equalheightformobile = function(container) {
  if (jQuery(window).width() > 319) {
    var currentTallest = 0,
      currentRowStart = 0,
      rowDivs = new Array(),
      jQueryel;

    jQuery(container).each(function() {
      jQueryel = jQuery(this);
      jQuery(jQueryel).innerHeight("auto");
      rowDivs.push(jQueryel);
      currentTallest =
        currentTallest < jQueryel.innerHeight()
          ? jQueryel.innerHeight()
          : currentTallest;

      for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
        rowDivs[currentDiv].innerHeight(currentTallest);
      }
    });
  } else {
    jQuery(container).height("auto");
  }
};

function globle() {
  equalheight(".event-section .row > div");
}
