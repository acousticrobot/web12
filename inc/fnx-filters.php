<?php
/*
*	Description: Functions.php extention for adding artworks to query
*
* 	CALLED BY: 	functions.php
*	TRIGGER: 	category and tag archives
*	CREATES:	artworks, homeworks
*  	v 2.0	 
*/


	// This conditional loop alters the Main Query using 'pre_get_posts'
	// On category and tag pages it includes artworks in the query
	// Seems to need to be the main query on the page to work else a new query
	// must be run.
if (!is_admin()) { // admin having problems saving with this filter
	add_filter('pre_get_posts', 'query_post_type');
	function query_post_type($query) {
		if ( $query->is_main_query() ) { // don't mess up the menu
			if (is_category() || is_tag() || is_home()) {
			    $query->set('post_type',array('post','artworks'));
			}
		};
		return $query;
	}
}


// ARGUMENT RETURN FILTERS, to be used with get_posts( $args ) or WP_Query;
// see README for full arguments possible

	// Used by carousel
function w12_filter_exclude_status() { //exclude 'status' type posts from the query
	$args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'post_format',
				'field'    => 'slug',
				'operator' => 'NOT IN',
				'terms'    => 'post-format-status'
			)
		)
	);
	return $args;
}

	// Used in Loop-Status.php 
function w12_filter_status_posts() { // only use status posts in the query
	$args = array( 
		'tax_query' => array(
			array(
				'taxonomy' => 'post_format',
				'field'    => 'slug',
				'operator' => 'IN',
				'terms'    => 'post-format-status'
			)
		)
	);
	return $args;
}


// Used in //from-need to move-// Archive-template
function w12_filter_combine_taxonomies_with_pagination() { // only use status posts in the query
	$args = array(
	    'numberposts'     => $np + 1, // +1 to check for next page
	   	'offset'          => $off,
	    'orderby'         => 'post_date',
	    'order'           => 'DESC',
	    'post_type'       => array('artworks','page','post'),
	    'post_status'     => 'publish' 
	);
	return $args;
}

// Reference: See real one on Archive-template
function w12_filter_archive_page() { // only use status posts in the query
	$args = array(
	    'numberposts'     => 20, // +1 to check for next page
	   	'offset'          => $off,
	    'orderby'         => 'post_date',
	    'order'           => 'DESC',
	    'post_type'       => array('artworks','page','post'),
	    'post_status'     => 'publish' 
	);
	return $args;
}

function w12_filter_child_pages($parent) {
	$args = array(
	    'numberposts'     => -1,
	    'offset'          => 0,
	    'orderby'         => 'menu_order',
	    'order'           => 'DESC',
	//    'include'         => ,
	//    'exclude'         => ,
	//    'meta_key'        => ,
	//    'meta_value'      => ,
	    'post_type'       => array('artworks','page','post'),
	//    'post_mime_type'  => ,
	   	'post_parent'     => $parent,
	    'post_status'     => 'publish' );
		
		return $args;
}





?>
