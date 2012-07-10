<?php
/*
*	Template for taxonomy searches
*	Used for artworks: dimensions, year, media
*	
*	v1.1
*/
 get_header(); ?>

<?php if (have_posts()) : ?>
		
		<h2>Taxonomy Results</h2>		

		<nav id="mainSideNav">
			<?php wp_nav_menu(array('menu' => 'Main Side Navigation'))?>
		</nav> <!-- mainSideNav -->	
		
		<div id="innerWrapper">	
				
		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

		<?php while (have_posts()) : the_post(); ?>
			
			<?php if ( !has_post_format( 'status')) { // style as a regular post ?>

				<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

					<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?></h2>

					<article>
						<?php // display intro_p for pages, excerpts for posts					
							$excerpt = get_post_meta($post->ID, 'intro_p', true); 						
							if ($excerpt != '') {
								?><p><?php echo $excerpt; ?></p><?php					
							} else the_excerpt();
					?>
					</article>
			</div>

		<?php } endwhile; ?>

		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>No posts found.</h2>
			
		<nav id="mainSideNav">
			<?php wp_nav_menu(array('menu' => 'Main Side Navigation'))?>
		</nav> <!-- mainSideNav -->	
		
		<div id="innerWrapper">
			
	<?php endif; ?>
</div>  <!-- innerWrapper  -->

<?php get_footer(); ?>