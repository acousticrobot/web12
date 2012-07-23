<?php
/*
*   Template Name: Main Set	
*    
*	Description: Template for main level directory pages, and all pages under learn
*
* 	CALLED BY: projects, design, learn, links, contact
*	note: template-archive impersonates the mainset for style, but has it's own logic
*	TRIGGER: Set the page's template to "Main Set"
*	CALLS TO:	HEADER, main side nav, content loop, page Query, inc/childlist,  FOOTER
*  	v 2.0	 
*/

$templateID = web12_pages_template();

$this_page_id = get_the_ID(); // get the page ID for query of subpages

?>

<?php get_header(); ?>

<?php 
	if ($templateID != "mainset") {
?>
<h2><?php the_title(); ?></h2>
<?php
	}
 ?>
				
<nav id="mainSideNav"><?php wp_nav_menu(array('menu' => 'Main Side Navigation')); ?></nav>
			
<div id="innerWrapper">	
<?php 		
	if (have_posts()) : the_post(); // loop mainset page's content
?>
<section id="mainset-content">
<?php 
	if ( has_post_thumbnail() ) { 
	  the_post_thumbnail();
	} 
	the_content();
?>
</section>
<?php
	endif; 

	wp_reset_query();

		// List top level sub-pages
	if (true) { //}(is_page(learn) || is_page(projects)  || is_page(design)){

		$args = w12_filter_child_pages($parent);
		$posts_array = get_posts( $args );	

		foreach( $posts_array as $post ) : 
			if($post->post_parent != $this_page_id) continue;
			
			setup_postdata($post);

			get_template_part( 'content','archive');		

		endforeach;


	} // end learn / projects pages
	wp_reset_query();
	
 		// Links page -- list all links
	if (is_page(links)) {
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