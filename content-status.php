<?php
/**
 * Displays 'status' post-type content
 *
 * Called by: loop-status.php
 *
 */
?>

<article class='status'>
	
	<div class= "status-meta">

		<p class="status-date"><?php the_date('m-d-Y'); ?></p>
		
<?php 
		$category = get_the_category(); 
		if(($category[0]) && ($category[0]->cat_name != 'Uncategorized' ) ){
		echo '<p class="status-category"><a  href="'.get_category_link($category[0]->term_id ).'">'
			.$category[0]->cat_name.'</a></p>';
		}
?>
		
		<?php edit_post_link('Edit','',''); ?>

	</div>		

		<div class="status-content"><?php the_content(); ?></div>
		
		<div class="clear-left"></div>
			
</article>
