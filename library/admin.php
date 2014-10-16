<?php
/*
This file handles the admin area and functions.
You can use this file to make changes to the
dashboard. Updates to this page are coming soon.
It's turned off by default, but you can call it
via the functions file.

Developed by: Eddie Machado
URL: http://themble.com/bones/

Special Thanks for code & inspiration to:
@jackmcconnell - http://www.voltronik.co.uk/
Digging into WP - http://digwp.com/2010/10/customize-wordpress-dashboard/


	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin


*/

/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function control_panel_changes() {
	// remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );    // Right Now Widget
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' ); // Comments Widget
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );  // Incoming Links Widget
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );         // Plugins Widget

	remove_meta_box('dashboard_quick_press', 'dashboard', 'core' );   // Quick Press Widget
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );   // Recent Drafts Widget
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );         //
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );       //

	remove_meta_box( 'trackbacksdiv','post','normal' ); // Trackback Metabox on Posts pages
	remove_meta_box( 'trackbacksdiv','page','normal' ); // Trackback Metabox on Page pages

	// removing plugin dashboard boxes
	//remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );         // Yoast's SEO Plugin Widget

	echo '<style type="text/css">
		#wp-admin-bar-wp-logo > .ab-item .ab-icon { 
			background-image: url(' . get_bloginfo('stylesheet_directory') . '/library/images/favicons/favicon-16x16.png) !important; 
			background-position: 0 0;
			}
		#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
			background-position: 0 0;
			}	
		</style>';
}


// removing the dashboard widgets
add_action( 'admin_menu', 'control_panel_changes' );



/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function bones_login_css() {
	wp_enqueue_style( 'bones_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function bones_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function bones_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'bones_login_css', 10 );
add_filter( 'login_headerurl', 'bones_login_url' );
add_filter( 'login_headertitle', 'bones_login_title' );


/************* CUSTOMIZE ADMIN *******************/

// Custom Backend Footer
function bones_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="http://friendlywebconsulting.com/" target="_blank">Friendly Web Consulting</a></span>. Built using <a href="http://themble.com/bones" target="_blank">Bones</a>.', 'bonestheme' );
}

// adding it to the admin area
add_filter( 'admin_footer_text', 'bones_custom_admin_footer' );


/***************************************************************
* Function pxlcore_give_edit_theme_options()
* Adds widgets and menus to editors.
***************************************************************/
function pxlcore_give_edit_theme_options( $caps ) {
	
	/* check if the user has the edit_pages capability */
	if( ! empty( $caps[ 'edit_pages' ] ) ) {
		
		/* give the user the edit theme options capability */
		$caps[ 'edit_theme_options' ] = true;
		
	}
	
	/* return the modified capabilities */
	return $caps;
	
}
 
add_filter( 'user_has_cap', 'pxlcore_give_edit_theme_options' );