<?php 	
			// Display Category, used instead of Project
		$category = get_the_category(); 
	
		if(($category[0]) && ($category[0]->cat_name != 'Uncategorized' ) ){
			echo '<div class="artmeta">Project: <a  href="'.get_category_link($category[0]->term_id ).'">'
					.$category[0]->cat_name.'</a></div>';
		}; 

		
 			// Display Year (taxonomy: 'year_made')
		if (get_the_term_list( $post->ID, 'year_made' ) != null ) { 
?><div class='artmeta'>Year: <?php echo get_the_term_list( $post->ID, 'year_made', '', ', ', '' );?></div>
<?php 	};


			// Display Dimensions
		if (get_the_term_list( $post->ID, 'dimensions' ) != null ) { 
?><div class='artmeta'>Dimensions: <?php echo get_the_term_list( $post->ID, 'dimensions', '', ', ', '' );?></div>
<?php 	} 

			// Display Media List
		if (get_the_term_list( $post->ID, 'media' ) != null ) { 
?><div class='artmeta'>Media: <?php echo get_the_term_list( $post->ID, 'media', '', ', ', '' ); ?></div><?php } 

?>

<span class ="archive-date"><?php include (TEMPLATEPATH . '/inc/meta-links.php' ); ?></span>

<?php edit_post_link('Edit this artwork','','.'); ?>
