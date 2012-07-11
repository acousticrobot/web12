<?php
	/**
	* 	Fallback content 
	* 	Displays single post content, includes #innerWrapper
	*
	* 	Called by: page.php, single.php
	*
	*/
?>
  
<h2>
	<?php the_title(); ?>
	<?php include (TEMPLATEPATH . '/inc/meta-title.php' ); ?>
</h2>

	<?php include (TEMPLATEPATH . '/inc/sidenav.php' ); ?>

<div id="innerWrapper">	
	
	<?php 
	if ( has_post_thumbnail() ) { 
	  the_post_thumbnail();
	} 
	?>

	

	<?php the_content(); ?>

	<?php include (TEMPLATEPATH . '/inc/metalinks.php' ); ?>

	<?php edit_post_link('Edit this post','','.'); ?>

</div> <!-- innerWrapper  -->
