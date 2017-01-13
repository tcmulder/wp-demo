<?php
namespace Roots\Sage\Setup;

use Roots\Sage\Assets;


/**
 * Theme assets
 */
/*function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);
  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);*/

function ap_override_sage() {
   wp_dequeue_style( 'sage/css' );
   wp_deregister_script( 'sage/js' );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\ap_override_sage', 105 );

function ap_setup() {
  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('css/style.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\ap_setup');

/**
 * Theme assets
 */
function ap_assets() {
  wp_enqueue_style('ap/css', Assets\asset_path('css/style.css'), false, null);
  wp_enqueue_script('ap/js', Assets\asset_path('js/min/main.min.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\ap_assets', 110);
