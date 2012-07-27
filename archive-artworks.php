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

get_header(); 
?>


<h2>List of Artworks: </h2>

<div id="innerWrapper">	

<?php get_template_part('loop','archive');	?>

</div>  <!-- innerWrapper  -->
	
<?php get_footer(); ?>