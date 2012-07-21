<?php
/*
*	Description: Main content and default for other content pages. 
*
*	Displays single post content, includes #innerWrapper
*
* 	CALLED BY: page.php, single.php, template-recent
*	TRIGGER: single default pages and posts
*	CALLS TO: Title, meta-title, side-menu  
*  	v 2.0	 
*/
global $link_title; // boolean use to make the title into a link for lists
if (get_post_meta($post->ID, 'link', true ) != '') {
	$link_title = true;
	$link = get_post_meta($post->ID, 'link', true );
} else {
	$link = get_permalink();
}

?>
  
<h2>
	<?php if ($link_title) { ?>
		<h3><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h3>
	<?php } else { ?>
		<h2><?php the_title(); ?></h2>
	<?php } ?>

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
