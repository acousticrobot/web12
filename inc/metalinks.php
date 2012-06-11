<?php
		/*
		*   Metalinks lists categories and tags as links.
		*   Used at the the bottom of posts
		*   
		*   Called by: content, content-excerpt, content-single, content-artwork
        *	v1.0
		*/
?>

<div class="tags">
	
	
	
	<?php 
			$category = get_the_category(); 
			if(($category[0]) && ($category[0]->cat_name != 'Uncategorized' ) ){
			echo 'Filed Under:<a  href="'.get_category_link($category[0]->term_id ).'">'
				.$category[0]->cat_name.'</a>';
			}
	?>	
				
	<?php the_tags( ' Tags: ', '&bull;', ''); ?>
</div>  <!-- tags  -->



