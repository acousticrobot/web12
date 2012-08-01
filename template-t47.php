<?php
	/*
	*   Template Name: T47 lessons Pages	
	* 	uses custom fields: subtitle, intro_p, prvnxt-keys
	* 
	*	v1.5
	*/
	
	$templateID = 't47';
	
?>

<?php get_header(); the_post();?>

<div id="lessons">		

<h2><?php the_title(); ?></h2>

<?php
	$subtitle = get_post_meta($post->ID, 'subtitle', true);
	if (!empty($subtitle)) {
		echo "<h3>" . $subtitle . "</h3>";
	}
?>

<nav id="sideMenu">
	<?php include (TEMPLATEPATH . '/inc/nav-side_menu-t47.php' ); ?>
</nav>														

<?php
	$intro_p = get_post_meta($post->ID, 'intro_p', true);
	if (!empty($intro_p)) {
		echo "<p>" . $intro_p . "</p>";
	}
?>

<div id="innerWrapper">
	
	<?php the_content(); ?>
	
<?php
		if (get_post_meta($post->ID, 'is_index_page', true ) == 'true') { 
			 include (TEMPLATEPATH . '/inc/childlist.php' );
		}
?>	

<?php 
	if (preg_match('/\/projects\/t47\/t47-links$/', get_permalink())){
		echo '<div class="link-list">';
		 wp_list_bookmarks('show_description=1&category=9&title_before=<h3>&title_after=</h3>');
		 wp_list_bookmarks('show_description=1&category=21&title_before=<h3>&title_after=</h3>');
		 wp_list_bookmarks('show_description=1&category=20&title_before=<h3>&title_after=</h3>');
		echo '</div>';
		}?>
	
</div>	<!-- innerWrapper -->

<?php 
 // 	Use link-keys custom field for previous and next pages:
 // 	previous*URL,next*URL for example:
 //		lesson 2*/projects/t47/lessons/lesson-2,lesson 4*/projects/t47/lessons/lesson-4

	if (($linksCF = get_post_meta($post->ID, 'prvnxt-keys', true)) != "") : 
		$prevNext = explode(',',$linksCF);
		$previous = explode('*',$prevNext[0]);
		$next = explode('*',$prevNext[1]);	
?> 
		<div id="bottomMenu">		
			<ul>
				<li class="left"><a  href="<?php echo $previous[1]; ?>">
					Back to <?php echo $previous[0]; ?></a></li>
		
		
				<li class="spacer">&nbsp;</li>
				<li class="right"><a  href="<?php echo $next[1]; ?>">
					On to <?php echo $next[0]; ?></a></li>
			</ul>
		</div>
<?php ENDIF; ?>

</div> <!-- lesson -->

<?php get_footer(); ?>

