<?php 

	/*
	*	general fall-back loop
	*	Uses get_post_type() to handle custom posts types, calls content-<posttype>.php
	*
	*	Called by: page.php, single.php
	*
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
