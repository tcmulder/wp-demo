<?php header('Content-type: text/html; charset=utf-8'); 
	if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){
		header('X-UA-Compatible: IE=edge,chrome=1');
	}
use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>
    <!doctype html>
    <html class="no-js" <?php language_attributes(); ?>>

    <?php get_template_part('_core/head'); ?>

    <body <?php body_class(); ?>>

      <!--[if lt IE 9]>
        <div class="alert alert__warning">
          <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
        </div>
      <![endif]-->
      
      <header class="header header--js" id="top">
        <?php
          do_action('get_header');
          get_template_part('_core/header');
        ?>
      </header>

      <main id="main" class="main wrapper">
        <div class="main__inner">
          <?php include Wrapper\template_path(); ?>
        </div>
      </main>
      
      <footer class="footer">
        <?php get_template_part('_core/footer'); ?>
      </footer>

      <?php do_action('get_footer'); ?>
      <?php wp_footer(); ?>

    </body>

    </html>