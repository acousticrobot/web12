<?php
/*
*	Description: Main Archive Template
*
* 	CALLED BY: 	triggered by keywords in content 
*		TRIGGER: 	Category, Date and Tag searches
*		NOTE: 	NOT triggered by jg.com/archive/ 
*				This is handled by page archive, attached to template-mainset.php
*		CALLS TO:	HEADER, main side nav, loop-archive, FOOTER
*  	v 2.0	 
*/
	$templateID = 'mainset';
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

	<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>

	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>

	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2>Archive for <?php the_time('F jS, Y'); ?></h2>

	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2>Archive for <?php the_time('F, Y'); ?></h2>

	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2>Archive for <?php the_time('Y'); ?></h2>

	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2>Author Archive</h2>

	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2>Blog Archives</h2>
	
	<?php /* If this is a homework archive */ } elseif ( is_post_type_archive() ) {
		    ?>
		    <h2><?php post_type_archive_title(); ?> Archive</h2>
		    <?php
		} ?>
	
	<nav id="mainSideNav">
		<?php wp_nav_menu(array('menu' => 'Main Side Navigation'))?>
	</nav> <!-- mainSideNav -->	
	
	
	<div id="innerWrapper">

		<?php get_template_part( 'loop', 'archive'); ?>
	
	</div>  <!-- innerWrapper  -->
	
<?php else : ?>

	<h2>Nothing found</h2>

<?php endif; ?>

<?php get_footer(); ?>