<?php
/*
*	Description: Navigation arrows for multi-page querries
*
* 	CALLED BY: search/taxonomy/archive.php --> loop-archive
*	TRIGGER: taxonomy key-word searches (artwork: dimensions, year_made, media)
*	CALLS TO:	wp: next_posts_link, previous_posts_link
*  	v 2.0	 
*/

?>

<div class="prev-next-nav">
	<div class="next-nav"><?php next_posts_link('&laquo; Older Entries') ?></div>
	<div class="prev-nav"><?php previous_posts_link(' Newer Entries &raquo;') ?></div>
</div>

 <!-- see http://codex.wordpress.org/Fun_Character_Entities  -->