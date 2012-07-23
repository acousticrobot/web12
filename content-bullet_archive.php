<?php
/*
 * 	Discription: Use in a loop to display pages posts and artworks in a compact space
 *  Compact view: bullet, title and post meta
 *					pages can use custom field "subtitle" 
 * 	
 * 	CALLED BY: 	template-archive
 *	CALLS TO:	inc/meta, inc/metalinks
 *  v 2.0	 
*/
	
	// Get info for content and style based on taxonomy and category
	$type = get_post_type( $post ); // artworks, page, post
	if ($type == 'page') {
		$cat = web12_pages_template();
	} else {
		$category = get_the_category(); // array[t47, dma105, ...]
		$cat = $category[0]->cat_name; // main category
	}
	if ($type == "artworks") {
		$post_type_title = " - artwork page";
	} elseif ($type == "post") {
		$post_type_title = " - blog entry";
	} else if ($cat == "mainset"){
		$post_type_title = "";
	} else {
		$post_type_title = $cat;
	}
?>	

<?php 	
	// to add status types,  move this conditional inside the <article>, and add:
	//	else: the_content() before the endif (within some styling, of course)
	if ( !has_post_format( 'status')) : 
	?>

<article class="archive <?php echo $type?> clear-left">
		
<div class="seal <?php echo $type . " " . $cat ?>">
	<a href="<?php the_permalink(); ?>">
		<img src="/images/nav/hoverspace-55.png" alt="<?php $type ?>"/>
	</a>
</div>
	
<div class="bullet-archive-text">
		
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<span class="meta-title"><?php echo $post_type_title; ?></span>
	</h3>

<?php 	if (!$is_page) { ?>

<span class ="archive-date"><?php include (TEMPLATEPATH . '/inc/meta-title.php' ); ?></span>

<?php
 		} else {
			$subtitle = get_post_meta($post->ID, 'subtitle', true);
			if (!empty($subtitle)) {
				echo "<h5>" . $subtitle . "</h5>";
			}
		} 
?>

<span class ="archive-date"><?php include (TEMPLATEPATH . '/inc/meta-links.php' ); ?></span>

</div> <!--end bullet-archive-text-->
</article>
<?php endif // not status ?>
