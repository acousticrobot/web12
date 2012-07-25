<?php 
/*
*	Name: footer.php
*	
* 	CALLED BY: 	All pages
*	CALLS TO:	inc/t47copyright, sidebar-right.php, sidebar-left.php, custom scripts 
*  	v 2.2	 
*/
?>

</div><!-- END contentWrap -->

<footer>
	<?php if ( function_exists('yoast_breadcrumb') && !(is_home()) ) {
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>
	
	<?php 
		if (is_page_template('template-t47.php')) { 
	 		include (TEMPLATEPATH . '/inc/copyright-t47.php' ); 
		} else	{ 
			echo "<p class='copy'> &copy;" . date("Y") . " "; echo bloginfo('name'); echo "</p>"; 
		}
	?>
</footer>

</div><!-- END pageWrap -->

<?php
	get_sidebar('right');
	get_sidebar('left');  

?>
</div><!-- END outerWrap -->

<?php 


	$customID = web12_get_custom_id();
	if ($customID == "lab"){
		$scripts = list_scriptkeys();
		echo $scripts;
	}
			
	wp_footer(); 

?>
	<?php if (!current_user_can('manage_options')) { ?>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/googleAnalytics.js"></script>
	<?php } ?>
</body>

</html>
