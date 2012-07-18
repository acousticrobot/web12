<?php 
/*
*	Description: Main Template for single post entries
*
* 	CALLED BY: posts, artworks, homeworks
*	TRIGGER: Internal wp for all posts and custom post-types
*	CALLS TO:	HEADER, loop --> content-@posttype, FOOTER 
*  	v 2.0	 
*/
	
the_post();
$templateID = get_post_type();
rewind_posts();
 
get_header(); 

get_template_part( 'loop');

get_footer(); 

?>