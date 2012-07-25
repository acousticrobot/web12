<?php
/*
*	Description: Lists categories and tags as links.
*
* 	CALLED BY: 	content, content-bullet_archive, content-excerpt, content-single, content-artwork 
*	TRIGGER: 	include (TEMPLATEPATH . '/inc/meta-links.php' );
*	CALLS TO:	get_the_category(), the_tags()
*  	v 2.0	   
*/
/*
*   Metalinks 
*   Used at the the bottom of posts
*   
*   Called by: 
*	v2.0
*/
$post_type = get_post_type();

?>
<div class="tags">
<?php

$category = get_the_category(); 

if ($post_type == 'artworks') {

	if(($category[0]) && ($category[0]->cat_name != 'Uncategorized' ) ){
		echo 'Project: <a  href="'.get_category_link($category[0]->term_id ).'">'
				.$category[0]->cat_name.'</a>';
	}
	
	if (get_the_term_list( $post->ID, 'year_made' ) != null ) { 
		echo ' Year ' . get_the_term_list( $post->ID, 'year_made', '', ', ', '' );
	}
	
	if (get_the_term_list( $post->ID, 'dimensions' ) != null ) { 
		echo ' Dimensions: ' . get_the_term_list( $post->ID, 'dimensions', '', ', ', '' );
	}
	
	if (get_the_term_list( $post->ID, 'media' ) != null ) { 
		echo ' Media: ' . get_the_term_list( $post->ID, 'media', '', ', ', '' );
	}
	 

} else {
	if(($category[0]) && ($category[0]->cat_name != 'Uncategorized' ) ){
	echo 'Filed Under:<a  href="'.get_category_link($category[0]->term_id ).'">'
		.$category[0]->cat_name.'</a>';
	}
}

the_tags( ' Tags: ', '&bull;', ''); 

?>
</div>  <!-- tags  -->



