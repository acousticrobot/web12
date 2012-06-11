<?php
	/*
	*   Template Name: Course	
	*   
	*   For course head pages. List course content using course loop
	*
	* 	v1.0
	* 
	*/
		
the_post();
$templateID = get_the_title();
rewind_posts();
?>

<?php get_header(); the_post(); ?>
		
		<h2><?php the_title(); ?></h2>
				
		<div id="innerWrapper">	
			
		<?php the_content(); ?>
			
		<?php get_template_part('loop', 'course'); ?>			
							
		</div>  <!-- innerWrapper  -->
		
<?php get_footer(); ?>