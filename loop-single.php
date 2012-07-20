<?php
/**
 * Loop for the latest non-status post
 *
 * called by: mainset/rambles, 
 * v1.0
 */
?>

<?php
$args = w12_filter_exclude_status();
$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	<div class="entry">	

		<?php get_template_part('content','single'); ?>

		<?php comments_template(); ?>

	</div>  <!-- END entry  -->


<?php
	endif;

// Reset Post Data
wp_reset_postdata();
?>