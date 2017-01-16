jQuery(document).ready(function ($) {
    'use strict';

    /*------------------------------------*\
        ::Navigation
    \*------------------------------------*/
    $('#js-nav-trigger').on('click', function(){
        $(this).toggleClass('active');
    });
});