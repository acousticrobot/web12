<?php 
/*
*	Index for artworks
*	
*	called by /artworks
*
*/

$templateID = 'artworks';

get_header(); 

get_template_part('loop','artworks');	

get_footer(); 

?>