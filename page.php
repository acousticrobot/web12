<?php 

	/*
	*	General template for single page entries
	*	
	*	Called by: class pages
	*/
	
$templateID = is_subpage(); // in functions.php, returns parent page ID or false

get_header(); 

get_template_part( 'loop');
       
get_footer(); 

?>