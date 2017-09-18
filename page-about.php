<?php

/*
Template Name: Teaching
*/

get_header(); ?>



	<main class="cotainer">
			<div class="row" role="main">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<?php

							get_template_part( 'parts/loop', 'page-about' );

					?>

					<?php //get_template_part( 'parts/loop', 'page-about' ); ?>


				<?php endwhile; endif; ?>


		</div> <!-- end #main -->

			<?php // get_sidebar(); ?>

	</main> <!-- end main -->



<?php get_footer(); ?>
