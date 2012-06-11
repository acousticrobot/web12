<?php 

	/*
	*	General template for single post entries
	*	
	*	Called by: posts, artworks, homeworks
	*
	*/
	
the_post();
$templateID = get_post_type();
rewind_posts();


get_header(); 
	
get_template_part( 'loop');

get_footer(); 

?>