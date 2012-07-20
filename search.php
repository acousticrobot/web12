<?php
/*
*	Main Template for search results
*
* 	CALLED BY: 	TRIGGER: search form get method
*	CALLS TO:	HEADER, main side nav, loop-archive, FOOTER
*  	v 2.0	 
*/
	$templateID = 'mainset'; // "search"; // --> alternate styling

	// build pretty search terms, ex: "SEARCH RESULT FOR PAPER — 5 ARTICLES"
	$allsearch = new WP_Query("s=$s&showposts=-1"); 
	$key = wp_specialchars($s, 1); 
	$count = $allsearch->post_count;
	$search_terms = '<span class="search-terms">"' . $key . '"</span> &mdash; ' . $count . ' ' . 'articles';
	wp_reset_query();

?>

<?php get_header(); ?>

<h2>Search Result for <?php echo $search_terms ?></h2>
		
<nav id="mainSideNav">
	<?php wp_nav_menu(array('menu' => 'Main Side Navigation'))?>
</nav> <!-- mainSideNav -->	

<div id="innerWrapper">	

<?php 	
	if (have_posts()) :  
						
	 	get_template_part( 'loop', 'archive'); 
 
	else :  // does not have posts ?>

	<h3>No posts found.</h3>
	<article class="clear-left"><!-- clear left menu --></div>							
<div id="innerWrapper">

<?php 
	endif; 
?>

</div>  <!-- innerWrapper  -->

<?php get_footer(); ?>

