<?php 
/*
*	Description: Artworks loop -- lists artworks
*
* 	CALLED BY: 	url to /artworks 
*	TRIGGER: 	url for custom type 'artworks' querries artworks custom post type
*	CALLS TO:	HEADER, loop-artworks, FOOTER
*	TODO: Once there are too many artworks will need pagination similar to archive
*  	v 2.0	 
*/
$templateID = 'artworks';
global $custom_title;
$custom_title = "List of Artworks:";
get_header(); 
?>



<div id="innerWrapper">	

<?php get_template_part('loop','archive');	?>

</div>  <!-- innerWrapper  -->
	
<?php get_footer(); ?>