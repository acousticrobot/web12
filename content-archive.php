<?php
	/*
	 * 	Displays the title and excerpt within the loop
	 * 	
	 * 	CALLED BY: 	loop-archive
	 *	CALLS TO:	inc/meta, inc/metalinks
	 *  v 2.0	 
	 */
?>

<article class="clear-left">
	
	<a href=" <?php the_permalink(); ?>">
<?php 
		if(has_post_thumbnail()) {
			the_post_thumbnail();
		} else {
			$type = get_post_type( $post );
			if ($type == 'artworks') {
				echo '<img class="wp-post-image" src="/images/nav/badge-150-artworks.png" alt="artwork" />';
			} else echo '<img class="wp-post-image" src="/images/nav/badge-150-post.png" alt="post" />';
		}
?>
	</a>
	
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	
	<span class ="archive-date"><?php include (TEMPLATEPATH . '/inc/meta-links.php' ); ?></span>
	
	<?php the_excerpt(); ?>

	<span class ="archive-date"><?php include (TEMPLATEPATH . '/inc/meta-links.php' ); ?></span>

	<?php edit_post_link('Edit this excerpt','',''); ?>

</article>
