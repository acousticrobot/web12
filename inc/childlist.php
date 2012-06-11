<?php 
	/*
	*	Description: Lists all child pages
	*	Called by: template-mainset(pr), t47
	*	v 1.2
	*/
	
	$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0'); 
	
	if ($children) {
		echo '<div class="link-list">';
		echo '<ul>' . $children . '</ul>'; 
		echo '</div>';
 	}

 ?>