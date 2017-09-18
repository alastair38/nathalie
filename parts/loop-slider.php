
<!-- <article id="post-<?php the_ID(); ?>" class="large-12 medium-7 columns" role="article" itemscope itemtype="http://schema.org/WebPage"> -->

  <?php

  $images = get_field('gallery');

  if( $images ): ?>
    <div class="slider">
          <?php foreach( $images as $image ): ?>
            <div style="background: url(<?php echo $image['url'];?>) no-repeat center center; background-size: cover;">


                  <p><?php echo $image['caption']; ?></p>
              </div>
          <?php endforeach; ?>
      </div>
  <?php endif;
	 ?>
