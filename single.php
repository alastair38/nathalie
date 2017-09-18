<?php

get_header(); ?>

<main class="row" style="margin: 0px;">




		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		    	<?php get_template_part( 'parts/loop', 'single' ); ?>



		<?php //get_sidebar(); ?>

	<?php endwhile; ?>

	<?php endif; ?>



</main> <!-- end main -->

<?php get_footer(); ?>
