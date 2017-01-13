<?php
/**
 * Custom functions
 */


/* Allow Shortcodes in widgets */
add_filter('widget_text', 'do_shortcode');

/* Allow SVG uploads to the media */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');