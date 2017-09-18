<div class="bg parallax-container" >
	<header class="article-header">
		<h1 class="entry-title single-title white-text center" itemprop="headline"><?php the_title();?></h1>
	</header> <!-- end article header -->
	 <div class="parallax"><img src="<?php the_post_thumbnail_url('large'); ?>"></div>
</div>

<div class="section white">
 <div class="row container">


	 <?php the_content();?>
	 <?php $args = array(
	'orderby'          => 'title',
	'order'            => 'ASC',
	'post_type'        => 'locations',
	'post_status'      => 'publish',
	'suppress_filters' => true
);
$posts_array = get_posts( $args );


foreach ( $posts_array as $post ) : setup_postdata( $post );
 ?>

		 <div class="col s12 m6">
			 <div class="card">
				 <div class="card-image">
					 <?php
					 $address = get_field('class_map', $post->ID);
					 $place = $address['address'];
					 $place = (explode(" ",$place));
 				 	 $place = (implode ('+', $place));
					 echo '<a href="https://www.google.co.uk/maps/place/' . $place . '/@' . $address['lat'] . ',' . $address['lng'] . ',17z" target="_blank" title="View on Google Maps"><img class="responsive-img" src="https://maps.googleapis.com/maps/api/staticmap?center=' . $address['lat'] . ',' . $address['lng'] . '&zoom=14&size=640x350&scale2
&markers=color:0x01a89e%7Csize:mid%7C' . $address['lat'] . ',' . $address['lng'] . '&key=AIzaSyB1ogka67k0TWwlmXEcsUqLEeSZTBkgJyA" ></a>';?>

				 </div>
				 <div class="card-content">
					 <span class="card-title"><?php the_title();?></span>
					 <p><?php

					 echo $address['address'];


					 ?>
					 </p>

				 </div>

			 </div>
		 </div>

<?php endforeach;
wp_reset_postdata();?>

 </div>

</div>

 <?php
  if( have_rows('class_details') ):

 		while ( have_rows('class_details') ) : the_row();?>
		<?php $photo = get_sub_field('photo_class');
		if($photo){?>
 		<div class="parallax-container">

			<div class="parallax"><img src="<?php the_sub_field('photo_class'); ?>"></div>


  </div>
	<?php }
	 ?>
  <div class="section white">
 	 <div class="row container">
 		 <h3 class="header"><?php the_sub_field('name_class'); ?></h3>

		 <?php
 		 $classes = get_sub_field('location_class');
		 $ages = get_sub_field('age_range');
		 $titles = array();

		 foreach ($classes as $class) {
			$titles[] = $class->post_title;
		 }
		 if($titles) {
			  echo '<span class="chip"><i class="mdi mdi-map-marker"></i>' . implode(' + ', $titles) . '</span>';
		 }
		 if($ages) {
			 echo '<span class="chip"><i class="mdi mdi-human-child"></i>' . $ages . '</span>';
		 }


 ?>
 		 <p class="grey-text text-darken-3 lighten-3">
 		 	<?php the_sub_field('description_class'); ?>
		</p>


 	 </div>
  </div>


 	<?php
 	 endwhile;
 	 else :
 			 // no rows found
 	 endif;
  ?>
