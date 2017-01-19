<head>
  <meta charset="utf-8">

  <title><?php wp_title('|', true, 'right'); ?></title>

  <!-- mobile meta -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- /mobile meta -->

  <!-- icons & favicons -->
  <?php get_template_part('_core/icons'); ?>
  <!-- /icons & favicons -->

  <!-- wp-head -->
  <?php wp_head(); ?>
  <!-- /wp-head -->

  <!-- RSS Feed -->
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
  <!-- /RSS Feed -->

</head>
