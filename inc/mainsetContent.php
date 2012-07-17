<?php 
	/*
	*	the meat of the mainset
	*
	*
	*	Called by: template-mainset
	*	
	*	*note* change cat=-60 to -4 below before upload!
	*z	v1.0
	*/  
 ?>

<?php // Rambles page-- lists newest **need to exclude all student info**

if (preg_match('/\/rambles$/', get_permalink())){
		// array( 'post_type' => array( 'artworks','post') )
	$query = new WP_Query( 'cat=-4' ); // exclude Students: off-line=60 on-line=4
	while ( $query->have_posts() ) : $query->the_post();
	if ( !has_post_format( 'status')) {
		get_template_part( 'content','excerpt');
	}
	endwhile;	
	wp_reset_query();
	$query = new WP_Query( array( 'post_type' => array( 'artworks') ) );
	while ( $query->have_posts() ) : $query->the_post();
		get_template_part( 'content','excerpt');
	endwhile;	
	wp_reset_query();
}?>

<?php // Archive page-- lists excerpts //(preg_match('/\/archive$/', get_permalink()))
if (is_page('archive')){
	if (have_posts()) :  
	 	get_template_part( 'loop', 'archive'); 
	else :  // does not have posts ?>
	<h3>No posts found.</h3>
}?>

<?php // Students page-- lists students

	if (preg_match('/\/students$/', get_permalink())) {
		// first list all posts from student news
		query_posts('category_name=student news');
		get_template_part('loop', 'list');
		wp_reset_query();
		// list all courses from 'course-keys' Custom Field
		// includes a call to coursescript.js
		get_template_part('loop', 'course');		
	} // END IF Students
?>

<?php // Links page -- list all links
	if (preg_match('/\/links$/', get_permalink())){
		echo '<div class="link-list">';
		wp_list_bookmarks("show_description=1&title_before=<h3>&title_after=</h3>");
		echo '</div>';
	}
?>	


