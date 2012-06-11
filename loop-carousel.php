<?php 
	/*
	*	Custom loop for the slide carousel on home page
	*
	*
	*	Called by: home.php
	*	v1.0
	*/
 ?>

<ul id = "carousel">
	
	<?php  $set = exclude_status(); 
	// multiple post types:
	// $query = new WP_Query( array( 'post_type' => array( 'post', 'page', 'movie', 'book' ) ) );
	// from: http://codex.wordpress.org/Class_Reference/WP_Query
	
	
	?>
	
	
	<?php query_posts($set); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<li class="slide" id="post-<?php the_ID(); ?>">
		
			<?php $category = get_the_category(); ?>

			<article class="<?php echo $category[0]->cat_name; ?>">
			
				<h4><?php the_time('F jS, Y') ?></h4>
			
				<h2>
					<?php echo $category[0]->cat_name; ?>
				</h2>
			
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			
				<?php the_excerpt(); ?>
				
				<div class="rip"></div>
				
			</article>
		</li>
	
	<?php endwhile; endif; ?>
	
	<?php wp_reset_query(); ?>

</ul><!-- carousel-->
		

