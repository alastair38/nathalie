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

		 echo '<div class="container" >';
		 $month = get_sub_field('month_name');
	 ?>

				 <div class="card center z-depth-0">

					 	<h3 id="schedule" class="" style="display: inline-block; border-bottom: 2px solid teal; padding: .5rem 2rem;">Class schedule</h3>
						<div class="row"><div class="card-content grey lighten-5 col s12">
<?php
							if (have_rows('special_days', 'options')) { //parent repeater
							// Then set up the array

							echo '<div class="teal white-text" style="border-radius: 3px; font-size: 1.2rem;  padding: 1rem; margin: 1rem;"><ul class=""><li><i class="mdi mdi-airplane"></i>' . get_field('holiday_text', 'options') . '<li>';

							// For each row...
							while (have_rows('special_days', 'options')) : the_row();
								// ...check if it's marked "Closed"...
							$from = get_sub_field('date_from', 'options');
							$to = get_sub_field('date_to', 'options');

							if($from){
								echo '<li><strong>' . $from;
								if($to) {
								echo ' to ' . $to;
								}

								echo '</strong></li>';
							}



							endwhile;
							}

							echo '</ul>';?>

 <!-- Modal Structure -->
<?php
 if (have_rows('address_details', 'options')) { //parent repeater
 // Then set up the array

echo '<div id="clas" class="row">';

 // For each row...
 while (have_rows('address_details', 'options')) : the_row();
	 // ...check if it's marked "Closed"...
$name = get_sub_field('location_name', 'options');
$name_slug = sanitize_title($name);
$street = get_sub_field('address_street', 'options');
$locality = get_sub_field('address_locality', 'options');
$zip = get_sub_field('address_postal', 'options');
$map = get_sub_field('location_map', 'options');

echo '<div itemscope itemtype="http://schema.org/DanceEvent"><h6 itemprop="name" class="card-title">' . $name . ' Class<a href="#' . $name_slug . '"><i class="mdi mdi-information-outline" style="font-size: 1rem;"></i></a></h6>';
echo '<div id="' . $name_slug . '" class="modal"><div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" class="modal-content center"><p><span itemprop="name">'. $street . '</span>, <span itemprop="streetAddress">' . $locality . '</span>, <span itemprop="addressLocality">' . $zip . '</span></p><br />';
echo '<img class="responsive-img" src="https://maps.googleapis.com/maps/api/staticmap?center=' . $map['lat'] . ',' . $map['lng'] . '&zoom=14&size=600x300&scale2
&markers=color:0x01a89e%7Csize:mid%7C' . $map['lat'] . ',' . $map['lng'] . '&key=AIzaSyB1ogka67k0TWwlmXEcsUqLEeSZTBkgJyA">';
echo ' </div>
 <div class="modal-footer teal">
	 <a href="#schedule" class="modal-action white modal-close waves-effect waves-green btn-flat">Close</a>
 </div>
</div></div>';

	 if (have_rows('opening_times', 'options')) {
	 // Then set up the array

	 // For each row...
	 while (have_rows('opening_times', 'options')) : the_row();
	 // ...check if it's marked "Closed"...
$class_name = get_sub_field('class_name', 'options');


echo '<p class="hip">' . get_sub_field('opening_days', 'options') . ': ' . implode(', ', $class_name) . ' [ ' . get_sub_field('start_time', 'options') . ' to ' . get_sub_field('finish_time', 'options') . ' ]</p>';
	 // ...then output the times

	 endwhile;
	 }

 endwhile;
}


if (have_rows('cancelled_classes', 'options')) { //parent repeater
// Then set up the array

echo '<div class="materialize-red light lighten-2 white-text" style="border-radius: 3px; padding: 1rem; margin: 1rem 15%; font-size: 1.2rem; "><ul class=""><li>' . get_field('cancelled_classes_text', 'options') . '</li>';

// For each row...
while (have_rows('cancelled_classes', 'options')) : the_row();
	// ...check if it's marked "Closed"...
$name = get_sub_field('class_name_x', 'options');
$locale = get_sub_field('class_locale', 'options');
$date = get_sub_field('class_date_x', 'options');

if($locale){
	echo '<li><strong>' . $locale;
	if($name) {
	echo ' (' . implode(' + ', $name) . ')';
	}

	if ($date) {
		echo ' - ' .  $date;
	}

	echo '</strong></li>';
}



endwhile;
echo '</ul></div>';
}
echo '</div></div>';


