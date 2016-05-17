<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php //get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">
		<?php
		the_post_thumbnail('large', array('class' => 'hide-on-large-only responsive-img'));
		the_content(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
		<p class="tags"><?php // the_category(); ?></p>	</footer>
	<!-- end article footer -->



	<?php //comments_template(); ?>

</article> <!-- end article -->
