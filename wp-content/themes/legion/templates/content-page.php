<?php if(is_front_page()) : ?>
  <?php
  /* Demo Note:
   * Typically I use ACF Pro, so I would modularize
   * these using flexible content fields rather
   * than hard-coding the order like this.
   */
  ?>
  <?php get_template_part('templates/modules/module', 'features-slider'); ?>
  <?php get_template_part('templates/modules/module', 'grid-gallery'); ?>
<?php else : ?>
  <?php the_title(); ?>
  <?php the_content(); ?>
<?php endif; ?>


