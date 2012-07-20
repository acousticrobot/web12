<?php
/**
 * Displays 'artworks' custom-post-type content
 *
 * 	CALLED BY: 	loop.php --> single.php for custom-post-type artwork
 *	TRIGGER: type 'artworks'
 *	CALLS TO: finds $link_title (for page recent) and makes the title a link.
 *  v 2.0	 
 */
global $link_title;
?>

<div id="innerWrapper">	

<?php the_content(); ?>
	
<?php if ($link_title) { ?>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<?php } else { ?>
	<h2><?php the_title(); ?></h2>
<?php } ?>
	
<?php get_template_part( 'content', 'artmeta' ); ?>	
		
</div> <!-- innerWrapper  -->

