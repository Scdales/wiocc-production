<?php
/**
 * Created by PhpStorm.
 * User: komu
 * Date: 7/16/18
 * Time: 10:19 PM
 */
function custom_post_type_Career() {

	$labels = array(
		'name'                  => _x( 'Careers', 'Post Type General Name', 'wiocc' ),
		'singular_name'         => _x( 'Career', 'Post Type Singular Name', 'wiocc' ),
		'menu_name'             => __( 'Careers', 'wiocc' ),
		'name_admin_bar'        => __( 'Career', 'wiocc' ),
		'archives'              => __( 'Career Archives', 'wiocc' ),
		'attributes'            => __( 'Career Attributes', 'wiocc' ),
		'parent_item_colon'     => __( 'Parent Item:', 'wiocc' ),
		'all_items'             => __( 'All Items', 'wiocc' ),
		'add_new_item'          => __( 'Add New Item', 'wiocc' ),
		'add_new'               => __( 'Add New', 'wiocc' ),
		'new_item'              => __( 'New Item', 'wiocc' ),
		'edit_item'             => __( 'Edit Item', 'wiocc' ),
		'update_item'           => __( 'Update Item', 'wiocc' ),
		'view_item'             => __( 'View Item', 'wiocc' ),
		'view_items'            => __( 'View Items', 'wiocc' ),
		'search_items'          => __( 'Search Item', 'wiocc' ),
		'not_found'             => __( 'Not found', 'wiocc' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'wiocc' ),
		'featured_image'        => __( 'Featured Image', 'wiocc' ),
		'set_featured_image'    => __( 'Set featured image', 'wiocc' ),
		'remove_featured_image' => __( 'Remove featured image', 'wiocc' ),
		'use_featured_image'    => __( 'Use as featured image', 'wiocc' ),
		'insert_into_item'      => __( 'Insert into item', 'wiocc' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'wiocc' ),
		'items_list'            => __( 'Items list', 'wiocc' ),
		'items_list_navigation' => __( 'Items list navigation', 'wiocc' ),
		'filter_items_list'     => __( 'Filter items list', 'wiocc' ),
	);
	$args = array(
		'label'                 => __( 'Career', 'wiocc' ),
		'description'           => __( 'Career Description', 'wiocc' ),
		'labels'                => $labels,
		'supports'              => array( 'title','editor' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-editor-help',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'career', $args );

}
add_action( 'init', 'custom_post_type_career', 0 );
add_post_type_support( 'career', 'excerpt' );
function wiocc_get_career_meta_box( $meta_boxes ) {
	$prefix = 'wiocc-';
	/** Post */
	$meta_boxes[] = array(
		'id' => 'Career',
		'title' => esc_html__( 'Heading', 'wiocc' ),
		'post_types' => array( 'Career' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix . 'location',
				'type' => 'text',
				'name' => esc_html__( 'Location', 'wiocc' ),
			),

			array(
				'id' => $prefix . 'type',
				'name' => esc_html__( 'Hours', 'wiocc' ),
				'type' => 'select',
				'placeholder' => esc_html__( 'Select Job Type', 'wiocc' ),
				'options' => array(
					'Full Time' => 'Full Time',
					'Part Time' => 'Part Time',
				),
			)

		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'wiocc_get_Career_meta_box' );
// Register Custom Taxonomy
function specialization_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Specializations', 'Taxonomy General Name', 'wiocc' ),
		'singular_name'              => _x( 'Specialization', 'Taxonomy Singular Name', 'wiocc' ),
		'menu_name'                  => __( 'Specialization', 'wiocc' ),
		'all_items'                  => __( 'All Items', 'wiocc' ),
		'parent_item'                => __( 'Parent Item', 'wiocc' ),
		'parent_item_colon'          => __( 'Parent Item:', 'wiocc' ),
		'new_item_name'              => __( 'New Item Name', 'wiocc' ),
		'add_new_item'               => __( 'Add New Item', 'wiocc' ),
		'edit_item'                  => __( 'Edit Item', 'wiocc' ),
		'update_item'                => __( 'Update Item', 'wiocc' ),
		'view_item'                  => __( 'View Item', 'wiocc' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'wiocc' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'wiocc' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wiocc' ),
		'popular_items'              => __( 'Popular Items', 'wiocc' ),
		'search_items'               => __( 'Search Items', 'wiocc' ),
		'not_found'                  => __( 'Not Found', 'wiocc' ),
		'no_terms'                   => __( 'No items', 'wiocc' ),
		'items_list'                 => __( 'Items list', 'wiocc' ),
		'items_list_navigation'      => __( 'Items list navigation', 'wiocc' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'specialization', array( 'career' ), $args );

}
add_action( 'init', 'specialization_taxonomy', 0 );
