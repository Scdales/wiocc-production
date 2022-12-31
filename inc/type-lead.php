<?php
/**
 * Created by PhpStorm.
 * User: komu
 * Date: 7/16/18
 * Time: 10:19 PM
 */
function custom_post_type_lead() {

	$labels = array(
		'name'                  => _x( 'Feedback Form', 'Post Type General Name', 'mega' ),
		'singular_name'         => _x( 'Lead', 'Post Type Singular Name', 'mega' ),
		'menu_name'             => __( 'Feedback Form', 'mega' ),
		'name_admin_bar'        => __( 'Feedback Form', 'mega' ),
		'archives'              => __( 'Feedback Form Archives', 'mega' ),
		'attributes'            => __( 'Feedback Form Attributes', 'mega' ),
		'parent_item_colon'     => __( 'Parent Item:', 'mega' ),
		'all_items'             => __( 'All Items', 'mega' ),
		'add_new_item'          => __( 'Add New Item', 'mega' ),
		'add_new'               => __( 'Add New', 'mega' ),
		'new_item'              => __( 'New Item', 'mega' ),
		'edit_item'             => __( 'Edit Item', 'mega' ),
		'update_item'           => __( 'Update Item', 'mega' ),
		'view_item'             => __( 'View Item', 'mega' ),
		'view_items'            => __( 'View Items', 'mega' ),
		'search_items'          => __( 'Search Item', 'mega' ),
		'not_found'             => __( 'Not found', 'mega' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'mega' ),
		'featured_image'        => __( 'Featured Image', 'mega' ),
		'set_featured_image'    => __( 'Set featured image', 'mega' ),
		'remove_featured_image' => __( 'Remove featured image', 'mega' ),
		'use_featured_image'    => __( 'Use as featured image', 'mega' ),
		'insert_into_item'      => __( 'Insert into item', 'mega' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'mega' ),
		'items_list'            => __( 'Items list', 'mega' ),
		'items_list_navigation' => __( 'Items list navigation', 'mega' ),
		'filter_items_list'     => __( 'Filter items list', 'mega' ),
	);
	$args = array(
		'label'                 => __( 'Feedback Form', 'mega' ),
		'description'           => __( 'Lead Description', 'mega' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-network',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'lead', $args );

}
add_action( 'init', 'custom_post_type_lead', 0 );

//add_post_type_support( 'lead', 'excerpt' );

function mega_get_lead_meta_box( $meta_boxes ) {
	$prefix = 'wiocc-';

	$meta_boxes[] = array(
		'id' => 'images',
		'title' => esc_html__( 'Inner Page Details', 'mega' ),
		'post_types' => array( 'lead' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix . 'first_name',
				'type' => 'text',
				'name' => esc_html__( 'First Name', 'mega' ),
			),
			array(
				'id' => $prefix . 'last_name',
				'type' => 'text',
				'name' => esc_html__( 'Last Name', 'mega' ),
			),
			array(
				'id' => $prefix . 'email',
				'type' => 'text',
				'name' => esc_html__( 'Email', 'mega' ),

			),
			array(
				'id' => $prefix . 'phone',
				'type' => 'text',
				'name' => esc_html__( 'Phone', 'mega' ),

			),


		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'mega_get_lead_meta_box' );
