<?php 
	// v2.1 scripts before wp_head
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php wp_title(''); ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.png">
	
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fontStyles.css">	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>

		
	<?php 	
		$customID = get_custom_id();
		$bodyID = "id='".$customID."'";
	
  		switch ($customID) {
  			case 'home':
  				include (TEMPLATEPATH . '/inc/homeHead.php' );
  				break;
			case 'mainset': ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/mainStyles.css">
				<?php
				break;
			case 'artworks': ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/artworksStyles.css">
				<?php
				break;
			
  			case 't47':
  				include (TEMPLATEPATH . '/inc/t47head.php' );
  				break;
			case 'dma105': 
			case 'homework dma105'?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/dma105Styles.css">
			<?php
				break;
			case 'art125': 
			case 'homework art125'?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/art125Styles.css">
				<?php
			break;
			case 'lab':
			include (TEMPLATEPATH . '/inc/labHead.php' );
			set_scriptkeys();			
			break;	
  		};	
	
	?>
	
	<?php wp_head(); // add custom scripts before this line ?>
	
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
</head>


<body <?php echo $bodyID; ?> >
		
	<div id="pageWrap">
		<header>
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			
			<nav>
				<?php wp_nav_menu(array('menu' => 'Main Navigation Menu', 'show_home' => 'home'))?>
				<?php get_search_form(); ?>
			</nav>
		</header>
		
		<div id="contentWrap">
			
<?php include (TEMPLATEPATH . '/inc/badge.php' );  ?>		
			
