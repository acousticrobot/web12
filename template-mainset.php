<?php
/*
*   Template Name: Main Set	
*    
*	Description: Main Template for taxonomy searches
*
* 	CALLED BY: pages: projects, students, archive, links, contact
*	TRIGGER:
*	CALLS TO:	HEADER, main side nav, loop, inc/mainsetContent, inc/childlist,  FOOTER
*  	v 2.0	 
*/

$templateID = 'mainset';
?>

<?php get_header(); ?>
		
	<h2><?php the_title(); ?></h2>
		
	<nav id="mainSideNav">
		<?php 
			if (preg_match('/\/students$/', get_permalink())) {
				wp_nav_menu(array('menu' => 'Student Side Navigation'));
			} else {
		 		wp_nav_menu(array('menu' => 'Main Side Navigation'));
			} 
			?>
	</nav> <!-- mainSideNav -->
			
	<div id="innerWrapper">	
<?php 		
		if (have_posts()) : the_post(); // list page's content
			the_content(); 
		endif; 
			
		get_template_part( 'content','mainset');
			
			 // Does it have index-page as a custom field? list child pages
		if (get_post_meta($post->ID, 'is_index_page', true ) == 'true') { 
			 include (TEMPLATEPATH . '/inc/childlist.php' );
		}
?>
	</div>  <!-- innerWrapper  -->
		
<?php get_footer(); ?>