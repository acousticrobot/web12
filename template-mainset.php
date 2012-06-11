<?php
	/*
	*   Template Name: Main Set	
	*   
	*   
	*	Called by: projects, rambles, students, archive, links, contact   
	*   
	*   v 1.0
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
			
		include (TEMPLATEPATH . '/inc/mainsetContent.php' ); 
			
			 // Does it have index-page as a custom field? list child pages
		if (get_post_meta($post->ID, 'is_index_page', true ) == 'true') { 
			 include (TEMPLATEPATH . '/inc/childlist.php' );
		}
?>
	</div>  <!-- innerWrapper  -->
		
<?php get_footer(); ?>