<?php 
/*
*	Description: Main Template for pages set to default template
* 	CALLED BY: 	Single pages
*	CALLS TO:	HEADER, main side nav, loop, inc/mainsetContent, inc/childlist,  FOOTER
*  	v 2.0
*/
	
$templateID = "page"; // v1.: is_subpage(); in functions.php, returns parent page ID or false

get_header(); 

get_template_part( 'loop');
       
get_footer(); 

?>