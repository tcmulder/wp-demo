<nav class="nav-head">
    <a href="javascript:void(0);" id="js-nav-trigger" class="nav-head__trigger">
        <span><!-- non-semantic (╯°□°）╯︵ ┻━┻ --></span>
        <span><!-- but what can you do? ¯\_(ツ)_/¯  --></span>
        <span><!-- it looks so cool ┻━┻︵ \(°□°)/ ︵ ┻━┻ --></span>
    </a>
    <?php
      $attr = array(
        'container_class' => 'nav-head__wrap',
        'container'       => 'div',
        'theme_location'  => 'ap_main',
      );
      wp_nav_menu($attr);
    ?>
</nav>
<h1 class="main-head__offset-title">Build Something <span>Beautiful</span></h1>
<a href="#main" class="main-head__down">Scroll Down</a>
