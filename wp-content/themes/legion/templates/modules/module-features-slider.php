<article class="features-slider main-torso__group main-torso__group--bg-drab main-torso__group--angle-bottom main-torso__group--angle-reverse">
  <div class="features-slider__inner">
    <?php if(get_field('features_slider_title')) : ?>
      <h3><?php the_field('features_slider_title'); ?></h3>
    <?php endif; ?>
    <div class="js-features-slider">
      <?php for ($i=1; $i <= 5; $i++) : ?>
        <?php $slide_image = get_field('features_slider_image_'.$i); ?>
        <?php if ($slide_image) : ?>
          <?php
            // add user-selectable background images
            $attr = array(
              'images' => array(
                '(min-width: 801px)' => $slide_image['sizes']['hero'],
                '(max-width: 800px)'  => $slide_image['sizes']['two-third'],
                '(max-width: 500px)'  => $slide_image['sizes']['half']
              )
            );
            // execute the function and store the resulting array
            $bg_image = bg_image($attr);
          ?>
          <div class="features-slider__slide <?php echo $bg_image['class']; // echo the disambiguated selector ?>">
            <?php echo $bg_image['styles']; // echo the <style> tag ?>
          </div>
        <?php else : ?>
          <?php break; ?>
        <?php endif ?>
      <?php endfor; ?>
    </div>
  </div>
</article>