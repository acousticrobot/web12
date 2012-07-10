</div><!-- END contentWrap -->



<footer>
	<?php if ( function_exists('yoast_breadcrumb') && !(is_home()) ) {
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>
	
	<?php 
		if (is_page_template('template-t47.php')) { 
	 		include (TEMPLATEPATH . '/inc/t47copyright.php' ); 
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

	$customID = get_custom_id();
	if ($customID == "lab"){
		$scripts = list_scriptkeys();
		echo $scripts;
	}
			
	wp_footer(); 

?>
	
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/googleAnalytics.js"></script>
	
</body>

</html>
