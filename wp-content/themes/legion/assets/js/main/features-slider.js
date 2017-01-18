/*------------------------------------*\
    ::Features Slider Module
\*------------------------------------*/
jQuery(document).ready(function ($) {
  'use strict';
  $('.js-features-slider').flickity({
    cellSelector: '.features-slider__slide',
    prevNextButtons: false
  });
});
