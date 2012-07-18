<?php
/*
*   Template Name: Archive	
*    
*	Description: Main Template for archive page, moved from mainset
*
* 	CALLED BY: /archive
*	GET:		GET parameter 'apg' used for archive pagination
*	CALLS TO:	HEADER, main side nav, loop, inc/mainsetContent, inc/childlist,  FOOTER
*  	v 2.0
* 
*	TODO: http://wordpress.stackexchange.com/questions/12614/paging-result-of-get-posts-in-function	 
*/

$templateID = 'mainset';

$debug = False;

global $a_page; // archive page    
$np = 25; // number of posts per page
$page_lim = 5; // sanity check: max number of pages to allow in query
$off = 0; // offset parameter for page (where to start query)
// test get: http://web12/archive?apg=3

if (isset($_GET["apg"])) {
	$a_page = (int)$_GET["apg"];
	$off = $np * $a_page; 
} else {
	$a_page = 0;
}

$human_page = (string)$a_page + 1;

	// Set vars for previous and next links
$has_older = False; // reset below after query
if ($a_page > 0) {
	$has_newer = True;
	$prev_alink = "archive?apg=" . ($a_page - 1);  
} else {
	$has_newer = False;
}
;
?>

<?php get_header(); ?>
		
<h2><?php the_title(); ?> page <?php echo $human_page; ?> </h2>
		
<nav id="mainSideNav">
<?php wp_nav_menu(array('menu' => 'Main Side Navigation')); ?>
</nav> <!-- mainSideNav -->
			
<div id="innerWrapper">

<?php 


$args = array(
    'numberposts'     => $np + 1, // +1 to check for next page
   	'offset'          => $off,
    'orderby'         => 'post_date',
    'order'           => 'DESC',
    'post_type'       => array('artworks','page','post'),
    'post_status'     => 'publish' 
);

$posts_array = get_posts( $args );	

$count = sizeof($posts_array);

if ($count > $np) {
	$has_older = True;
	$next_alink = "archive?apg=" . ($a_page + 1);
	$extra = array_pop($posts_array);	// don't display the next page test
}

$count = sizeof($posts_array);

?>

<!-- adapted from inc/nav -->
<div class="prev-next-nav">
	<?php if ($has_older) { ?>
		<div class="next-nav"><a href=" <?php echo $next_alink ?> ">&laquo; Older Entries</a></div>			
	<?php } ?>
	<div class="prev-nav"><?php previous_posts_link(' Newer Entries &raquo;') ?></div>
	<?php if ($has_newer) { ?>
		<div class="prev-nav"><a href=" <?php echo $prev_alink ?> ">Newer Entries &raquo;</a></div>			
	<?php } ?>
</div>

<ul>

<?php if ($debug) { ?>
<div class='debug'>
<pre><code>
	
a(rchive)_page = <?php echo $a_page; ?> 
count = <?php echo $count; ?> 
offset = <?php echo $off; ?> 

</code></pre>
</div>	
<?php } 


foreach( $posts_array as $post ) : setup_postdata($post);

	get_template_part( 'content','bullet_archive');		

endforeach;

wp_reset_query(); // needed for breadcrumbs to work

?>

</ul>	
<?php include (TEMPLATEPATH . '/inc/nav-prev_next.php' ); ?>						
</div>  <!-- innerWrapper  -->

<?php get_footer(); ?>
