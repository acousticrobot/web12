<?php
/*
*	Description: Navigation arrows for multi-page querries using custom values
*
* 	CALLED BY: archive-template
*	TRIGGER: 	Links show up if $has_older or $has_newer are true.
*	REQUIRES:  	$has_older : bool
*				$has_newer : bool
*				$next_alink : url
*				$prev_alink : url
*  	v 2.0	 
*/

?>
<div class="prev-next-nav">
	<?php if ($has_older) { ?>
		<div class="next-nav"><a href=" <?php echo $next_alink ?> ">&laquo; Older Entries</a></div>			
	<?php } ?>
	<div class="prev-nav"><?php previous_posts_link(' Newer Entries &raquo;') ?></div>
	<?php if ($has_newer) { ?>
		<div class="prev-nav"><a href=" <?php echo $prev_alink ?> ">Newer Entries &raquo;</a></div>			
	<?php } ?>
</div>
