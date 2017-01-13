<?php

function ap_widgets_init() {
  // Sidebars
  register_sidebar(array(
    'name'          => __('Header Widget', 'sage'),
    'id'            => 'widget-header',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget__inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3 class="widget__title">',
    'after_title'   => '</h3>',
  ));
  register_sidebar(array(
    'name'          => __('Left Widget', 'sage'),
    'id'            => 'widget-left',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget__inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3 class="widget__title">',
    'after_title'   => '</h3>',
  ));
  register_sidebar(array(
    'name'          => __('Right Widget', 'sage'),
    'id'            => 'widget-right',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget__inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3 class="widget__title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Widget', 'sage'),
    'id'            => 'widget-footer',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget__inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3 class="widget__title">',
    'after_title'   => '</h3>',
  ));
}
add_action('widgets_init', 'ap_widgets_init');