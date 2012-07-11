<?php
/**
 * Displays 'artworks' custom-post-type content
 *
 * 	CALLED BY: 	loop.php --> single.php for custom-post-type artwork
 *	TRIGGER: type 'artworks'
 *	CALLS TO:	
 *  v 2.0	 
 */
?>

<div id="innerWrapper">	

<?php the_content(); ?>
	
<h2><?php the_title(); ?></h2>
	
<?php get_template_part( 'content', 'artmeta' ); ?>	
		
</div> <!-- innerWrapper  -->

