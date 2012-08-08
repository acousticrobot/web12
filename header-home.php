<?php
/*
*	Description: custom css and javascript for homepage
*
* 	CALLED BY: 	home.php --> header.php  
*	CALLS TO:	home and scroll styles, javascripts for status panel, canvas and carousel
*  	v 2.0	 
*	TODO: change to footer to drop scripts into bottom, add css into header.php
*/

?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/scroll.css">

<?php
	wp_enqueue_script('jscrollpane');
	wp_enqueue_script('mousewheel');

	wp_enqueue_script('fly');

	wp_register_script(
		'bobBee', get_bloginfo('template_directory') . "/js/fly.bobBee.js");
	wp_enqueue_script('bobBee');

	wp_enqueue_script('homescript');
?>
