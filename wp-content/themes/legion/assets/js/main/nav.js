/*------------------------------------*\
  ::Navigation
\*------------------------------------*/
jQuery(document).ready(function ($) {
  'use strict';
  $('#js-nav-trigger').on('click', function(){
    $(this).toggleClass('active');
  });
});