<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category _tb
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function _tb_custom_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_tb_';

	/**
	 * Display page title custom meta box
	 * If checked result === on, else empty
	 */
	$meta_boxes['_tb_page_title'] = array(
		'id'         => '_tb_page_title',
		'title'      => __( 'Display Page Title', '_tb' ),
		'pages'      => array( 'page' ), // Post type
		'context'    => 'side',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __( 'Tick to hide page title', '_tb' ),
				'desc' => __( 'Tick to NOT show the page title', '_tb' ),
				'id'   => $prefix . 'display_title_check',
				'type' => 'checkbox',
			),
		),
	);

	/**
	 * Feature Image Text
	 */
	$meta_boxes['_tb_page_feature_text'] = array(
		'id'         => '_tb_page_feature_text',
		'title'      => __( 'Hero Text', '_tb' ),
		'pages'      => array( 'page', 'website-projects', 'projects' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => __( 'Hero Text Title', '_tb' ),
				'desc' => __( 'Title text will be a h1 heading', '_tb' ),
				'id'   => $prefix . 'feature_image_text_heading',
				'type' => 'text',
			),
			array(
				'name' => __( 'Hero Text Sub-title', '_tb' ),
				'desc' => __( 'Sub-title text will be a h2 heading', '_tb' ),
				'id'   => $prefix . 'feature_image_text_sub_heading',
				'type' => 'text',
			),
		),
	);

	/**
	 * Testimonial custom meta boxes
	 */
	$meta_boxes['_tb_testimonial_meta'] = array(
		'id'         => '_tb_testimonial_meta',
		'title'      => __( 'Client Testimonial Details', '_tb' ),
		'pages'      => array( 'testimonial' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'       => __( 'Client Contact', '_tb' ),
				'desc'       => __( 'Name of the person that gave the testimonial', '_tb' ),
				'id'         => $prefix . 'testimonial_client_name',
				'type'       => 'text',
				'show_on_cb' => 'cmb_test_text_show_on_cb', // function should return a bool value
			),
			array(
				'name'       => __( 'Position Held', '_tb' ),
				'desc'       => __( 'Position of the person that gave the testimonial', '_tb' ),
				'id'         => $prefix . 'testimonial_position',
				'type'       => 'text',
				'show_on_cb' => 'cmb_test_text_show_on_cb', // function should return a bool value
			),
			array(
				'name'       => __( 'Business Name', '_tb' ),
				'desc'       => __( 'The name of the business that gave the testimonial', '_tb' ),
				'id'         => $prefix . 'testimonial_business_name',
				'type'       => 'text',
				'show_on_cb' => 'cmb_test_text_show_on_cb', // function should return a bool value
			),
			array(
				'name' => __( 'Website URL', '_tb' ),
				'desc' => __( 'Web address of the business that gave the testimonial', '_tb' ),
				'id'   => $prefix . 'testimonial_url',
				'type' => 'text_url',
			),
		),
	);

	/**
	 * Project custom meta boxes
	 */
	$meta_boxes['_tb_projects_meta'] = array(
		'id'         => '_tb_projects_meta',
		'title'      => __( 'Project Details', '_tb' ),
		'pages'      => array( 'website-projects', 'projects' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'       => __( 'Project Name', '_tb' ),
				'desc'       => __( 'Name of the project or name of the business', '_tb' ),
				'id'         => $prefix . 'project_name',
				'type'       => 'text',
				'show_on_cb' => 'cmb_test_text_show_on_cb', // function should return a bool value
			),
			array(
				'name' => __( 'Project URL', '_tb' ),
				'desc' => __( 'Web address of the project', '_tb' ),
				'id'   => $prefix . 'project_url',
				'type' => 'text_url',
			),
			array(
				'name'       => __( 'Project Designer', '_tb' ),
				'desc'       => __( 'Designer of the project', '_tb' ),
				'id'         => $prefix . 'project_designer',
				'type'       => 'text',
				'show_on_cb' => 'cmb_test_text_show_on_cb', // function should return a bool value
			),
			array(
				'name' => __( 'Designer URL', '_tb' ),
				'desc' => __( 'Web address of the project designer', '_tb' ),
				'id'   => $prefix . 'project_designer_url',
				'type' => 'text_url',
			),
			array(
				'name'    => __( 'Services', '_tb' ),
				'desc'    => __( 'Check the services used', '_tb' ),
				'id'      => $prefix . 'project_services',
				'type'    => 'multicheck',
				'options' => array(
					'Website Design' => __( 'Website Design', '_tb' ),
					'Website Development' => __( 'Website Development', '_tb' ),
					'eCommerce' => __( 'eCommerce', '_tb' ),
					'Website Care & Maintenance' => __( 'Website Care', '_tb' ),
					'WordPress Consulting'       => __( 'WordPress Consulting', '_tb' ),
					'Local SEO' => __( 'Local SEO', '_tb' ),
					'AdWords Management' => __( 'AdWords Management', '_tb' ),
				),
				'inline'  => true, // Toggles display to inline
			),
			array(
				'name'    => __( 'Features', '_tb' ),
				'desc'    => __( 'Check the features used', '_tb' ),
				'id'      => $prefix . 'project_features',
				'type'    => 'multicheck',
				'options' => array(
					'WordPress'                  => __( 'WordPress', '_tb' ),
					'Responsive'                 => __( 'Responsive', '_tb' ),
					'Twitter Bootstrap'          => __( 'Twitter Bootstrap', '_tb' ),
					'WooCommerce'                => __( 'WooCommerce', '_tb' ),
					'_tb Theme'                  => __( '_tb', '_tb' ),
					'Child Theme'                => __( 'Child Theme', '_tb' ),
					'Too many other cool things' => __( 'Too many other cool things', '_tb' ),
				),
				'inline'  => true, // Toggles display to inline
			),
			array(
				'name'    => __( 'Project Price Range', '_tb' ),
				'desc'    => __( 'Check the price range', '_tb' ),
				'id'      => $prefix . 'project_price_range',
				'type'    => 'multicheck',
				'options' => array(
					'$2,000 to $4,000'   => __( '$2,500 to $4,000', '_tb' ),
					'$4,001 to $8,000'   => __( '$4,001 to $8,000', '_tb' ),
					'$8,001 to $16,000'  => __( '$8,001 to $16,000', '_tb' ),
					'Above $16k'         => __( 'Above $16k', '_tb' ),
				),
				'inline'  => true, // Toggles display to inline
			),
			array(
				'name'    => __( 'Description', '_tb' ),
				'desc'    => __( 'Project description (optional)', '_tb' ),
				'id'      => $prefix . 'project_wysiwyg',
				'type'    => 'wysiwyg',
				'options' => array( 
					'wpautop'       => true,
					'textarea_rows' => 20, 
				),
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', '_tb_custom_metaboxes' );

/**
 * Initialize the metabox class.
 */
function _tb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once trailingslashit( get_template_directory() ) . 'includes/metaboxes/init.php';

}
add_action( 'init', '_tb_initialize_cmb_meta_boxes', 9999 );