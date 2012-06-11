<?php 

/*
	*	Uses custom fields to create side navigation
	*	
	*	Called by: content.php, content-homework.php
	*
	*	------------------------------------------------------------------------------------
	*	Pages can use custom-field 'nav-keys' for side-nav links
	* 	Used in course posts to link to handouts,
	
	* 	nav-keys:		label|link,label|link
	*  	example:		slidelist|/slidelist.txt,slideshow|/slideshow.
	*	
	*	v 1.0		
	*/


	
	$navCF = get_post_meta($post->ID, 'nav-keys', true);	

	if (!empty($navCF)) : ?>
	
		<nav id="mainSideNav">
			<ul>
			
<?php		
		$navLinks = explode(',',$navCF);

		foreach ($navLinks as $link ) {
	
			$linkInfo = explode('|', $link);
			$label = $linkInfo[0];
			$source = $linkInfo[1]; ?>
				
				<li>
					<a href="<?php echo $source ?>"><?php echo $label ?></a>
				</li>
			
			
<?php			
		}
?>
			</ul>
		</nav> <!-- END mainSideNav -->

<?php	endif; 	// END nav custom fields ?>
