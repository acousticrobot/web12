<?php 
/*
*	Description: Carousel Loop -- lists posts and artworks
*
* 	CALLED BY: 	home 
*	CALLS TO:	Uses main query from home with pre_filter
*  	v 2.0	   
*/
 ?>

<ul id = "carousel">
			
<?php 
if (have_posts()) : while (have_posts()) : the_post(); 
		
	if ( !has_post_format( 'status')) :
		 
		$type = get_post_type( $post );	
?>
		
<li class="slide" id="post-<?php the_ID(); ?>">

		<?php $category = get_the_category(); ?>

	<article class="<?php echo $type . ' ' . $category[0]->slug; ?>">
	
		<h4><?php the_time('F jS, Y') ?></h4>
	
		<h2>
			<?php echo $category[0]->cat_name; ?>
		</h2>
	
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	
		<?php the_excerpt(); ?>
		
		<div class="rip"></div>
		
	</article>
</li>
	
<?php 	
	endif; // not status

endwhile; endif; ?>
	
	<?php  wp_reset_query(); ?>

</ul><!-- carousel-->
		

