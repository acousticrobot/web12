<?php
/*
*	Lists meta tags: Date or year and number of comments, used in h2 Titles
*
* 	CALLED BY: 	content-archive, content-excerpt, content-single, content, index
*	CALLS TO:	WP: the_time(), comments_popup_link()
*  	v 2.0	 
*/
?>

<div class="meta">
<?php
	$type = get_post_type();
	
	if ($type == 'artworks') { 
		
 		if (get_the_term_list( $post->ID, 'year_made' ) != null ) { 
			echo get_the_term_list( $post->ID, 'year_made', '', ', ', '' );	
		};
			
	} else the_time('F jS, Y');
?>
<span class="meta-comments">
	<?php comments_popup_link('', '1 Comment', '% Comments', 'comments-link', ''); ?>
</span>
</div>
