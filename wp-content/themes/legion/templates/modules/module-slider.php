<article class="features-slider features-slider--bg-dark main-torso__group">
    <div class="features-slider__inner">
        <div class="js-features-slider">
            <?php for ($i=1; $i <= 5; $i++) : ?>
                <?php $slide_image = get_field('image_'.$i); ?>
                <?php if ($slide_image) : ?>
                    <?php
                        // add user-selectable background images
                        $attr = array(
                            'images' => array(
                                '(min-width: 801px)' => $slide_image['sizes']['large'],
                                '(max-width: 800px)'  => $slide_image['sizes']['large']
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