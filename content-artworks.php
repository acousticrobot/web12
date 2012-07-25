<?php
/**
 * Displays 'artworks' custom-post-type content
 *
 * 	CALLED BY: 	loop.php --> single.php for custom-post-type artwork
 *	TRIGGER: type 'artworks'
 *	CALLS TO: Uses global $link_title (for page recent) to make the title a link.
 *  Call all art taxonomy fields
 *  v 2.0	 
*/
global $link_title;
?>

<div id="innerWrapper">	

<?php the_content(); ?>
	
<?php if ($link_title) { ?>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<?php } else { ?>
	<h2><?php the_title(); ?></h2>
<?php } ?>
	
<?php 	
			// Display Category
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

			// Display Tags
		
		?><div class='artmeta'><?php the_tags( ' Tags: ', ', ', ''); ?></div><?php



?>


<?php edit_post_link('Edit this artwork','','.'); ?>
		
</div> <!-- innerWrapper  -->

