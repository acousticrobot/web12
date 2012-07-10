<?php
	/*
	*	Loop lists artworks
	*	
	*	called by: archive-artworks.php 
	*	v1.1
	* 	Project custom taxonomy has been merged into "category" for simpler search results
	*/


	if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<a href="<?php the_permalink(); ?>">
	<?php 
	if(has_post_thumbnail()) {
		the_post_thumbnail();
	} else {
		echo '<img class="wp-post-image" src="/images/nav/artworksThumbnail.png" alt="artwork" />';
	}
	?>
	</a>

	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
	<?php  $category = get_the_category(); 
		if(($category[0]) && ($category[0]->cat_name != 'Uncategorized' ) ){
			echo '<div class="artmeta">Project:<a  href="'.get_category_link($category[0]->term_id ).'">'
				.$category[0]->cat_name.'</a></div>';
		} ?>
	
	<?php if (get_the_term_list( $post->ID, 'jyear' ) != null ) { ?>
		<div class='artmeta'>Year: <?php echo get_the_term_list( $post->ID, 'jyear', '', ', ', '' ); ?></div>
	<?php } ?>
	<?php if (get_the_term_list( $post->ID, 'dimensions' ) != null ) { ?>
		<div class='artmeta'>Dimensions: <?php echo get_the_term_list( $post->ID, 'dimensions', '', ', ', '' ); ?></div>
	<?php } ?>
	<?php if (get_the_term_list( $post->ID, 'media' ) != null ) { ?>
		<div class='artmeta'><?php echo get_the_term_list( $post->ID, 'media', '', ', ', '' ); ?></div>
	<?php } ?>
	

	<?php edit_post_link('Edit this artwork','','.'); ?>
	
	<div class='clear'></div>
	<?php endwhile; endif;  ?>


