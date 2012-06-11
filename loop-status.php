<?php
/**
 * Loop for listing statii
 *
 * called by: home.php 
 */
?>

<?php 

	$set = display_statii(); 
	
 	$loop = new WP_Query( $set );

 	if ($loop->have_posts()) : while ( $loop->have_posts() ) : $loop->the_post(); 
				
 		get_template_part('content','status');
				
  	endwhile; endif; 

?>
	