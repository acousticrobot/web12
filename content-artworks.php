<?php
	/**
	 * Displays 'artworks' custom-post-type content
	 *
	 * 	CALLED BY: 	loop.php --> single.php for custom-post-type artwork
	 *	CALLS TO:	
	 *  v 2.0	 
	 */
?>



<div id="innerWrapper">	

<?php the_content(); ?>
	
<h2><?php the_title(); ?></h2>
	
	
<?php  // Artworks project taxonomy is covered by Category for better search results
	$category = get_the_category(); 
	
	if(($category[0]) && ($category[0]->cat_name != 'Uncategorized' ) ){
		echo '<div class="artmeta">Project:<a  href="'. get_category_link($category[0]->term_id ) .'">'
				. $category[0]->cat_name.'</a></div>';
	} 
?>
	
<?php // Year is a reserved taxonomy name, 
	if (get_the_term_list( $post->ID, 'jyear' ) != null ) { 
?>		

<div class='artmeta'>Year: <?php echo get_the_term_list( $post->ID, 'jyear', '', ', ', '' ); ?></div>

<?php 
	} 
?>

	<?php if (get_the_term_list( $post->ID, 'dimensions' ) != null ) { ?>
		<div class='artmeta'>Dimensions: <?php echo get_the_term_list( $post->ID, 'dimensions', '', ', ', '' ); ?></div>
	<?php } ?>
	<?php if (get_the_term_list( $post->ID, 'media' ) != null ) { ?>
		<div class='artmeta'><?php echo get_the_term_list( $post->ID, 'media', '', ', ', '' ); ?></div>
	<?php } ?>
	

	<?php edit_post_link('Edit this artwork','','.'); ?>

</div> <!-- innerWrapper  -->

