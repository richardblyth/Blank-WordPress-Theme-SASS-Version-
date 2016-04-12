// FastClick: polyfill to remove click delays on browsers with touch UIs
// prepros-prepend vendor/fastclick.js

// jQuery.cookie: A simple, lightweight jQuery plugin for reading, writing and deleting cookies
// mprepros-prepend vendor/jquery.cookie.js

// Placeholder.js: polyfill for older browsers (IE9) to support input inline placeholders
// prepros-prepend vendor/placeholder.js

// Other plugins: from HTML 5 Boilerplate 4.3.0
//@prepros-prepend vendor/plugins.js

// Foundation: JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
// N.B. insert '@' after '//' to include component

// Foundation: all components
// prepros-prepend foundation.js 

// Or selectively include Foundation components
//@prepros-prepend foundation/foundation.js
// prepros-prepend foundation/foundation.abide.js
// prepros-prepend foundation/foundation.accordion.js
// prepros-prepend foundation/foundation.alert.js
// prepros-prepend foundation/foundation.clearing.js
// prepros-prepend foundation/foundation.dropdown.js
// prepros-prepend foundation/foundation.equalizer.js
// prepros-prepend foundation/foundation.interchange.js
// prepros-prepend foundation/foundation.joyride.js
// prepros-prepend foundation/foundation.magellan.js
// prepros-prepend foundation/foundation.offcanvas.js
// prepros-prepend foundation/foundation.orbit.js
// prepros-prepend foundation/foundation.reveal.js
// prepros-prepend foundation/foundation.slider.js
// prepros-prepend foundation/foundation.tab.js
// prepros-prepend foundation/foundation.tooltip.js
// prepros-prepend foundation/foundation.topbar.js

// Slick http://kenwheeler.github.io/slick/
//@prepros-prepend vendor/slick.js

// Tabs
// prepros-prepend vendor/tabs.js


/* INITIALISE */
$(document).foundation();


$(function() {

  /* Foundation Device Size Variables */
  var isSmallDevice = Foundation.utils.is_small_only();
  var isMediumDevice = Foundation.utils.is_medium_only();
  var isLargeUpDevice = Foundation.utils.is_large_up();


  /* Basic Drop Down Menu for WordPress */
  if (!Modernizr.touch) {
    $('.menu .menu-item-has-children').mouseover(function () {  
      $('ul:first', this).stop(true, true).addClass('active');
    });
    $('.menu .menu-item-has-children').mouseleave(function () {   
      $('ul:first', this).stop(true, true).removeClass('active');
    });
  }


  /* Slick */
  /*$('.example-carousel').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: true
  });*/

});

/* $(document).ready(function(){
}); */