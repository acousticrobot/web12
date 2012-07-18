<?php 
/*
*	Description: Uses custom fields to create side navigation
*
* 	CALLED BY: content.php, content-homework.php
*	TRIGGER: custom field "nav-keys"
*	CALLS TO:
*
* 	nav-keys:		label|link,label|link
*  	example:		slidelist|/slidelist.txt,slideshow|/slideshow.
*
*  	v 2.0	 
*/
	
	$navCF = get_post_meta($post->ID, 'nav-keys', true);	

	if (!empty($navCF)) : 
?>
<nav id="mainSideNav">
	<div id="menu-custom-field-side-navigation-container">
	<ul id="menu-custom-field-side-navigation" class="menu">			
<?php		
		$navLinks = explode(',',$navCF);

		foreach ($navLinks as $link ) {
	
			$linkInfo = explode('|', $link);
			$label = $linkInfo[0];
			$source = $linkInfo[1]; 
?>
		<li class="menu item">
			<a href="<?php echo $source ?>"><?php echo $label ?></a>
		</li>
<?php			
		}
?>
	</ul>
	</div>
</nav> <!-- END mainSideNav -->
<?php	endif; 	// END nav custom fields ?>
