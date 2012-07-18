<?php
/*
*	Loop Name: Archive
*	Description: For listing pages with 150 thumb and content excerpt	 
*
* 	CALLED BY: 	archive, taxonomy, search
*	CALLS TO:	inc/nav, content-archive, inc/nav
*  	v 2.0	 
*/

	include (TEMPLATEPATH . '/inc/nav.php' ); 

	if (have_posts()) : while (have_posts()) : the_post();
	
		get_template_part( 'content','archive');

	endwhile; endif; 
	
	include (TEMPLATEPATH . '/inc/nav.php' ); 
	
?>
	
