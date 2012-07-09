<?php

// Add new post type for artworks
add_action('init', 'artwork_init');
function artwork_init() 
{
	$artwork_labels = array(
		'name' => _x('artwork', 'post type general name'),
		'singular_name' => _x('artwork', 'post type singular name'),
		'all_items' => __('All Artworks'),
		'add_new' => _x('Add New Artwork', 'artwork'),
		'add_new_item' => __('Add New Artwork'),
		'edit_item' => __('Edit Artwork'),
		'new_item' => __('New Artwork'),
		'view_item' => __('View Artwork'),
		'search_items' => __('Search in Artworks'),
		'not_found' =>  __('No artwork found'),
		'not_found_in_trash' => __('No artworks found in trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $artwork_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','thumbnail','excerpt','comments','custom-fields'), 
		'taxonomies' =>array('category','post_tag'),		
		'has_archive' => 'artworks'
	); 
	register_post_type('artworks',$args);
}

add_action('init', 'homework_init');
function homework_init() 
{
	$homework_labels = array(
		'name' => _x('homework', 'post type general name'),
		'singular_name' => _x('homework', 'post type singular name'),
		'all_items' => __('All Homework'),
		'add_new' => _x('Add New Homework', 'homework'),
		'add_new_item' => __('Add New Homework'),
		'edit_item' => __('Edit Homework'),
		'new_item' => __('New Homework'),
		'view_item' => __('View Homework'),
		'search_items' => __('Search in Homework'),
		'not_found' =>  __('No homewwork found'),
		'not_found_in_trash' => __('No homework found in trash'), 
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $homework_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','editor','thumbnail','excerpt','comments','custom-fields'), 
		'has_archive' => 'homeworks'
	); 
	register_post_type('homework',$args);
}


// Add custom taxonomies
add_action( 'init', 'web12_create_taxonomies', 0 );

function web12_create_taxonomies() {
	
	// Year
	$jyear_labels = array(
		'name' => _x( 'Year', 'taxonomy general name' ),
		'singular_name' => _x( 'Year', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in Years' ),
		'all_items' => __( 'All Years' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Year' ), 
		'update_item' => __( 'Update Year' ),
		'add_new_item' => __( 'Add new Year' ),
		'new_item_name' => __( 'New Year' ),
		'menu_name' => __( 'Year' ),
	);
	register_taxonomy('jyear',array('artworks'),array(
		'hierarchical' => true,
		'labels' => $jyear_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'jyear' )
	));

	// dimensions (hierarchial)
	$dimension_labels = array(
		'name' => _x( 'Dimensions', 'taxonomy general name' ),
		'singular_name' => _x( 'Dimensions', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in Dimensions' ),
		'all_items' => __( 'All Dimensions' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit dimensions' ), 
		'update_item' => __( 'Update dimensions' ),
		'add_new_item' => __( 'Add new dimensions' ),
		'new_item_name' => __( 'New dimensions' ),
		'menu_name' => __( 'Dimensions' ),
	);
	register_taxonomy('dimensions',array('artworks'),array(
		'hierarchical' => true,
		'labels' => $dimension_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'dimensions' )
	));
	
	// Media (Non-hierarchial)
		$media_labels = array(
		'name' => _x( 'Media', 'taxonomy general name' ),
		'singular_name' => _x( 'Medium', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in Media' ),
		'popular_items' => __( 'Popular media' ),
		'all_items' => __( 'All media' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit media' ), 
		'update_item' => __( 'Update media' ),
		'add_new_item' => __( 'Add new medium' ),
		'new_item_name' => __( 'New medium name' ),
		'separate_items_with_commas' => __( 'Separate media with commas' ),
	    'add_or_remove_items' => __( 'Add or remove media' ),
	    'choose_from_most_used' => __( 'Choose from the most used media' ),
		'menu_name' => __( 'Media' ),
	);
	register_taxonomy('media',array('artworks'),array(
		'hierarchical' => false,
		'labels' => $media_labels,
		'show_ui' => true,
		'update_count_callback' => '_update_post_term_count', // server performance
		'query_var' => true,
		'rewrite' => array('slug' => 'media' )
	));
	
	// project (hierarchial)
	$project_labels = array(
		'name' => _x( 'project', 'taxonomy general name' ),
		'singular_name' => _x( 'project', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in projects' ),
		'all_items' => __( 'All projects' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit project' ), 
		'update_item' => __( 'Update project' ),
		'add_new_item' => __( 'Add new project' ),
		'new_item_name' => __( 'New project' ),
		'menu_name' => __( 'Project' ),
	);
	register_taxonomy('project',array('artworks'),array(
		'hierarchical' => true,
		'labels' => $project_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'project' )
	));
	
	// class (hierarchial)
	$class_labels = array(
		'name' => _x( 'Class', 'taxonomy general name' ),
		'singular_name' => _x( 'Class', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search in Classes' ),
		'all_items' => __( 'All Classes' ),
		'most_used_items' => null,
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Class' ), 
		'update_item' => __( 'Update Class' ),
		'add_new_item' => __( 'Add new Class' ),
		'new_item_name' => __( 'New Class' ),
		'menu_name' => __( 'Class' ),
	);
	register_taxonomy('class',array('homework'),array(
		'hierarchical' => true,
		'labels' => $class_labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'class' )
	));
	
}  // END web12_create_taxonomies() 



// Add new Custom Post Type icons
add_action( 'admin_head', 'artwork_icons' );
function artwork_icons() {
?>

	<style type="text/css" media="screen">
		#menu-posts-homework .wp-menu-image {
			background: url(/images/nav/admin-homework.png) no-repeat 6px -33px !important;
		}
		#menu-posts-homework:hover .wp-menu-image {
			background: url(/images/nav/admin-homework.png) no-repeat 6px -3px !important;
		}
		.icon32-posts-homework {
			background: url(/images/nav/admin-homeworklrg.png) no-repeat !important;
		}
		#menu-posts-artworks .wp-menu-image {
			background: url(/images/nav/admin-artwork.png) no-repeat 6px -33px !important;
		}
		#menu-posts-artworks:hover .wp-menu-image {
			background: url(/images/nav/admin-artwork.png) no-repeat 6px -3px !important;
		}
		.icon32-posts-artworks {
			background: url(/images/nav/admin-artworklrg.png) no-repeat !important;
		}
    </style>

<?php }
	
?>
<?php
// Make sure Artworks shows up in the category archive:
// references:
// http://www.billerickson.net/customize-the-wordpress-query/
// http://wordpress.org/support/topic/custom-post-type-tagscategories-archive-page
// http://designpx.com/tutorials/custom-post-types-author-archive/
if (!is_admin()) { // admin having problems saving with this filter
	add_filter('pre_get_posts', 'query_post_type');
	function query_post_type($query) {
		if ( $query->is_main_query() ) { // don't mess up the menu
			if (is_category() || is_tag()) { 
			    $query->set('post_type',array('post','artworks'));
			};
		};
		return $query;
	}
}
?>
