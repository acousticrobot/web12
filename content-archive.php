<?php
	/*
	 * 	Displays the title and excerpt within the loop
	 * 	
	 * 	
	 *	Called by: loop-list on non-status posts
	 */
?>

<div class='excerpt clear'>

	<a href="<?php the_permalink(); ?>">
	<?php 
	if(has_post_thumbnail()) {
		the_post_thumbnail();
	} else {
		echo '<img class="wp-post-image" src="/images/nav/artworksBadge.png" alt="artwork" />';
	}
	?>
	</a>
	
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	
	<span class ="listDate"><?php include (TEMPLATEPATH . '/inc/meta.php' ); ?></span>
	
	<?php the_excerpt(); ?>

	<?php include (TEMPLATEPATH . '/inc/metalinks.php' ); ?>

	<?php edit_post_link('Edit this excerpt','',''); ?>

</div>
