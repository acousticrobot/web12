<?php
/*
*	Description: Main content file and fallback for other content pages. 
*
*	Displays single post content, includes #innerWrapper
*
* 	CALLED BY: page.php, single.php
*	TRIGGER: 
*	CALLS TO: Title, meta-title, side-menu  
*  	v 2.0	 
*/
?>
  
<h2>
	<?php the_title(); ?>
	<?php include (TEMPLATEPATH . '/inc/meta-title.php' ); ?>
</h2>

	<?php include (TEMPLATEPATH . '/inc/nav-side_menu.php' ); ?>

<div id="innerWrapper">	
	
<?php 
	if ( has_post_thumbnail() ) { 
	  the_post_thumbnail();
	} 
?>

	<?php the_content(); ?>

	<?php include (TEMPLATEPATH . '/inc/meta-links.php' ); ?>

	<?php edit_post_link('Edit this post','','.'); ?>

</div> <!-- innerWrapper  -->
