<?php 
/*
*	Index for artworks
*	
*	called by /artworks
*
*/

$templateID = 'artworks';

get_header(); 
	echo "samisin archive-artworks";
get_template_part( 'loop');	

get_footer(); 

?>