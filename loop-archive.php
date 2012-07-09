<?php
	/*
	*	Loop lists thumbnail, title and excerpt, excludes status-posts
	*	Adapted from loop-list.php (not DRY!)
	*	called by: archive.php 
	*	v1.0
	*/
?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<?php if ( !has_post_format( 'status')) { // style as a regular post ?>
	
	<?php get_template_part( 'content','archive'); ?>

<?php } endwhile; endif; ?>
	
