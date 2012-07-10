<?php
/*
*	Template for taxonomy searches
*	Used for artworks: dimensions, year, medi
*	
*	v1.1
*/
$templateID = 'mainset';
 get_header(); ?>

<?php if (have_posts()) : 

	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );


?>
		
		<h2>Taxonomy Results: <?php echo get_query_var( 'taxonomy' ) . " " . $term->name; ?></h2>		

		<nav id="mainSideNav">
			<?php wp_nav_menu(array('menu' => 'Main Side Navigation'))?>
		</nav> <!-- mainSideNav -->	
		
		<div id="innerWrapper">	
				
		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

			<?php get_template_part( 'loop', 'archive'); ?>

		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

<?php else : ?>

		<h2>No posts found.</h2>
					
		<div id="innerWrapper">
			
	<?php endif; ?>
</div>  <!-- innerWrapper  -->

<?php get_footer(); ?>