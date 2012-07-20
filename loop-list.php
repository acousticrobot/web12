<?php
/*
*	Description: Loop for listing posts
*	Discriminates between status and regular posts
*
* 	CALLED BY: mainset-students
*	TRIGGER: 
*	CALLS TO:	content-<posttype>.php
*  	v 2.0	 
*/

?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


<?php if ( !has_post_format( 'status')) { // style as a regular post ?>
	
	<?php get_template_part( 'content','excerpt'); ?>

<?php } else { // it's just a status update ?>
			
	<?php get_template_part( 'content','status'); ?>

<?php } endwhile; endif; ?>
	
		