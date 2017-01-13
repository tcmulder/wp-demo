<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',  // Scripts and stylesheets
  'lib/extras.php',  // Custom functions
  'lib/setup.php',   // Theme setup
  'lib/titles.php',  // Page titles
  'lib/wrapper.php',  // Theme wrapper class
  'lib/customizer.php',  // Theme wrapper class
  
    /* Penrose Specific functions */
    '/ap_lib/ap_custom.php',    				// General Custom Functions
    '/ap_lib/ap_google_fonts.php',       	// Activate Fonts
    '/ap_lib/ap_overrides.php',                 //Override Roots defaults
    '/ap_lib/ap_registerMenuLocations.php',               //Custom Menus
    '/ap_lib/ap_removals.php',    				// Custom Removals of Wordpress features
    '/ap_lib/ap_widgets.php',                   //Custom load google font libraries

  ];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);