<?php
/*
*	Description: Functions.php extention for adding artworks to query
*
* 	CALLED BY: 	functions.php
*	TRIGGER: 	category and tag archives
*	CREATES:	artworks, homeworks
*  	v 2.0	 
*/

if (!is_admin()) { // admin having problems saving with this filter
	add_filter('pre_get_posts', 'query_post_type');
	function query_post_type($query) {
		if ( $query->is_main_query() ) { // don't mess up the menu
			if (is_category() || is_tag()) { 
			    $query->set('post_type',array('post','artworks'));
			// } else if (is_page('archive')) {
			//     $query->set('post_type',array('post','artworks'));
			}
		};
		return $query;
	}
}

// references:
// http://www.billerickson.net/customize-the-wordpress-query/
// http://wordpress.org/support/topic/custom-post-type-tagscategories-archive-page
// http://designpx.com/tutorials/custom-post-types-author-archive/
// http://codex.wordpress.org/Class_Reference/WP_Query

?>
