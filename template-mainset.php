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
$post_id = get_the_ID(); // get the page ID for query of subpages

?>

<?php get_header(); ?>
				
<nav id="mainSideNav"><?php wp_nav_menu(array('menu' => 'Main Side Navigation')); ?></nav>
			
<div id="innerWrapper">	
<?php 		
	if (have_posts()) : the_post(); // list page's content
?>
	<section id="mainset-content">
<?php	
		the_content(); 
	?>
	</section>
	<?php
	endif; 
if (is_page(learn)) {
	// list all courses from 'course-keys' Custom Field
	// includes a call to coursescript.js

	get_template_part('loop', 'mainset');
	echo 'samiam';		
}

?>

<?php // Links page -- list all links
			if (preg_match('/\/links$/', get_permalink())){
				echo '<div class="link-list">';
				wp_list_bookmarks("show_description=1&title_before=<h3>&title_after=</h3>");
				echo '</div>';
			}
			
			
			 // Does it have index-page as a custom field? list child pages
		if (get_post_meta($post->ID, 'is_index_page', true ) == 'true') { 
			 include (TEMPLATEPATH . '/inc/childlist.php' );
		}
?>
	</div>  <!-- innerWrapper  -->
		
<?php get_footer(); ?>