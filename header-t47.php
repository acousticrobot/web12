<?php
/*
*	Description: custom css and javascript for t47 pages
*
* 	CALLED BY: 	template-t47.php --> header.php  
*	CALLS TO:	t47 styles, javascripts for side menu and custom
*  	v 2.0	 
*	TODO: change to footer to drop scripts into bottom, add css into header.php
*/

?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/t47.css">

<?php
	wp_enqueue_script('hoverIntent');
	wp_enqueue_script('superfish');
	wp_enqueue_script('t47script');
?>
