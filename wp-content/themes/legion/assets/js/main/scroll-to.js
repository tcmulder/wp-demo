/*------------------------------------*\
  ::Scroll-To
\*------------------------------------*/
jQuery(document).ready(function ($) {
  'use strict';

  // on load
  var urlHash = window.location.href.split("#")[1];
  if(urlHash){
    var $el = $('.' + urlHash + ', #' + urlHash +',[name='+urlHash+']');
    if($el.length > 0){
      $('html,body').animate({
        scrollTop: $el.first().offset().top
      }, 1500);
    }
  }

  // on click
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1500);
        return false;
      }
    }
  });
});
