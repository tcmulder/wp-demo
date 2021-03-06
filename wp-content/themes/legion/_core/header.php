<header class="main-head<?php echo (get_field('hero_title') ? ' main-head--has-hero main-head--angle-bottom main-head--bg-color' : ''); ?>" id="top">
  <nav class="nav-head">
      <a href="javascript:void(0);" id="js-nav-trigger" class="nav-head__trigger">
          <span><!-- non-semantic (╯°□°）╯︵ ┻━┻ --></span>
          <span><!-- but what can you do? ¯\_(ツ)_/¯  --></span>
          <span><!-- it looks so cool ┻━┻︵ \(°□°)/ ︵ ┻━┻ --></span>
      </a>
      <?php if ( get_theme_mod( 'nav_logo' ) ) : ?>
        <a href='<?php echo site_url(); ?>' title='Home' rel='home' class="nav-head__logo">
          <?php
            // include the SVG code, not just an <img> for styling purposes
            $image_url = get_theme_mod('nav_logo');
            $image_id = attachment_url_to_postid($image_url);
            $image_path = get_attached_file($image_id);
          ?>
          <?php include($image_path); ?>
        </a>
      <?php endif; ?>
      <?php
        $attr = array(
          'container_class' => 'nav-head__wrap',
          'container'       => 'div',
          'theme_location'  => 'ap_main',
        );
        wp_nav_menu($attr);
      ?>
  </nav>
  <?php if(get_field('hero_title')) : ?>
    <h1 class="main-head__offset-title">
      <?php the_field('hero_title'); ?>
      <?php if(get_field('hero_sub_title')) : ?>
        <span><?php the_field('hero_sub_title'); ?></span>
      <?php endif; ?>
    </h1>
    <a href="#main" class="main-head__down">Scroll Down</a>
  <?php endif; ?>
</header>