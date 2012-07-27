<?php
/*
 * 	Displays the title and excerpt within the loop
 * 	
 * 	CALLED BY: 	loop-archive, template-mainset
 *	CALLS TO:	inc/meta, inc/metalinks
 *  v 2.0	 
 */

	// set the title link for design pages to the actual website
$link = get_permalink();
if (is_page('design')) {
	$link = get_post_meta($post->ID, 'link', true );
}

?>

<article class="clear-left">
	
<a href=" <?php echo $link; ?>">
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
	
<h3><a href="<?php echo $link; ?>"><?php the_title(); ?></a>
	<?php include (TEMPLATEPATH . '/inc/meta-title.php' ); ?>		 
</h3>
	
<?php 
	if (is_page('design')){
		the_content();
	} else {
		the_excerpt(); 	
	}

?>
	<span class ="archive-date"><?php include (TEMPLATEPATH . '/inc/meta-links.php' ); ?></span>

<?php 
	edit_post_link('Edit this excerpt','',''); ?>

	<div class="clear-left"></div>
</article>
