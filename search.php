<?php
/*
*	Main Template for search results
*
* 	CALLED BY: 	TRIGGER: search form get method
*	CALLS TO:	HEADER, main side nav, loop-archive, FOOTER
*  	v 2.0	 
*/
$templateID = 'mainset'; // "search"; // --> alternate styling
global $custom_title;

// build pretty search terms, ex: "SEARCH RESULT FOR PAPER — 5 ARTICLES"

$allsearch = new WP_Query("s=$s&showposts=-1"); 
$key = get_search_query();

$count = $allsearch->post_count;
if ($count == 1) {
	$count = 'one article';
} else {
	$count .= ' articles';
}
wp_reset_query();




$search_terms = '<span class="search-terms">&lsquo;' . $key . '&rsquo;</span> &mdash; ' . $count;
$custom_title = 'Search Result for ' . $search_terms;

get_header(); 
get_template_part( 'loop', 'archive');
get_footer();

?>
