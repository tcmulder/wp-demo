<?php if(is_front_page()) : ?>
  <?php
  /* Demo note:
   * Typically I use ACF Pro, so I would modularize
   * these using flexible content fields rather
   * than hard-coding the order like this and then
   * I'd dynamically load them so the site admin
   * can flexibly reorganize/change the page, adding
   * modules as desired.
   */
  ?>
  <?php get_template_part('templates/modules/module', 'features-slider'); ?>
  <?php get_template_part('templates/modules/module', 'grid-gallery'); ?>
<?php else : ?>
  <?php the_title(); ?>
  <?php the_content(); ?>
<?php endif; ?>


