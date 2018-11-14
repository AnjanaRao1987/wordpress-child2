<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');

	function theme_enqueue_styles() {
    	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	}

	add_filter ('the_title', 'filter_example');


	function filter_example($title) {
		return 'Hooked: '.$title;
	}

function create_custom_post_type_case_study(){
	$labels = array(
		'name' => 'case-studies',
		'singular_name' => 'case-study',
		'add_new' => 'New Case Study',
		'add_new_item' => 'Add New Case Study',
		'edit_item' => 'Edit Case Study',
		'new_item' => 'New Case Study',
		'view_item' => 'View Case Study',
		'search_items' => 'Search Case Study',
		'not_found' => 'No Case studies found',
		'not_found_in_trash' => 'No Case Studies found in Trash',
		'parent_item_colon' => '',
	);
	
	$args = array(
		'label' => __('case-studies'),
		'labels' => $labels, // from array above
		'public' => true,
		'can_export' => true,
		'show_ui' => true,
		'_builtin' => false,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-menu', // from this list
		'hierarchical' => false,
		'rewrite' => array( "slug" => "Case-Studies" ), // defines URL base
		'supports'=> array('title', 'thumbnail', 'editor', 'excerpt'),
		'show_in_nav_menus' => true,
		'taxonomies' => array( 'event_category', 'post_tag')
	);
	register_post_type('case-studies', $args); 
}

add_action('init','create_custom_post_type_case_study'); 

?>

