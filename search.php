<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<div id="main" class="main-content cf" role="main">
						
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="article-header">

									<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

								</header>

								<section class="entry-content">
									<?php if ('event' == get_post_type()) {
										?>
										<div class="event-entry-meta">

											<!-- Output the date of the occurrence-->
											<?php
												//Format date/time according to whether its an all day event.
												//Use microdata http://support.google.com/webmasters/bin/answer.py?hl=en&answer=176035
						 						if( eo_is_all_day() ){
													$format = 'd F Y';
													$microformat = 'Y-m-d';
												}else{
													$format = 'd F Y '.get_option('time_format');
													$microformat = 'c';
												}?>
												<time itemprop="startDate" datetime="<?php eo_the_start($microformat); ?>"><?php eo_the_start($format); ?></time>

											<!-- Display event meta list -->
											<?php echo eo_get_event_meta_list(); ?>

											<!-- Show Event text as 'the_excerpt' or 'the_content' -->
											<?php the_excerpt(); ?>
									
										</div><!-- .event-entry-meta -->	
								<?php } else { ?>
										<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'bonestheme' ) . '</span>' ); ?>
								<?php } ?>
								</section>

							</article>

						<?php endwhile; ?>

								<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Sorry, No Results.', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Try your search again.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the search.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

							<?php get_sidebar(); ?>

					</div>

			</div>

<?php get_footer(); ?>
