<?php
/*
*   Template Name: Projects	
*    
*	Description: Template for main level project pages
*
* 	CALLED BY: pages under projects: t47
*	TRIGGER: Set the page's template to "Projects"
*	CALLS TO:	HEADER, main side nav, content loop, page Query, inc/childlist,  FOOTER
*  	v 2.0	 
*/

global $post;
$templateID = "default";
$project_name = $post->post_name;
if ($project_name == 't47') {
	$templateID = $project_name;
}
$cat_ID = get_cat_ID( $project_name );





// get list of posts

// get list of artworks


get_header(); 
?>
	

<h2><?php the_title(); ?></h2>

<?php 
	if ($templateID == 'mainset') {
?>
	<nav id="mainSideNav"><?php wp_nav_menu(array('menu' => 'Main Side Navigation')); ?></nav>
<?php
	} elseif ($templateID == 't47') {
?>
	<nav id="sideMenu">
		<?php include (TEMPLATEPATH . '/inc/nav-side_menu-t47.php' ); ?>
	</nav>
<?php
	} 
?>

<?php
if (have_posts()) : while (have_posts()) : the_post();
	the_content();
endwhile; endif;

?>
<div id="innerWrapper">


<ul>  <!-- hover intent styles -->
<?php
// get list of pages under 'learn'
$learn_args = 'pagename=learn/'.$project_name;
$learn = new WP_Query($learn_args);
if ($learn->have_posts()) : $learn->the_post(); 
?>
	<h3><a href="/learn/<?php echo $project_name ?>">Lessons</a></h3>
<?php
	$learn_list = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
	echo $learn_list;
endif;
wp_reset_query();
?>
</ul>


<?php
$artworks_args = web12_filter_posts_from_artworks($cat_ID,'artworks');
$posts_array = get_posts( $artworks_args );
if ($posts_array) :
	echo '<h3>Artworks:</h3>';
	foreach( $posts_array as $post ) : setup_postdata($post);
		get_template_part( 'content','archive');		
	endforeach;
endif;
wp_reset_query();
?>


<?php
$posts_args = web12_filter_posts_from_artworks($cat_ID,'post');
$posts_array = get_posts( $posts_args );
if ($posts_array):
	echo '<h3>Posts:</h3>';
	foreach( $posts_array as $post ) : setup_postdata($post);
		get_template_part( 'content','archive');		
	endforeach;

endif;
wp_reset_query();
?>

</div>

<?php get_footer(); ?>
