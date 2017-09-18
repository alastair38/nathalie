<?php
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<div class="bg parallax-container" >
		<header class="article-header">
			<h1 id="top" class="entry-title single-title white-text center" itemprop="headline"><?php the_title();?></h1>
		</header> <!-- end article header -->
		 <div class="parallax"><img src="<?php the_post_thumbnail_url('large'); ?>"></div>
	</div>

<?php
	if( have_rows('schedule') ):

		 while ( have_rows('schedule') ) : the_row();
		 echo '<div class="container" >';
		 $month = get_sub_field('month_name');
	 ?>

				 <div class="card center z-depth-0">

					 	<h3 id="<?php echo $month;?>" class="" style="display: inline-block; border-bottom: 2px solid teal; padding: .5rem 2rem;"><?php echo $month . ' schedule';?></h3>
						<div class="row"><div class="card-content col s12">


 <!-- Modal Structure -->


							<?php $scheduled_classes = get_sub_field('scheduled_classes');

							if ($scheduled_classes) {
								echo '<div id="clas" class="row grey lighten-5">';
								foreach ($scheduled_classes as $scheduled_class) {
									if( have_rows('class_days', $scheduled_class) ):
										$address = get_field('class_map', $scheduled_class);
										$address_details = explode(",",$address['address']);
										$title = get_the_title($scheduled_class);

										echo '<div itemscope itemtype="http://schema.org/DanceEvent"><h6 itemprop="name" class="card-title">' . $title . ' Class<a href="#' . $title . '"><i class="mdi mdi-information-outline" style="font-size: 1rem;"></i></a></h6>';
										echo '<div id="' . $title . '" class="modal"><div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="modal-content center"><p><span itemprop="name">'. $address_details[0] . '</span>, <span itemprop="streetAddress">' . $address_details[1] . '</span>, <span itemprop="addressLocality">' . $address_details[2] . '</span></p><br />';
										echo '<img class="responsive-img" src="https://maps.googleapis.com/maps/api/staticmap?center=' . $address['lat'] . ',' . $address['lng'] . '&zoom=14&size=600x300&scale2
				 &markers=color:0x01a89e%7Csize:mid%7C' . $address['lat'] . ',' . $address['lng'] . '&key=AIzaSyB1ogka67k0TWwlmXEcsUqLEeSZTBkgJyA">';
										echo ' </div>
										 <div class="modal-footer teal">
											 <a href="#' . $month . '" class="modal-action white modal-close waves-effect waves-green btn-flat">Close</a>
										 </div>
									 </div>' ;
										 while ( have_rows('class_days', $scheduled_class) ) : the_row();

										 echo '<p class="hip">' . get_sub_field('day', $scheduled_class) . ': ' . get_sub_field('class_level', $scheduled_class) . ' @ ' . get_sub_field('class_time', $scheduled_class) . '</p>';


									 ?>


									 <?php

										endwhile;

										echo '</div>';

										else :
												// no rows found
										endif;
								}

								}

