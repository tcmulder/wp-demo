<?php
/**
 * Custom functions
 */

// we're firing all out initial functions at the start
add_action('after_setup_theme','penrose_initialise', 15);

function penrose_initialise() {
    // remove pesky injected css for recent comments widget
    add_filter( 'wp_head', 'remove_wp_widget_recent_comments_style', 1 );
    // clean up comment styles in the head
    add_action( 'wp_head', 'remove_recent_comments_style', 1);
    // clean up gallery output in wp
    add_filter( 'gallery_style', 'gallery_style');
    // cleaning up random code around images
    add_filter( 'the_content', 'filter_ptags_on_images');
    // add IE conditional CSS filter
    //add_filter( 'style_loader_tag', 'ie_conditional', 10, 2 );
}

// remove injected CSS for recent comments widget
function remove_wp_widget_recent_comments_style() {
   if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
      remove_filter('wp_head', 'wp_widget_recent_comments_style' );
   }
}

// remove injected CSS from recent comments widget
function remove_recent_comments_style() {
  global $wp_widget_factory;
  if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
  }
}

// remove injected CSS from gallery
function gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

// remove <p></p> around images
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
/*
function ie_conditional( $tag, $handle ) {

	global $wp_styles;

	wp_enqueue_style( 'my-theme-old-ie', get_stylesheet_directory_uri() . "/css/ie.css", array( 'my-theme' )  );
    $wp_styles->add_data( 'my-theme-old-ie', 'conditional', 'lt IE 9' );
}
*/

/* Clean out the Transient Database Files where possible */
add_action( 'wp_scheduled_delete', 'delete_expired_db_transients' );
function delete_expired_db_transients() {
    global $wpdb, $_wp_using_ext_object_cache;
    if( $_wp_using_ext_object_cache )
        return;
    $time = isset ( $_SERVER['REQUEST_TIME'] ) ? (int)$_SERVER['REQUEST_TIME'] : time() ;
    $expired = $wpdb->get_col( "SELECT option_name FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout%' AND option_value < {$time};" );
    foreach( $expired as $transient ) {
        $key = str_replace('_transient_timeout_', '', $transient);
        delete_transient($key);
    }
}

/* Remove the version number of WP */
remove_action('wp_head', 'wp_generator');

/* Remove the Emoji Script and CSS from the header */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );