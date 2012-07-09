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
		$type = get_post_type( $post );
		if ($type == 'artworks') {
			echo '<img class="wp-post-image" src="/images/nav/artworksThumbnail.png" alt="artwork" />';
		} else echo '<img class="wp-post-image" src="/images/nav/postThumbnail.png" alt="post" />';
	}
	?>
	</a>
	
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	
	<span class ="listDate"><?php include (TEMPLATEPATH . '/inc/meta.php' ); ?></span>
	
	<?php the_excerpt(); ?>

	<?php edit_post_link('Edit this excerpt','',''); ?>

</div>
