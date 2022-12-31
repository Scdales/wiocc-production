<?php
/**
 * Created by PhpStorm.
 * User: komu
 * Date: 7/16/18
 * Time: 10:19 PM
 */
function custom_post_type_Location() {

	$labels = array(
		'name'                  => _x( 'Locations', 'Post Type General Name', 'wiocc' ),
		'singular_name'         => _x( 'Location', 'Post Type Singular Name', 'wiocc' ),
		'menu_name'             => __( 'Locations', 'wiocc' ),
		'name_admin_bar'        => __( 'Location', 'wiocc' ),
		'archives'              => __( 'Location Archives', 'wiocc' ),
		'attributes'            => __( 'Location Attributes', 'wiocc' ),
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
		'label'                 => __( 'Location', 'wiocc' ),
		'description'           => __( 'Location Description', 'wiocc' ),
		'labels'                => $labels,
		'supports'              => array( 'title', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-location-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'location', $args );

}
add_action( 'init', 'custom_post_type_Location', 0 );

add_image_size('location', 401, 208);
add_post_type_support( 'location', 'excerpt' );

function wiocc_get_Location_meta_box( $meta_boxes ) {
	$prefix = 'wiocc-';
	/** Post */
	$meta_boxes[] = array(
		'id' => 'Location',
		'title' => esc_html__( 'Heading', 'wiocc' ),
		'post_types' => array( 'Location' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix . 'address_1',
				'type' => 'text',
				'name' => esc_html__( 'Address 1', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'address_2',
				'type' => 'text',
				'name' => esc_html__( 'Address 2', 'wiocc' ),
			),
            array(
                'id' => $prefix . 'address_3',
                'type' => 'text',
                'name' => esc_html__( 'Address 3', 'wiocc' ),
            ),
			array(
				'id' => $prefix . 'email',
				'type' => 'text',
				'name' => esc_html__( 'Email', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'map',
				'type' => 'text',
				'name' => esc_html__( 'Map', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'telephone',
				'type' => 'textarea',
				'name' => esc_html__( 'Telephone', 'wiocc' ),
			),
            array(
                'id' => $prefix . 'fax',
                'type' => 'textarea',
                'name' => esc_html__( 'Fax', 'wiocc' ),
            ),

		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'wiocc_get_Location_meta_box' );
