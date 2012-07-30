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
$templateID = "projects";
$post_ID = $post->post_name;
$cat_ID = get_cat_ID( $post_ID );


// get list of pages under 'learn'
$learn_args = 'pagename=learn/'.$post_ID;
$learn = new WP_Query($learn_args);
if ($learn->have_posts()) : $learn->the_post(); 
$learn_list = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
endif;
wp_reset_query();



// get list of posts

// get list of artworks


get_header(); 
?>
	

<h2><?php the_title(); ?></h2>


<div id="innerWrapper">
<h3>Lessons:</h3>

<ul class="sf-menu sf-vertical">  <!-- hover intent styles -->
<?php

echo $learn_list;

the_content();


?>
</ul>

<h3>Artworks:</h3>
<?php
$artworks_args = web12_filter_posts_from_artworks($cat_ID,'artworks');
$posts_array = get_posts( $artworks_args );
foreach( $posts_array as $post ) : setup_postdata($post);

	get_template_part( 'content','bullet_archive');		

endforeach;
wp_reset_query();
?>


<h3>Posts:</h3>
<?php
$posts_args = web12_filter_posts_from_artworks($cat_ID,'post');
$posts_array = get_posts( $posts_args );
foreach( $posts_array as $post ) : setup_postdata($post);

	get_template_part( 'content','bullet_archive');		

endforeach;
wp_reset_query();
?>

</div>

<?php get_footer(); ?>
