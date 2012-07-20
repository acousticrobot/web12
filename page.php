<?php 
/*
*	Description: Main Template for pages set to default template
*   Template Name: Collections	
* 	CALLED BY: 	Single pages
*	CALLS TO:	HEADER, main side nav, loop, inc/mainsetContent, inc/childlist,  FOOTER
*  	v 2.0
*/
	
$templateID = "foo"; // in functions.php, returns parent page ID or false
// if (!$templateID) {
// 	$templateID = "default page";
// }

get_header(); 

$showed_main = false; // Displayed the main post
$num_to_display = 10; // number of posts total to display
$on_num = 0;
$link_title = true; // need to trigger title as anchor down the line

?>

<h2>Most Recent Post:</h2>

<div id="innerWrapper">	

<nav id="mainSideNav">
<?php wp_nav_menu(array('menu' => 'Main Side Navigation'));
		include (TEMPLATEPATH . '/inc/nav-side_menu.php' );		?>
</nav> <!-- mainSideNav -->	

<?php
if (is_page('recent')) :
	$args = array(
	    'numberposts'     => 10, // +1 to check for next page
	   	'offset'          => 0,
	    'orderby'         => 'post_date',
	    'order'           => 'DESC',
	    'post_type'       => array('artworks','post'),
	    'post_status'     => 'publish' 
	); 

	$posts_array = get_posts( $args );	
	

foreach( $posts_array as $post ) : setup_postdata($post);
	if ( !has_post_format( 'status')) :
		
		if (!$showed_main) {
			$type = get_post_type($post);
			if ($type == 'post') { 
				get_template_part( 'content' ); 
			} else { 
				get_template_part( 'content', $type ); 
			};
			comments_template(); 		
			$showed_main = true;			
			$on_num = 1;
			
?>
<h2>Other Recent Posts:</h2>	
<?php
			
		} else if ($on_num < $num_to_display) {
			get_template_part( 'content', 'archive' ); 
			$on_num += 1;	
		}

	endif; // not status
endforeach;

wp_reset_query(); // needed for breadcrumbs to work

else:
	
get_template_part( 'loop');

endif;

?>
</div> <!-- innerWrapper  -->

<?php get_footer(); ?>

