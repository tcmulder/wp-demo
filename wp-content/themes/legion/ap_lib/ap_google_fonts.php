<?php
function assets() {
  $googlefontlist = 'Open+Sans:400,700,300';
  wp_enqueue_style('apl_google_font', '//fonts.googleapis.com/css?family='. $googlefontlist, false, NULL);
}
add_action('wp_enqueue_scripts', 'assets', 100);