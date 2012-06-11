<?php

/*
*	Description: custom css and javascript for homepage
*	Called by: header.php for home.php
*	v 1.2
*/

?>


<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/mainStyles.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/homeStyles.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/scrollStyles.css">

<?php
	wp_enqueue_script('jscrollpane');
	wp_enqueue_script('mousewheel');
	wp_enqueue_script('paper');
	wp_enqueue_script('flypaper');
	wp_register_script(
		'bobBee', get_bloginfo('template_directory') . "/js/fly.bobBee.js");
	wp_enqueue_script('bobBee');
?>

<?php
	wp_enqueue_script('homescript');
?>