?>

						 <?php
						 $holiday_start = get_sub_field('holiday_start');
						 $holiday_end = get_sub_field('holiday_end');

						 	if( have_rows('excluded_dates') ):

						 		 echo '<div class="row"><div class="materialize-red light col s6 push-s3 lighten-2 white-text" style="border-radius: 3px; font-size: 1.2rem; margin: 1.5rem 0 2.5rem 0;"><ul class=""><li>The following classes will not run this month:</li>';
						 		 while ( have_rows('excluded_dates') ) : the_row();
								 $date = get_sub_field('date_not_on', false, false);
								 $date = new DateTime($date);
								 $class = get_sub_field('class_location');
								 $levels = get_sub_field('class_level');
								 if($class){
									 echo '<li><strong>' . get_the_title($class);
									 if ($date) {
										 echo ' - ' .  $date->format('l, j F Y');
									 }
									 if ($levels) {
										 echo ': ' . implode(' + ', $levels);
									 }


									 echo '</strong></li>';
								 }



						 	 ?>

							 <?php
								endwhile;
										if($holiday_start) {
											echo '<li  style="padding-top: 2rem;"><i class="mdi mdi-airplane"></i> We will be on holiday from ' . $holiday_start . ' to ' . $holiday_end . '</li>';
										}
										echo '</ul></div></div>';
								else :
										if($holiday_start) {
											echo '<div class="row"><div class="materialize-red light col s6 push-s3 lighten-2 white-text" style="border-radius: 3px; padding: 1.25rem 0 1rem 0; font-size: 1.2rem; margin: 1.5rem 0 2.5rem 0;"><i class="mdi mdi-airplane"></i> We will be on holiday from '. $holiday_start . ' to ' . $holiday_end . '</div></div>';
										}
								endif;
								if ($scheduled_classes) {
								echo '</div>';
							}
							?>

							<?php
							 if( have_rows('feis_details') ):

									echo '<div id="feis" class="row grey lighten-5"><h6 class="card-title">Feis dates</h6>';
									while ( have_rows('feis_details') ) : the_row();
									 $location = get_sub_field('feis_location');
									 $location_details = explode(",", $location['address']);
									 $date = get_sub_field('feis_date', false, false);
									 $date = new DateTime($date);
									 $name = get_sub_field('feis_name');
									 $place = $location['address'];
									 $place = (explode(" ",$place));
									 $place = (implode ('+', $place));
								echo '<div class="col s12"><div itemscope itemtype="http://schema.org/Event" class="card-content"><p><strong itemprop="name">' . $name . '</strong></p><p itemprop="startDate"><i class="mdi mdi-calendar"></i> ' . $date->format('l, j F Y') . '</p><p itemprop="location" itemscope itemtype="http://schema.org/Place"><i class="mdi mdi-map-marker"></i><span itemprop="name">' . $location_details[0] . '</span>, <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
										<span itemprop="addressLocality">' . $location_details[1] . ', ' . $location_details[2] . '</span>
									</span></p><br />';


								 echo '<a href="https://www.google.co.uk/maps/place/' . $place . '/@' . $location['lat'] . ',' . $location['lng'] . ',17z" target="_blank" title="View on Google Maps"><img class="responsive-img circle" src="https://maps.googleapis.com/maps/api/staticmap?center=' . $location['lat'] . ',' . $location['lng'] . '&zoom=15&size=300x300&scale2
	&markers=color:0x01a89e%7Csize:mid%7C' . $location['lat'] . ',' . $location['lng'] . '&key=AIzaSyB1ogka67k0TWwlmXEcsUqLEeSZTBkgJyA"></a>';

								?>


								<?php
								echo '</div></div>';
								 endwhile;
								 echo '</div>';
								 else :
										 // no rows found
								 endif;

							 ?>

							 <?php
								if( have_rows('show_details') ):

									 echo '<div id="shows" class="row grey lighten-5"><h6 class="card-title">Show dates</h6>';
									 while ( have_rows('show_details') ) : the_row();
										$location = get_sub_field('show_location');
										$date = get_sub_field('show_date', false, false);
										$date = new DateTime($date);
										$name = get_sub_field('show_name');
										$place = $location['address'];
 									  $place = (explode(" ",$place));
 									  $place = (implode ('+', $place));
								 echo '<div class="col s12"><div class="card-content"><p><strong>' . $name . '</strong></p><p><i class="mdi mdi-calendar"></i> ' . $date->format('l, j F Y') . '</p><p><i class="mdi mdi-map-marker"></i>' . $location['address'] . '</p><br />';


									echo '<a href="https://www.google.co.uk/maps/place/' . $place . '@' . $location['lat'] . ',' . $location['lng'] . ',17z/" target="_blank" title="View on Google Maps"><img class="responsive-img circle" src="https://maps.googleapis.com/maps/api/staticmap?center=' . $location['lat'] . ',' . $location['lng'] . '&zoom=15&size=300x300&scale2
	 &markers=color:0x01a89e%7Csize:mid%7C' . $location['lat'] . ',' . $location['lng'] . '&key=AIzaSyB1ogka67k0TWwlmXEcsUqLEeSZTBkgJyA"></a>';

								 ?>


								 <?php
								 echo '</div></div>';
									endwhile;
									echo '</div>';
									else :
											// no rows found
									endif;

								?>



</div>


	 <?php
	 echo '</div></div>';
		 endwhile;

		 else :
				 // no rows found
		 endif;
	 ?>

</article> <!-- end article -->
