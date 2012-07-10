<?php
/*
*	Main Template for taxonomy searches
*
* 	CALLED BY: 	TRIGGER: taxonomy key-word searches (artwork: dimensions, year_made, media)
*	CALLS TO:	HEADER, main side nav, loop-archive, FOOTER
*  	v 2.0	 
*/
	$templateID = 'mainset';

	$taxonomy = get_query_var( 'taxonomy' );
	$term = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );

	// build pretty search terms, ex: "Entries with Media: Ink on Paper"
	$search_terms = "Entries ";
	if ($taxonomy == 'year_made') {
		$search_terms .= 'From the Year' ;
	} else $search_terms .= 'with ' . $taxonomy;
	$search_terms .= ": " . $term->name;
?>

<?php  	get_header(); ?>

<h2><?php echo $search_terms ?></h2>		

<nav id="mainSideNav">
	<?php wp_nav_menu(array('menu' => 'Main Side Navigation'))?>
</nav> <!-- mainSideNav -->	

<div id="innerWrapper">	

<?php 	
	if (have_posts()) :  

	 	get_template_part( 'loop', 'archive'); 

	else :  // does not have posts ?>

<h3>No posts found.</h3>
					
<?php 
	endif; 
?>

</div>  <!-- innerWrapper  -->

<?php get_footer(); ?>

