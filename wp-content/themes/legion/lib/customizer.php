<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

use WP_Customize_Control;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');

/**
 * Footer
 */
add_action('customize_register', __NAMESPACE__ . '\\footer_customizer');
function footer_customizer($wp_customize) {

    $wp_customize->add_section( 'footer_content', array(
        'title'    => 'Footer Content',
        'priority' => 500, // pretty much the bottom
    ) );

    $wp_customize->add_setting( 'footer_title', array(
        'default'    => get_option( 'footer_title' ),
        'type'       => 'option',
        'sanitize_callback' => __NAMESPACE__ . '\\sanitize_text',
        'capability' => 'manage_options',
    ) );

    $wp_customize->add_control( 'footer_title', array(
        'label'      => 'Footer Title',
        'section'    => 'footer_content',
    ) );

    $wp_customize->add_setting( 'footer_text', array(
        'default'    => get_option( 'footer_text' ),
        'type'       => 'option',
        'sanitize_callback' => __NAMESPACE__ . '\\sanitize_text',
        'capability' => 'manage_options',
    ) );

    $wp_customize->add_control( 'footer_text', array(
        'label'      => 'Footer Text',
        'type'       => 'textarea',
        'section'    => 'footer_content',
    ) );

}

function sanitize_text($text) {
    return sanitize_text_field($text);
}