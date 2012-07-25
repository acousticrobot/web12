<?php
/*
*	Loop Name: Archive
*	Description: For listing pages with 150 thumb and content excerpt 
*
* 	CALLED BY: 	archive, taxonomy, search
*	CALLS TO:	main side nav, inc/nav, content-archive, inc/nav
*  	v 2.0	 
*/

	global $custom_title;
?>
	
<nav id="mainSideNav">
	<?php wp_nav_menu(array('menu' => 'Main Side Navigation'))?>
</nav> <!-- mainSideNav -->	

<div id="innerWrapper">	

<h2><?php echo $custom_title ?></h2>
	
<?php


	include (TEMPLATEPATH . '/inc/nav-prev_next.php' ); 

	if (have_posts()) : while (have_posts()) : the_post();
	
		get_template_part( 'content','archive');

	endwhile; 
	
	else:
?>	
<h3>No posts found.</h3>
<article class="clear-left"><!-- clear left menu --></div>								
<?php	
	endif; 
	
	include (TEMPLATEPATH . '/inc/nav-prev_next.php' ); 
	
?>

</div>  <!-- innerWrapper  -->
	
