<?php 
if (function_exists('get_field')) {
	$description = get_field('description');
	$website = get_field('website');
	$location = get_field('map');
}
?>


		
<?php if ( has_post_thumbnail() || ( function_exists('get_field') && get_field('photos')) ) {
	$layout = 'with-thumb';
} else {
	$layout = 'no-thumb';
} ?>
		
	

	<section class="entry-content cf <?php echo $layout; ?>">
		<h4 class="h4 item-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>

		<?php if (function_exists('get_field')) {
			if ( $description && is_singular(array( 'attraction', 'hotel', 'dining' )) ) {
				echo $description;
			} elseif ($description) {
				echo custom_field_excerpt($description);
			} else {
				the_excerpt();
			}
			echo '<div class="info">';
			if( have_rows('phone_numbers') ) {
					while( have_rows('phone_numbers') ): the_row(); ?>
					<div class="item">
						<span class="item-label"><?php the_sub_field('label'); ?></span>
						<span class="item-data"><?php the_sub_field('phone_number'); ?></span>
					</div>
				<?php endwhile;
				
			}
			if ( $website ) { ?>
				<div class="item">
					<span class="item-label">Website</span>
					<span class="item-data"><a href="<?php echo $website; ?>" target="_blank"><?php echo $website; ?></a></span>
				</div>
			<?php } 
			if ( $location ) { ?>
				<div class="item">
					<span class="item-label">Address</span>
					<span class="item-data"><?php echo $location['address']; ?></span>
				</div>
			<?php } 
			echo '</div>';
			if ( $location && is_singular(array('attraction', 'hotel', 'dining') ) ) { 
					get_template_part('content', 'map');
                  }
			}  ?>
			<?php if ( $location && !is_singular(array('attraction', 'hotel', 'dining') ) ) { ?>
					<a class="map-link button" href="<?php the_permalink() ?>#jump-map">Map</a>
				<?php } ?>
	</section>
	<?php if ( is_singular(array('attraction', 'hotel', 'dining') ) ) {

			if ( has_post_thumbnail() ) {
					$thumb_id = get_post_thumbnail_id();
					$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail', true);
					$thumb_large = wp_get_attachment_image_src($thumb_id, 'full', true);
					$thumb_url = $thumb_url_array[0];
				}
			if ( function_exists('get_field') && get_field('photos') ) { 
				$images = get_field('photos');
			} ?>

			<?php if ( has_post_thumbnail() || ( function_exists('get_field') && get_field('photos')) ) { ?>
			<span class="thumb-column" id="jump-gallery">
      			<h3 class="gallery-title">Gallery</h3>
      			<ul class="vertical-gallery">
      				<?php if ($thumb_url) { ?>
      				<li><a class="listing-img first" rel="lightbox" href="<?php echo $thumb_large[0]; ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo $thumb_url; ?>" alt="<?php the_title_attribute(); ?>" /></a></li>
      				<?php } ?>
									
					<?php if ( $images ) { ?>
					    
			        <?php foreach( $images as $image ): ?>
		            <li>
		                <a rel="lightbox" class="listing-img" href="<?php echo $image['url']; ?>">
		                     <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
		                </a>
		                <p><?php echo $image['caption']; ?></p>
		            </li>
			        <?php endforeach;
			        } ?>
						    
				</ul>
			</span>	
		<?php }
		}  // IS TAX OR ARCHIVE PAGE WHERE ONLY THUMBNAIL SHOULD BE SHOWN
		else {  
			if ( has_post_thumbnail() ) {
				$thumb_id = get_post_thumbnail_id();
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail', true);
				$thumb_large = wp_get_attachment_image_src($thumb_id, 'full', true);
				$thumb_url = $thumb_url_array[0];
			 ?><span class="thumb-column"><a class="listing-img first" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><img src="<?php echo $thumb_url; ?>" alt="<?php the_title_attribute(); ?>" /></a>
			<?php if ( function_exists('get_field') && get_field('photos') ) {   ?>
				<a class="gallery-link button orange" href="<?php the_permalink() ?>#jump-gallery">View Photos</a>
				<?php } ?>
				</span>
			<?php } ?>
			

		<?php } 