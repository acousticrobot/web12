<?php
/*
*   Template Name: Archive	
*    
*	Description: Main Template for archive page, moved from mainset
*
* 	CALLED BY: /archive
*	TRIGGER:
*	CALLS TO:	HEADER, main side nav, loop, inc/mainsetContent, inc/childlist,  FOOTER
*  	v 2.0
* 
*	TODO: http://wordpress.stackexchange.com/questions/12614/paging-result-of-get-posts-in-function	 
*/

$templateID = 'mainset';
?>

<?php get_header(); ?>
		
<h2><?php the_title(); ?></h2>
		
<nav id="mainSideNav">
<?php 
	 		wp_nav_menu(array('menu' => 'Main Side Navigation'));
?>
</nav> <!-- mainSideNav -->
			
<div id="innerWrapper">		
<?php 	include (TEMPLATEPATH . '/inc/nav.php' ); ?>
<ul>

<?php 


$args = array(
    'numberposts'     => -1,
    'offset'          => 0,
//    'category'        => ,
    'orderby'         => 'post_date',
    'order'           => 'DESC',
//    'include'         => ,
//    'exclude'         => ,
//    'meta_key'        => ,
//    'meta_value'      => ,
    'post_type'       => array('artworks','page','post'),
//    'post_mime_type'  => ,
//    'post_parent'     => ,
    'post_status'     => 'publish' );

$posts_array = get_posts( $args );	

foreach( $posts_array as $post ) : setup_postdata($post);

	get_template_part( 'content','bullet_archive');		

endforeach;
?>

</ul>	
<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>						
</div>  <!-- innerWrapper  -->

<?php get_footer(); ?>
