<?php
	function web12_register_scripts() {
		// Load jQuery and javascripts
		if ( !is_admin() ) {
			wp_deregister_script('jquery');
			wp_register_script(
			'jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"), false);
			wp_enqueue_script('jquery');

			wp_register_script(
				'hoverIntent', get_bloginfo('template_directory') ."/js/jquery.hoverIntent.js");
			wp_register_script(
				'superfish', get_bloginfo('template_directory') . "/js/jquery.superfish.js");
			wp_register_script(
				't47script', get_bloginfo('template_directory') . "/js/t47.js");	
			wp_register_script(
				'mousewheel', get_bloginfo('template_directory') . "/js/jquery.mousewheel.js");
			wp_register_script(
				'jscrollpane', get_bloginfo('template_directory') . 	
				"/js/jquery.jscrollpane.js");							
			wp_register_script(
				'homescript', get_bloginfo('template_directory') . "/js/homescript.js");							
			wp_register_script(
				'coursescript', get_bloginfo('template_directory') . "/js/coursescript.js");
			wp_register_script(
				'gallery', get_bloginfo('template_directory') . "/js/gallery.js");
			wp_register_script(
				'paper', get_bloginfo('template_directory') . "/js/paper.js");
			wp_register_script(
				'flypaper', get_bloginfo('template_directory') . "/js/flypaper.js");
			wp_register_script(
				'raphael', get_bloginfo('template_directory') . "/js/raphael.js");	
			wp_register_script(
				'fx', get_bloginfo('template_directory') . "/js/fx.js");				
		}
	}
	add_action('init', 'web12_register_scripts');
	
		// Clean up the <head>
	function removeHeadLinks() {
	   	remove_action('wp_head', 'rsd_link');
	   	remove_action('wp_head', 'wlwmanifest_link');
	}
	add_action('init', 'removeHeadLinks');
	remove_action('wp_head', 'wp_generator');
    

		// dynamic sidebar from: http://justintadlock.com/archives/2010/11/08/sidebars-in-wordpress
	add_action( 'widgets_init', 'my_register_sidebars' );


	function my_register_sidebars() {

		/* Register the 'left' sidebar. */
		register_sidebar(
			array(
				'id' => 'left',
				'name' => __( 'Left' ),
				'description' => __( 'Main left sidebar.' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			)
		);

		/* Register the 'left' sidebar. */
		register_sidebar(
			array(
				'id' => 'right',
				'name' => __( 'Right' ),
				'description' => __( 'Main right sidebar.' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>'
			)
		);
	}


	if (function_exists('register_nav_menus')) {
		register_nav_menus(array(
			'main_nav' => "Main Navigation Menu",
			'main_side' => "Main Side Navigation",
			'students_side' => "Student Side Navigation",
			't47_side' => "T47 Side Navigation",
		));
	}
	
	if ( function_exists( 'add_theme_support' ) ) { 
	  add_theme_support( 'post-formats', array( 'image', 'gallery', 'status' ) ); 
	}
	
	if ( function_exists( 'add_theme_support' ) ) { 
	  add_theme_support( 'post-thumbnails' ); 
	}
			
	function home_page_menu_args( $args ) { // add home page to menu selections
		$args['show_home'] = true;
		return $args;
	}
	add_filter( 'wp_page_menu_args', 'home_page_menu_args' );
	
		// include custom post types
	include_once( TEMPLATEPATH . '/inc/fnx-posttypes.php');

		// add artworks to loops	
	include_once( TEMPLATEPATH . '/inc/fnx-filters.php');
	
	include_once( TEMPLATEPATH . '/inc/fnx-comments.php'); // right out of 2011 theme
		// include shortcode functions
	include_once( TEMPLATEPATH . '/inc/fnx-shortcode.php');
	


	
	function web12_get_custom_id() {
		//-> returns category slug, or templateID
		//-> example: add to template page: $templateID = 'portfolio';
		// used in header, inc/badge, footer
		
		global $templateID;
		if (is_home()) { return 'home'; }

		elseif ($templateID != "") {
			if ($templateID == 468) { // DMA105: local (424?) remote 468
				return 'dma';
			}
			elseif ($templateID == 374) { // ART125: local & Remote 374
				return 'art125';
			}
			elseif ($templateID == 'post') { 	
				$category = get_the_category();			
				return $category[0]->slug;
			}
			elseif ($templateID == 'homework') {
				if (get_the_terms( $post->ID, 'class' ) != null ) {
					$classArray = get_the_terms( $post->ID, 'class');
					foreach ( $classArray as $class ) {
						$templateID .= " " . $class->name;
					}
				}
			};
			return $templateID; 
		}
		return 'general';
	}
	
		
		// called by template mainset, template-archive, adapt for page.php?
		// (v1 used is_subpage from http://codex.wordpress.org/Conditional_Tags)
		// All top level mainset pages get an ID of "mainset"
		// Learn-subpage take their own slug as ID (art125, dma, ...)
		// Learn-subpage-subpage take parent slug as ID (art125, dma, ...)
	function web12_pages_template() {
	    global $post;	// load details outside the loop

	    if ( is_page() && $post->post_parent ) {   	// test to see if the page has a parent
			$parent_ID = $post->post_parent;		// get the ID of the parent post
			$parent = get_page($parent_ID);			// lookup the parent page and
			$parent = $parent->post_name;			// deal with parent via slug
			if ($parent == 'learn') {				// learn subpages use slug as $template_ID
				return $post->post_name;
			} else {
	        	return $parent;						// use parent slug as $template_ID
			}
	    } else {                                   	// there is no parent so ...
	        return 'mainset';                         	// ... use general ID 'mainset'
	    }
	}
	
	

	
?>