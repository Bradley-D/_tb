<?php
/**
 * Custom Post Types
 * http://codex.wordpress.org/Post_Types
 *
 * You can register all your post types in here
**/

function _tb_register_custom_post_type() {

	// Projects Custom Post Type
	$labels = array(
		'name'               => _x( 'Projects', 'post type general name', '_tb' ),
		'singular_name'      => _x( 'Project', 'post type singular name', '_tb' ),
		'menu_name'          => _x( 'Projects', 'admin menu', '_tb' ),
		'name_admin_bar'     => _x( 'Project', 'add new on admin bar', '_tb' ),
		'add_new'            => _x( 'Add New', 'Project', '_tb' ),
		'add_new_item'       => __( 'Add New Project', '_tb' ),
		'new_item'           => __( 'New Project', '_tb' ),
		'edit_item'          => __( 'Edit Project', '_tb' ),
		'view_item'          => __( 'View Project', '_tb' ),
		'all_items'          => __( 'All Projects', '_tb' ),
		'search_items'       => __( 'Search Projects', '_tb' ),
		'parent_item_colon'  => __( 'Parent Projects:', '_tb' ),
		'not_found'          => __( 'No Projects found.', '_tb' ),
		'not_found_in_trash' => __( 'No Projects found in Trash.', '_tb' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'taxonomies'         => array('post_tag'),
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' )
	);

	register_post_type( 'projects', $args );

	// Website Projects Custom Post Type
	$labels = array(
		'name'               => _x( 'Website Projects', 'post type general name', '_tb' ),
		'singular_name'      => _x( 'Website Projects', 'post type singular name', '_tb' ),
		'menu_name'          => _x( 'Website Projects', 'admin menu', '_tb' ),
		'name_admin_bar'     => _x( 'Website Projects', 'add new on admin bar', '_tb' ),
		'add_new'            => _x( 'Add New', 'Website Projects', '_tb' ),
		'add_new_item'       => __( 'Add New Website Projects', '_tb' ),
		'new_item'           => __( 'New Website Projects', '_tb' ),
		'edit_item'          => __( 'Edit Website Projects', '_tb' ),
		'view_item'          => __( 'View Website Projects', '_tb' ),
		'all_items'          => __( 'All Website Projects', '_tb' ),
		'search_items'       => __( 'Search Website Projects', '_tb' ),
		'parent_item_colon'  => __( 'Parent Website Projects:', '_tb' ),
		'not_found'          => __( 'No Website Projects found.', '_tb' ),
		'not_found_in_trash' => __( 'No Website Projects found in Trash.', '_tb' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'website-projects' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'taxonomies'         => array('post_tag'),
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' )
	);

	register_post_type( 'website-projects', $args );

	// Testimonials Custom Post Type
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', '_tb' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', '_tb' ),
		'menu_name'          => _x( 'Testimonials', 'admin menu', '_tb' ),
		'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', '_tb' ),
		'add_new'            => _x( 'Add New', 'Testimonial', '_tb' ),
		'add_new_item'       => __( 'Add New Testimonial', '_tb' ),
		'new_item'           => __( 'New Testimonial', '_tb' ),
		'edit_item'          => __( 'Edit Testimonial', '_tb' ),
		'view_item'          => __( 'View Testimonial', '_tb' ),
		'all_items'          => __( 'All Testimonials', '_tb' ),
		'search_items'       => __( 'Search Testimonials', '_tb' ),
		'parent_item_colon'  => __( 'Parent Testimonials:', '_tb' ),
		'not_found'          => __( 'No Testimonials found.', '_tb' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash.', '_tb' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'taxonomies'         => array('post_tag'),
		'menu_position'      => 7,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' )
	);
	
	register_post_type( 'testimonial', $args );

}
add_action( 'init', '_tb_register_custom_post_type' );