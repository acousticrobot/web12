<?php 
/*
*    
*	Description: Main Set Content
*
* 	CALLED BY: template-mainset
*	TRIGGER:
*	CALLS TO:	
*  	v 2.0	 
*/
 ?>

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


