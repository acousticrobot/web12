<?php
/*
*	Description: Main Archive Template
*
* 	CALLED BY: 	triggered by keywords in content 
*		TRIGGER: 	Category, Date and Tag searches
*		NOTE: 	NOT triggered by jg.com/archive/ 
*				This is handled by page archive, attached to template-mainset.php
*		CALLS TO:	HEADER, main side nav, loop-archive, FOOTER
*  	v 2.0	 
*/

$templateID = 'mainset';
global $custom_title;

if (have_posts()):
	$count = count($posts);
	if ($count == 1) {
		$count = 'one article';
	} else {
		$count .= ' articles';
	}
	if (is_category() || is_tag()) {
		if (is_tag()) {
			$type = 'the Tag';
		} else {
			$type = '';
		}
		$key = single_cat_title("",false);
	} elseif (is_day()) { 
		$type = 'the Day ';
		$key = get_the_date('F jS, Y');
	} elseif (is_month()) { 
		$type = 'the Month of ';
		$key = get_the_date('F, Y');
	} elseif (is_year()) { 
		$type = 'the Year ';
		$key = get_the_date('Y');
	}
// 	} elseif (is_author()) {
// 			$custom_title = 'Author Archive';
// 
// 	} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { 
// 			$custom_title = 'Blog Archives';
// 
// 	} elseif ( is_post_type_archive() ) {
// 		    $custom_title = post_type_archive_title() . ' Archive';   
// 	}
	$terms = '<span class="search-terms">&lsquo;' . $key . '&rsquo;</span> &mdash; ' . $count;
	$custom_title = 'Entries for ' . $type . ' ' . $terms;
endif;


get_header(); 
get_template_part( 'loop', 'archive');
get_footer();

?>