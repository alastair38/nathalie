<div class="bg parallax-container" >
	<header class="article-header">
		<h1 class="entry-title single-title white-text center" style="padding: 8rem 0 4rem 0;" itemprop="headline"><?php the_title();?></h1>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
	</header> <!-- end article header -->
	 <div class="parallax"><img src="<?php the_post_thumbnail_url('large'); ?>"></div>
</div>
<?php get_template_part( 'parts/content', 'share' ); ?>
<div class="section white">
 <div class="row container">


	 <?php the_content();?>
 </div>
</div>
<?php get_template_part( 'parts/loop', 'slider' ); ?>
