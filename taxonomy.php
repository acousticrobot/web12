<?php
/*
*	Description: Main Template for taxonomy searches
*
* 	CALLED BY: custom taxonomies
*	TRIGGER: taxonomy key-word searches (artwork: dimensions, year_made, media)
*	CALLS TO:	HEADER, main side nav, loop-archive, FOOTER
*  	v 2.0	 
*/

global $custom_title;
$post_type = get_post_type();
$templateID = $post_type;
$post_object = get_post_type_object($post_type);
if (have_posts()) {
	$count = count($posts);
	if ($count == 1) {
		$count = 'one ' . $post_object->labels->singular_name;
	} else {
		$count .= ' ' . $post_object->labels->name;
	}
}

$taxonomy = get_query_var( 'taxonomy' );
$term = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );

// build pretty search terms, ex: "Entries with Media: Ink on Paper"
$terms = $post_type;
if ($taxonomy == 'year_made') {
	$terms .= ' From the Year' ;
} else {
	$terms .= ' with ' . $taxonomy;	
}
$custom_title = $terms . ' <span class="search-terms">&lsquo;' . $term->name . '&rsquo;</span> &mdash; ' . $count;
?>

<?php  	

	get_header();
	get_template_part( 'loop', 'archive'); 
	get_footer(); 

?>

