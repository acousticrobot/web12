<?php
	/*
	 * 	Displays the title and excerpt within the loop
	 * 	
	 * 	CALLED BY: 	template-archive
	 *	CALLS TO:	inc/meta, inc/metalinks
	 *  v 2.0	 
	 */
	
	$type = get_post_type( $post );
	$category = get_the_category();
	$cat = $category[0]->cat_name; 
	if ($type == "artworks") {
		$meta_title = " - artwork page";
	} elseif ($type == "post") {
		$meta_title = " - blog entry";
	} else {
		$meta_title = "";
	}
	
	if ( !has_post_format( 'status')) :
?>
<article class="archive <?php echo $type?> clear-left">
		
		<div class="seal <?php echo $type . " " . $cat ?>">
		<a href="<?php the_permalink(); ?>">
			<img src="/images/nav/hoverspace-55.png" alt="<?php $type ?>"/>
		</a></div>
	
	<div class="bullet-archive-text">
		
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<span class="meta-title"><?php echo $meta_title; ?></span>
		</h3>

		<div class="">
<?php 			if ($type != 'page') { ?>
				<span class ="archive-date"><?php include (TEMPLATEPATH . '/inc/meta.php' ); ?></span>
<?php 			} else {
					$subtitle = get_post_meta($post->ID, 'subtitle', true);
					if (!empty($subtitle)) {
						echo "<h5>" . $subtitle . "</h5>";
					}
				} 
?>

		</div>

		<span class ="archive-date"><?php include (TEMPLATEPATH . '/inc/metalinks.php' ); ?></span>

	</div> <!--end bullet-archive-text-->

</article>

	<?php endif ?>
	
	
	
	<?php
	
	
/*	
	
	
	
	
	
	
	
*/	?>