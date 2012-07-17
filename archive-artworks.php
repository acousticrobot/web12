<?php 
/*
*	Description: Artworks loop -- lists artworks
*
* 	CALLED BY: 	url to /artworks 
*	TRIGGER: 	url for custom type 'artworks' querries artworks custom post type
*	CALLS TO:	HEADER, loop-artworks, FOOTER
*	TODO: Once there are too many artworks?
*  	v 2.0	 
*/
$templateID = 'artworks';

get_header(); 

?>

<h2>Artworks: </h2>

<div id="innerWrapper">	

<?php get_template_part('loop','artworks');	?>

</div>  <!-- innerWrapper  -->
	
<?php get_footer(); ?>