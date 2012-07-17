<?php
/*
*	Description: Artworks Loop Page -- lists artworks
*
* 	CALLED BY: 	archive-artworks 
*	TRIGGER: 	call for custom type 'artworks'
*	CALLS TO:	HEADER, taxonomies:(category, year_made, dimensions, media), FOOTER
*	TODO: Once there are too many artworks?
*  	v 2.0	   
*/

	include (TEMPLATEPATH . '/inc/nav.php' ); 	

	if (have_posts()) : while (have_posts()) : the_post(); ?>

<article class="clear-left">
	
<a href="<?php the_permalink(); ?>"><?php
 
		if(has_post_thumbnail()) {
			the_post_thumbnail();
		} else {
			echo '<img class="wp-post-image" src="/images/nav/badge-150-artworks.png" alt="artwork" />';
		}
?></a>

<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
<?php get_template_part( 'content', 'artmeta' ); ?>	
		
</article>

<?php 
	endwhile; endif;  
?>


