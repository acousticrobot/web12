<?php 
/*
*	Description: Main Loop for single post entries
*	Uses get_post_type() to handle custom posts types
*
* 	CALLED BY: page.php, single.php
*	TRIGGER: 
*	CALLS TO:	content-<posttype>.php
*  	v 2.0	 
*/
	
if (have_posts()) : while (have_posts()) : the_post();

	$type = get_post_type();

	if (($type == 'post') || ($type == 'page')) { 
       
		get_template_part( 'content' ); 

	} else { 

		get_template_part( 'content', $type ); 
	};

	comments_template(); 

endwhile; endif;

?>
