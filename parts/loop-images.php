<?php $title = get_the_title();
$image = get_field('your_image');
$filesize = filesize( get_attached_file( $image[id] ) );
$filesize = size_format($filesize, 2);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<h1 class="entry-title single-title center" itemprop="headline"><?php echo $title; ?></h1>
  </header> <!-- end article header -->

    <section class="entry-content col s8" itemprop="articleBody">
		<?php
		echo '<img class="materialboxed" src="' . $image[url] . '" alt="' . $title . '" />';
	?>
	<p>
		<?php the_field('image_description');?>
	</p>
		</section> <!-- end article section -->
	<aside class="col s4">
<p>
	<label>Date: </label> <?php the_time('F j, Y');?>
</p>
		<?php
		//print_r($image);
		echo '<p><label>Dimensions (in pixels): </label>' . $image['width'] . ' x ' . $image['height'] . '</p>';
		echo '<p><label>File Size: </label>' . $filesize . '</p>';
		echo '<p><label>File Type: </label>' . $image['mime_type'] . '</p>';
 		echo get_the_tag_list('<p><label ><i class="mdi mdi-help-circle tooltipped" data-position="bottom" data-delay="50" data-tooltip="View all images from this contributor by clicking on their name"></i> Contributed by: </label>: ',', ','</p>');?>



 <?php 	$image1 = wp_get_attachment_url( );
 	echo '<a class="btn blue lighten-1" href="' . $image[url] . '" download="' . $title . '">Download this image</a>';?>
		</ul>

		<?php $licence = get_field('licence_type');
		if ($licence == 'Creative Commons Zero (CC0)'){?>
			<div class="card-panel grey lighten-4">
				<p xmlns:dct="http://purl.org/dc/terms/">
  <a rel="license"
     href="http://creativecommons.org/publicdomain/zero/1.0/">
    <img src="https://licensebuttons.net/p/zero/1.0/80x15.png" style="border-style: none;" alt="CC0" />
  </a>
  <br />
  To the extent possible under law,
  <span resource="[_:publisher]" rel="dct:publisher">
    <span property="dct:title"><?php echo get_the_tag_list('',', ','');?></span></span>
  has waived all copyright and related or neighboring rights to
  <span property="dct:title"><?php echo $title;?></span>.
</p>
				 <p>
					Grab the html code to use this attribution on your own site by clicking the button below.
				 </p>

				 <!-- Modal Structure -->
				 <div id="modal1" class="modal modal-fixed-footer grey darken-2 white-text ">
					<div class="modal-content">
						<h4 class="center">Creative Commons Attribution Code</h4>
						<p><textarea rows="8" cols="50" style="height: 10em; background: white; color: black;"><p xmlns:dct="http://purl.org/dc/terms/" xmlns:vcard="http://www.w3.org/2001/vcard-rdf/3.0#"><a rel="license"
     href="http://creativecommons.org/publicdomain/zero/1.0/"> <img src="https://licensebuttons.net/p/zero/1.0/80x15.png" style="border-style: none;" alt="CC0" /></a><br />To the extent possible under law,<span rel="dct:publisher" resource="[_:publisher]">the person who associated CC0</span>with this work has waived all copyright and related or neighboring
  rights to this work. This work is published from: <span property="vcard:Country" datatype="dct:ISO3166" content="GB" about="[_:publisher]">United Kingdom</span>.</p></textarea></p>
						<p>
							Copy and paste the above HTML code into your webpage to show the attribution logo and message.
						</p>
					</div>
					<div class="modal-footer grey darken-2">
						<a class=" modal-action modal-close btn-flat white-text">Close</a>
					</div>
				 </div>
				 <a class="btn blue lighten-1 modal-trigger" href="#modal1">Attribution Code</a>

			</div>
		<?php } elseif ($licence == 'Attribution-NonCommercial 4.0 International'){?>
			<div class="card-panel grey lighten-4">
				<a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title"><?php echo $title; ?></span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName"><?php echo get_the_tag_list('',', ','');?></span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>.
				 <p>
					Grab the html code to use this attribution on your own site by clicking the button below.
				 </p>

				 <!-- Modal Structure -->
				 <div id="modal1" class="modal modal-fixed-footer grey darken-2 white-text ">
					<div class="modal-content">
						<h4 class="center">Creative Commons Attribution Code</h4>
						<p><textarea rows="8" cols="50" style="height: 10em; background: white; color: black;"><a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/80x15.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>.	.</textarea></p>
						<p>
							Copy and paste the above HTML code into your webpage to show the attribution logo and message.
						</p>
					</div>
					<div class="modal-footer grey darken-2">
						<a class=" modal-action modal-close btn-flat white-text">Close</a>
					</div>
				 </div>
				 <a class="btn blue lighten-1 modal-trigger" href="#modal1">Attribution Code</a>

			</div>


		<?php } else {?>
			<div class="card-panel grey lighten-4">
				<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title"><?php echo $title;?></span> by <span xmlns:cc="http://creativecommons.org/ns#" property="cc:attributionName"><?php echo get_the_tag_list('',', ','');?></span> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License</a>.
				 <p>
					Grab the html code to use this attribution on your own site by clicking the button below.
				 </p>

				 <!-- Modal Structure -->
				 <div id="modal1" class="modal modal-fixed-footer grey darken-2 white-text ">
					<div class="modal-content">
						<h4 class="center">Creative Commons Attribution Code</h4>
						<p><textarea rows="8" cols="50" style="height: 10em; background: white; color: black;"><a rel="license" href="http://creativecommons.org/licenses/by-nd/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nd/4.0/80x15.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nd/4.0/">Creative Commons Attribution-NoDerivatives 4.0 International License</a>.</textarea></p>
						<p>
							Copy and paste the above HTML code into your webpage to show the attribution logo and message.
						</p>
					</div>
					<div class="modal-footer grey darken-2">
						<a class=" modal-action modal-close btn-flat white-text">Close</a>
					</div>
				 </div>
				 <a class="btn blue lighten-1 modal-trigger" href="#modal1">Attribution Code</a>

			</div>


		<?php }?>



	<!-- end article footer -->

<!-- Modal Structure -->


	<?php //comments_template(); ?>
</aside>
</article> <!-- end article -->