?>

<?php
 if( have_rows('feis_details') ) {
	 echo '<h3 style="display: inline-block; border-bottom: 2px solid teal; padding: .5rem 2rem;">Feis dates</h3><div>';
		echo '<div id="feis" class="col s12 grey lighten-5">';
		while ( have_rows('feis_details') ) : the_row();
		 $feis_location = get_sub_field('feis_location');
		 $location_details = explode(",", $feis_location['address']);
		 $feis_date = get_sub_field('feis_date', false, false);
		 $feis_date = new DateTime($feis_date);
		 $feis_name = get_sub_field('feis_name');
		 $place = $feis_location['address'];
		 $place = (explode(" ",$place));
		 $place = (implode ('+', $place));
	echo '<div class="col s12"><div itemscope itemtype="http://schema.org/Event" class="card-content"><p><strong itemprop="name">' . $feis_name . '</strong></p><p itemprop="startDate"><i class="mdi mdi-calendar"></i> ' . $feis_date->format('l, j F Y') . '</p><p itemprop="location" itemscope itemtype="http://schema.org/Place"><i class="mdi mdi-map-marker"></i><span itemprop="name">' . $location_details[0] . '</span>, <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
			<span itemprop="addressLocality">' . $location_details[1] . ', ' . $location_details[2] . '</span>
		</span></p><br />';


	 echo '<a href="https://www.google.co.uk/maps/place/' . $place . '/@' . $feis_location['lat'] . ',' . $feis_location['lng'] . ',17z" target="_blank" title="View on Google Maps"><img class="responsive-img circle" src="https://maps.googleapis.com/maps/api/staticmap?center=' . $feis_location['lat'] . ',' . $feis_location['lng'] . '&zoom=15&size=300x300&scale2
&markers=color:0x01a89e%7Csize:mid%7C' . $feis_location['lat'] . ',' . $feis_location['lng'] . '&key=AIzaSyB1ogka67k0TWwlmXEcsUqLEeSZTBkgJyA"></a>';

	?>


	<?php
	echo '</div></div>';
endwhile;
}
	 echo '</div></div>';


 ?>

 <?php
  if( have_rows('show_details') ) {
 	 echo '<h3 style="display: inline-block; border-bottom: 2px solid teal; padding: .5rem 2rem;">Show dates</h3><div>';
 		echo '<div id="shows" class="col s12 grey lighten-5">';
 		while ( have_rows('show_details') ) : the_row();
		$show_location = get_sub_field('show_location');
		$location_details = explode(",", $show_location['address']);
		$show_date = get_sub_field('show_date', false, false);
		$show_date = new DateTime($show_date);
		$show_name = get_sub_field('show_name');
		$place = $show_location['address'];
		$place = (explode(" ",$place));
		$place = (implode ('+', $place));
 	echo '<div class="col s12"><div itemscope itemtype="http://schema.org/Event" class="card-content"><p><strong itemprop="name">' . $show_name . '</strong></p><p itemprop="startDate"><i class="mdi mdi-calendar"></i> ' . $show_date->format('l, j F Y') . '</p><p itemprop="location" itemscope itemtype="http://schema.org/Place"><i class="mdi mdi-map-marker"></i><span itemprop="name">' . $location_details[0] . '</span>, <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
 			<span itemprop="addressLocality">' . $location_details[1] . ', ' . $location_details[2] . '</span>
 		</span></p><br />';


 	 echo '<a href="https://www.google.co.uk/maps/place/' . $place . '/@' . $show_location['lat'] . ',' . $show_location['lng'] . ',17z" target="_blank" title="View on Google Maps"><img class="responsive-img circle" src="https://maps.googleapis.com/maps/api/staticmap?center=' . $show_location['lat'] . ',' . $show_location['lng'] . '&zoom=15&size=300x300&scale2
 &markers=color:0x01a89e%7Csize:mid%7C' . $show_location['lat'] . ',' . $show_location['lng'] . '&key=AIzaSyB1ogka67k0TWwlmXEcsUqLEeSZTBkgJyA"></a>';

 	?>


 	<?php
 	echo '</div></div>';
 endwhile;
 }
 	 echo '</div></div>';


  ?>

</article> <!-- end article -->
