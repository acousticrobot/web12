<?php
/**
 * Displays a full post entry without #innerWrapper
 *
 * Called by: loop-single.php
 */
?>

<article>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

	<?php the_content(); ?>

	<?php include (TEMPLATEPATH . '/inc/metalinks.php' ); ?>

	<?php edit_post_link('(content.php) Edit this entry','',''); ?>
</article>


