<?php
	/*
	*	Loop lists artworks
	*	
	*	called by: archive-artworks.php 
	*	v1.0
	*/


	if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<a href="<?php the_permalink(); ?>">
	<?php 
	if(has_post_thumbnail()) {
		the_post_thumbnail();
	} else {
		echo '<img class="wp-post-image" src="/images/nav/artworksBadge.png" alt="artwork" />';
	}
	?>
	</a>

	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
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
	
	<div class='clear'></div>
	<?php endwhile; endif;  ?>


