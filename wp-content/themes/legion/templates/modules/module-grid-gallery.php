<article class="grid-gallery main-torso__group main-torso__group--margin-bottom">
    <div class="grid-gallery__inner">
        <?php if(get_field('grid_gallery_title')) : ?>
            <h3 class="grid-gallery__title"><?php the_field('grid_gallery_title'); ?></h3>
        <?php endif; ?>
        <div class="grid-gallery__frame">
            <?php for ($i=1; $i <= 4; $i++) : ?>
                <?php $item_image = get_field('grid_gallery_image_'.$i); ?>
                <?php $item_overlay = get_field('grid_gallery_overlay_'.$i); ?>
                <?php if ($item_image || $item_overlay) : ?>
                    <?php
                        $bg_class = 'grid-gallery__item--no-bg';
                        $bg_style = '';
                        if($item_image){
                            // add user-selectable background image, roughly same size all devices
                            $attr = array(
                                'images' => $item_image['sizes']['half']
                            );
                            // execute the function and store the resulting array
                            $bg_image = bg_image($attr);
                            $bg_class = $bg_image['class']; // set up the disambiguated selector
                            $bg_style = $bg_image['styles']; // set up the <style> tag
                        }
                    ?>
                    <div class="grid-gallery__item <?php echo $bg_class; ?>">
                        <?php echo $bg_style; ?>
                        <?php if($item_overlay) : ?>
                            <div class="grid-gallery__overlay">
                                <?php
                                    // set up overlay text spans
                                    $overlay_text = '';
                                    $overlay_array = explode(' ', $item_overlay);
                                    echo '<span>' . implode('</span><span>', $overlay_array) . '</span>';
                                ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    <?php break; ?>
                <?php endif ?>
            <?php endfor; ?>
        </div>
    </div>
</article>