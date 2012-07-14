<?php 
/*
*	Description: Lists all child pages
*
*	CALLED BY: 	template-mainset: projects, t47
*	TRIGGER: 	custom field
*	CALLS TO:	HEADER->home-head, main side nav, loop-carousel, loop-status, FOOTER
*  	v 2.0	 
*/

	
	$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0'); 
	
	if ($children) : ?>

<div class="link-list">
	<ul>
		<?php echo $children ?>
	</ul>
</div>

<?php 
	endif; 
?>
