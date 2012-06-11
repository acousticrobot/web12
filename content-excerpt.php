<?php
	/*
	 * 	Displays the title and excerpt within the loop
	 * 	
	 * 	
	 *	Called by: loop-list on non-status posts
	 */
?>

<div class='excerpt'>

	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

	<span class ="listDate"><?php include (TEMPLATEPATH . '/inc/meta.php' ); ?></span>
	
	<?php the_excerpt(); ?>

	<?php include (TEMPLATEPATH . '/inc/metalinks.php' ); ?>

	<?php edit_post_link('Edit this excerpt','',''); ?>

</div>
