<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="main-content cf" role="main">
							<?php if ( function_exists('yoast_breadcrumb') ) {
								yoast_breadcrumb('<p id="breadcrumbs">','</p>');
							} ?>

							<h2 class="section-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
				    	$term_title = $term->name; 
				    	echo $term_title; ?></h2>
							<?php if (is_category() && category_description()) { ?>
			                   	<p class="cat-desc"><?php echo category_description(); ?></p>
			                <?php } ?>

			                <?php 
			                $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
			                if (is_tax() && ($term->description !== '')) { ?>
			                   	<p class="cat-desc"><?php echo $term->description; ?></p>
		                    <?php } ?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
								<?php include(locate_template('content-listing.php')); ?>
							</article>

							

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
