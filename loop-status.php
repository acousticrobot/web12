<?php
/**
 * Loop for listing status posts
 *
 * called by: home.php 
 */
?>

<?php 

	$set = w12_filter_status_posts(); 
	
 	$loop = new WP_Query( $set );

 	if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post(); 
				
 		get_template_part('content','status');
				
  	endwhile; endif; 

?>
	