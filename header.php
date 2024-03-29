<?php 
/*
*	Name: header.php
*	
* 	CALLED BY: 	All pages
*	CALLS TO:	stylesheets, wp_head(), main navigation menu, searchform, badge
*  	v 2.2	 
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo('charset'); ?>" />
	
<?php if (is_search()) { ?><meta name="robots" content="noindex, nofollow" /><?php } ?>

<title><?php wp_title(''); ?></title>
	
<link rel="shortcut icon" href="/favicon.png">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
		
<?php 	
	$customID = web12_get_custom_id();
	$bodyID = "id='".$customID."'";

 	switch ($customID) {
 		case 'home':
 			include (TEMPLATEPATH . '/header-home.php' );
		case 'mainset': 
?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/mainset.css">
<?php
			break;
		case 'artworks': 
?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/artworks.css">
<?php
			break;	
  		case 't47':
  			include (TEMPLATEPATH . '/header-t47.php' );
  			break;
		case 'dma': 
		case 'homework dma':?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/dma.css">
<?php
			break;
		case 'art125': 
		case 'homework art125':?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/art125.css">
<?php
			break;
		case 'fly': 
		case 'flypaper':
?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fly.css">
<?php

  		};	
	
?>
	
<?php 
		// load custom scripts, except on pages with multiple posts
	if (($customID != 'home') && ($customID != 'mainset')) {
		web12_custom_scripts();
	}

	wp_head(); // add custom scripts before this line 
?>
	
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
	
</head>
     

<body <?php echo $bodyID; ?> >

<h1><?php 
		if ($customID == 'home') {
			echo "jonathan gabel . com";
		} else echo get_the_title(); ?></h1>	

<div id="outerWrap">		
<div id="pageWrap">
		
<header>
	<p id="site-head"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></p>
	
	<nav>
		<?php wp_nav_menu(array('menu' => 'Main Navigation Menu', 'show_home' => 'home'))?>
		<?php get_search_form(); ?>
	</nav>
</header>
		
<div id="contentWrap" class="<?php echo $customID; ?>">
			
<?php include (TEMPLATEPATH . '/inc/badge.php' );  ?>		
			