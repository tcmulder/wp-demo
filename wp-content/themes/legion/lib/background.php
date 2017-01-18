<?php

/*------------------------------------*\
  ::Add Background Images
  ----------------------------------*
  Usage:

    For responsive background images, use an array containing
    breakpoints and image paths. Remember the cascade!

    To just add a single, non-responsive image (e.g. an SVG), use a
    string instead of an array with just the image path, no breakpoints.

    You can also pass in 'pseudo' => ':before' or any other pseudo
    selector (:after, :hover, etc.) if you'd like, but it's optional.

    Avoid styling the .disambiguate-x classes directly; add another class
    and target that (or its pseudo selectors as the case may be).

    Example:
    <?php
      // get the image object
      $image_array = get_field('background_image');

      // establish the breakpoints/images (and optionally pseudo selector)
      $attr = array(
        'images' => array(
          '(min-width: 801px)' => $image_array['sizes']['big'],
          '(max-width: 800px)'  => $image_array['sizes']['smaller'],
        )
      );

      // execute the function and store the resulting array
      $bg_image = bg_image($attr);
    ?>
    <div class="hero <?php echo $bg_image['class']; // echo the disambiguated selector ?>">
      <?php echo $bg_image['styles']; // echo the <style> tag ?>
      <span>You're My Hero!</span>
    </div>

\*------------------------------------*/
function bg_image($attr) {
  // set an unique increment variable if it's not already set
  if(!isset($GLOBALS['disambiguation_incrament'])){
    $GLOBALS['disambiguation_incrament'] = 0;
  }
  // store the unique number after incrementing
  $unique_number = ++$GLOBALS['disambiguation_incrament'];

  // build the styles
  $styles  = '<style>';

    // if this is an array of sizes than set up breakpoints
    if(is_array($attr['images'])){
      // loop through images and insert into respective breakpoints
      foreach($attr['images'] as $bp => $src){
        // disambiguate the selector for multiples per-page
        $selector = '.disambiguate-' . $unique_number . $attr['pseudo'];
        // add the query
        $styles .= "\n@media ". $bp ." {";
          $styles .= "\n\t" . $selector . "{\n\t\tbackground-image:url(\"" . $src . "\");\n\t}\n";
        $styles .= "}";
        $i++;
      }
    // if this is a string
    } else {
      // disambiguate the selector for multiples per-page
      $selector = '.disambiguate-' . $unique_number  . $attr['pseudo'];
      // just set up one image without breakpoints
      $styles .= $selector . "{\n\tbackground-image:url(\"" . $attr['images'] . "\");\n}";
    }
  $styles .= '</style>';

  // set up the return array
  $return_array = array(
    'class' => "disambiguate-$unique_number",
    'styles' => $styles
  );

  // return the styles
  return $return_array;
}
