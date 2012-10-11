<?php 
/*
*	Description: Carousel Loop -- lists posts and artworks
*
* 	CALLED BY: 	home 
*	CALLS TO:	Uses main query from home with pre_filter
*  	v 2.1   
*/
 ?>

<ul id = "carousel">
			
<?php 
if (have_posts()) : while (have_posts()) : the_post(); 
		
	if ( !has_post_format( 'status')) :
		 
		$type = get_post_type( $post );	
?>
		
<li class="slide" id="post-<?php the_ID(); ?>">

<?php 
	if ($type != 'page') { // its a post or artwork, so it has a category
		$category = get_the_category();
		$class_category = $category[0]->slug;
		switch ($category[0]->cat_name) {
			case 't47':
				$name = 'sitelen';
				break;
			case 'contemporary art':
				$name = 'visual art';
				break;
			default:
				$name = $category[0]->cat_name;
				break;
		}
	} else { // it's a page, we have to figure out what kind
		if (!$post->post_parent) {
			$name = 'new page';
		} else $name = get_the_title($post->post_parent);
		$class_category = "page";
		switch ($name) {
			case 'Topics in Contemporary Art':
				$name = 'visual art';
				$class_category = "art125";
				break;
			case 'digital media':
				$class_category = 'dma';
				break;
			default:
				break;
		}
	}?>
		
		<article class="<?php echo $type . ' ' . $class_category; ?>">
		<h4><?php the_time('F jS, Y') ?></h4>
	
		<h2>
<?php 
	echo $name;
 ?>
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
		

