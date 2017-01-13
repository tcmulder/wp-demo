<?php
function ap_register_menus() {
register_nav_menus( array(
	'ap_main' => 'Main Menu',
	'ap_footer1' => 'Footer Column 1',
	'ap_footer2' => 'Footer Column 2',
) );
}
add_action( 'init', 'ap_register_menus' );