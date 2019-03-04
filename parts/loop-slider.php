


  <?php
  $images = get_field('gallery');
  if( $images ): ?>

  <div class="container slider">
    <?php foreach( $images as $image ): ?>
    <div style="background: url(<?php echo $image['url'];?>) no-repeat center center; background-size: cover;">
      <p><?php echo $image['caption']; ?></p>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif;?>

<?php
  // check if the repeater field has rows of data
  if( have_rows('gallery_wrapper') ):
    echo '<div class="row grey lighten-4"><div class="container">';
   	// loop through the rows of data
      while ( have_rows('gallery_wrapper') ) : the_row();
      echo '<div class="gallery-wrapper col s12 l8 offset-l2">';
  echo '<h2 class="h4">' . get_sub_field('gallery_title') . '</h2>';
  $gallery_images = get_sub_field('gallery_images');

  if( $gallery_images ): ?>

  <div class="slider">
    <?php foreach( $gallery_images as $image ): ?>
    <div style="background: url(<?php echo $image['url'];?>) no-repeat center center; background-size: cover;">
      <?php if($image['caption']) {?>
        <p class="center"><?php echo $image['caption']; ?></p>
      <?php } ?>

    </div>
    <?php endforeach; ?>
  </div>
  <?php endif;
          // display a sub field value
        //  the_sub_field('sub_field_name');
echo '</div>';
      endwhile;

  else :

      // no rows found
echo '</div></div>';
  endif;
?>
