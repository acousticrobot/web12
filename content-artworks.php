<?php
	/**
	 * Displays 'artworks' custom-post-type content
	 *
	 * Called by: single.php via loop.php for custom-post-type artwork
	 *	v1.0
	 */
?>



<div id="innerWrapper">	

	

	<?php the_content(); ?>
	
	<h2><?php the_title(); ?></h2>
	
	<?php if (get_the_term_list( $post->ID, 'project' ) != null ) { ?>
		<div class='artmeta'>Project: <?php echo get_the_term_list( $post->ID, 'project', '', ', ', '' ); ?></div>
	<?php } ?>
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

</div> <!-- innerWrapper  -->

