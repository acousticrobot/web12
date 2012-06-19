<?php 
/*
*	Description: Outputs the custom navigation badge
*	Called by: header.php
*	v 1.0
*/

	$badgeID = get_custom_id(); // in functions.php
	$class = "";
	switch ($badgeID) {
		case 'home':
		case 'mainset':
			the_post();
			$badge = 'mainset';
			$link = "";
			$class = get_the_title();
			rewind_posts();
			// for individual badges: 
			//$link = $badge;
			//$badge = get_the_title();
			break;
		case 'artworks':
			$badge = 'artworks';
			$link = $badge;
			break;
		case 't47':
			$link = "projects/t47";
			$badge = 't47';
			break;
		case 'art125':
		case 'homework art125':
			$link = "students/art125";
			$badge = 'art125';
			break;
		case 'dma105':
		case 'homework dma105':
			$link = "students/dma105";
			$badge = 'dma105';
			break;
		case 'general':
			$link = "archive";
			$badge = 'gen';
			break;
		case '404':
			$link = "";
			$badge = '404';
			break;
		case 'search';
			$link = "";
			$badge = 'search';
			break;
		case 'lab';
			$link = "category/lab";
			$badge = 'lab';
			break;
		default:
			$link = "archive";
			$badge = 'gen';		
	};
?>

<div id="badge" class="<?php echo $class ?>">
	<a href="/<?php echo $link ?>">
		<img src="/images/nav/<?php echo $badge ?>Badge.png" alt="<?php the_title(); ?>"/>
	</a>
</div>
