<?php 
/*
*	Description: Outputs the custom navigation badge
*		This has been stripped down for simplicity,
*		Originally there was more info about the post from:
*		the_post();
* 		$link = $badge;
*		$badge = get_the_title();
*		rewind_posts();			
*
* 	CALLED BY: header.php
*	TRIGGER: 
*	CALLS TO:	
*  	v 2.0	 
*/
		// custom_id is set at the top of all templates
	$badge_debug = false;
	$badgeID = web12_get_custom_id(); // in functions.php
	switch ($badgeID) {
		case 'home':
		case 'mainset':
			$class = 'mainset';
			$link = "";
			break;
		case 'artworks':
			$class = 'artworks';
			$link = $badge;
			break;
		case 't47':
			$link = "projects/t47";
			$class = 't47';
			break;
		case 'art125':
		case 'homework art125':
			$link = "students/art125";
			$class = 'art125';
			break;
		case 'dma105':
		case 'homework dma105':
			$link = "students/dma105";
			$class = 'dma105';
			break;
		case 'general':
			$link = "archive";
			$class = 'gen';
			break;
		case '404':
			$link = "";
			$class = '404';
			break;
		case 'search';
			$link = "";
			$class = 'search';
			break;
		case 'lab';
			$link = "category/lab";
			$class = 'lab';
			break;
		default:
			$link = "archive";
			$class = '';		
	};
?>

<div id="badge" class="<?php echo $class ?>">

<a href="/<?php echo $link ?>">
	<img src="/images/nav/badge-hoverspace.png" alt="<?php the_title(); ?>"/>
</a>



<?php if ($badge_debug) { ?>

<pre class = "debug">
ID = <?php echo $badgeID ?>

badge = <?php echo $badge ?>

link = <?php echo $link ?>

class = <?php echo $class ?>
</pre>
		
<?php 	} // endif ?>

</div>
