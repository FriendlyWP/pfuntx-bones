<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- FAVICONS GENERATED HERE: http://realfavicongenerator.net/ -->
		<!-- upload a 270px x 270px PNG -->
		<!-- use this as the path: <?php echo get_template_directory_uri(); ?>/library/images/favicons -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/favicon.ico">
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/apple-touch-icon-152x152.png">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/favicon-196x196.png" sizes="196x196">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/favicon-160x160.png" sizes="160x160">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/library/images/favicons/favicon-32x32.png" sizes="32x32">
		<meta name="msapplication-TileColor" content="#ffc40d">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/favicons/mstile-144x144.png">
		<meta name="msapplication-square70x70logo" content="<?php echo get_template_directory_uri(); ?>/library/images/favicons/mstile-70x70.png">
		<meta name="msapplication-square150x150logo" content="<?php echo get_template_directory_uri(); ?>/library/images/favicons/mstile-150x150.png">
		<meta name="msapplication-square310x310logo" content="<?php echo get_template_directory_uri(); ?>/library/images/favicons/mstile-310x310.png">
		<meta name="msapplication-wide310x150logo" content="<?php echo get_template_directory_uri(); ?>/library/images/favicons/mstile-310x150.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

	</head>

	<body <?php body_class(); ?>>
		<a class="skip" href="#content">Skip to Content</a>

		<div id="container">

			<header class="header" role="banner">

				<div class="toggle-content clearfix">
						<?php if ( has_nav_menu( 'main-nav' ) ) { ?>
						<nav role="navigation" id="my-menu">
							<?php wp_nav_menu(array(
	    					'container' => false,                           // remove nav container
	    					'container_class' => '',                 // class of container (should you choose to use it)
	    					'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
	    					'menu_class' => '',               // adding custom nav class
	    					'theme_location' => 'main-nav',                 // where it's located in the theme
	    					'before' => '',                                 // before the menu
		        			'after' => '',                                  // after the menu
		        			'link_before' => '',                            // before each link
		        			'link_after' => '',                             // after each link
		        			'depth' => 0,                                   // limit the depth of the nav
		    					'fallback_cb' => ''                             // fallback function (if there is one)
								)); ?>
						</nav>
					<?php } ?>   
				</div>
					<div class="topbar">
						<div class="wrap">
							<a href="#my-menu" class="menu-toggler"><i class="fa fa-bars"></i></a>		
						</div>
					</div>

				<div id="inner-header" class="wrap cf">
					<?php if ( !wp_is_mobile() ) { ?>

						<?php if (function_exists('get_field')) { ?>

						<?php if ( get_field('header_image') ) { ?>
							<a class="header-image" href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php the_field('header_image'); ?>" alt="<?php echo get_the_title() . ' | ' . get_bloginfo('name'); ?>" /></a>
						<?php } elseif ( (is_post_type_archive('event') || is_tax() || is_singular(array( 'attraction', 'hotel', 'dining', 'event' ))) ) { 
								$queried_object = get_queried_object(); 
								//var_dump($queried_object);
								$tax = '';
								$posttype = '';
								if ( isset (get_queried_object()->taxonomy) ) {
									$tax = $queried_object->taxonomy;
								} elseif (isset ( get_queried_object()->post_type )) {
									$posttype = $queried_object->post_type;
								}
								if ( $tax == 'dining_type' || $posttype == 'dining' ) { 
									$page_id = get_id_by_slug('dining');
									$img = get_field('header_image', $page_id);
								} elseif ( $tax == 'attraction_type' || $posttype == 'attraction' ) { 
									$page_id = get_id_by_slug('attractions');
									$img = get_field('header_image', $page_id);
								} elseif ( $posttype == 'hotel' ) { 
									$page_id = get_id_by_slug('hotels');
									$img = get_field('header_image', $page_id);
								} elseif ( $tax == 'event-category' || $tax == 'event-venue' || $tax == 'event-tag' ||is_post_type_archive('event') || is_singular('event') ) { 
									$img = get_field('happenings_header_image', 'option');
								}
							?>
									<a class="header-image" href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo $img;  ?>" alt="<?php echo get_the_title() . ' | ' . get_bloginfo('name'); ?>" /></a>
						<?php } else {
							?>
							<a class="header-image" href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/header-default.jpg" alt="<?php echo get_the_title() . ' | ' . get_bloginfo('name'); ?>" /></a>
						<?php } ?>
					<?php } else { ?>
							<a class="mobile-header" href="<?php echo home_url(); ?>" rel="nofollow" title="<?php echo get_the_title() . ' | ' . get_bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/library/images/login-logo.png" alt="<?php echo get_bloginfo('description'); ?>" /></a>
					<?php }
					//} 
				} ?>
					

					<?php  // PAGE TITLES
					if ( is_singular('event') || is_post_type_archive('event') || is_tax(array( 'event-category', 'event-tag', 'event-venue' ) )) { ?>
						<h1 class="page-title" itemprop="headline">Happenings</h1>
					<?php } 
					// SEARCH
					elseif (is_search()) { ?>
						<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

					<?php }
					// BLOG AND SINGLE-POST
					elseif ( is_home() || is_category() || is_tag() || is_singular('post')  ) {  ?>
							<h1 class="page-title" itemprop="headline">Blog</h1>
					<?php } 
					// TAXONOMY ARCHIVE
					elseif ( is_tax() ) { ?>
				    	<?php 

				    	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
				    	$term_title = $term->name;

						//var_dump(get_post_type_object( get_post_type() ));
						$cpt = get_post_type_object( get_post_type() );

				    	  ?>
				    		<h1 class="page-title">
				    	    	<?php echo  $cpt->labels->name; // . ': ' . $term_title; ?>
				        	</h1>
					<?php }
					// ARCHIVE PAGES
					elseif (is_post_type_archive()  ) {  ?>
							<h1 class="page-title" itemprop="headline"><?php post_type_archive_title(); ?></h1>
					 <?php } 
					 elseif ( is_singular(array('attraction', 'hotel', 'dining') ) ) {
					 	$cpt = get_post_type_object( get_post_type() ); ?>
					 	<h1 class="page-title" itemprop="headline"><?php echo  $cpt->labels->name; ?></h1>
					 <?php }
					 // EVERYTHING ELSE BUT NOT HOME
					 elseif ( !is_front_page() ) { ?>
				    	<h1 class="page-title"><?php the_title(); ?></h1>
				    <?php } ?>
				</div>

				<div class="topmenu cf">
					
					<div class="wrap">
					<?php if ( has_nav_menu( 'main-nav' ) ) { ?>
						<nav role="navigation">
							<?php wp_nav_menu(array(
	    					'container' => false,                           // remove nav container
	    					'container_class' => 'menu cf',                 // class of container (should you choose to use it)
	    					'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
	    					'menu_class' => 'nav top-nav cf',               // adding custom nav class
	    					'theme_location' => 'main-nav',                 // where it's located in the theme
	    					'before' => '',                                 // before the menu
		        			'after' => '',                                  // after the menu
		        			'link_before' => '',                            // before each link
		        			'link_after' => '',                             // after each link
		        			'depth' => 0,                                   // limit the depth of the nav
		    					'fallback_cb' => ''                             // fallback function (if there is one)
								)); ?>
						</nav>
					<?php } ?>


							
					<?php if ( has_nav_menu( 'social-nav' ) ) { ?>
							<?php wp_nav_menu(array(
	    					'container' => false,                           // remove nav container
	    					'container_class' => 'menu',                 // class of container (should you choose to use it)
	    					'menu' => __( 'The Social Menu', 'bonestheme' ),  // nav name
	    					'menu_class' => 'nav social-nav',               // adding custom nav class
	    					'theme_location' => 'social-nav',                 // where it's located in the theme
	    					'before' => '',                                 // before the menu
		        			'after' => '',                                  // after the menu
		        			'link_before' => '',                            // before each link
		        			'link_after' => '',                             // after each link
		        			'depth' => 0,                                   // limit the depth of the nav
							)); ?>
					<?php } ?>


				</div>

				<script type="text/javascript">
					jQuery(document).ready(function($) {
					      
				      jQuery("#my-menu").mmenu({
			             classes: "mm-zoom-page mm-zoom-menu mm-zoom-panels"
			         });

				      jQuery("#my-button").click(function() {
				         jQuery("#my-menu").trigger("open.mm");
				      });

				    });

				</script>
			</header>
