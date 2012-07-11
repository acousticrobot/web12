<?php
/*
*	Loop Name: Archive
*	called by: 
*
* 	CALLED BY: 	archive, taxonomy, search
*	CALLS TO:	inc/nav, content-archive, inc/nav
*  	v 2.0	 
*/

	include (TEMPLATEPATH . '/inc/nav.php' ); 

	if (have_posts()) : while (have_posts()) : the_post();
	
		get_template_part( 'content','archive');

	endwhile; endif; 
?>
<div class="clear"></div>

<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
	
