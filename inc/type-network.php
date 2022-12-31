<?php
/**
 * Created by PhpStorm.
 * User: komu
 * Date: 7/16/18
 * Time: 10:19 PM
 */
function custom_post_type_Network() {

	$labels = array(
		'name'                  => _x( 'Networks', 'Post Type General Name', 'wiocc' ),
		'singular_name'         => _x( 'Network', 'Post Type Singular Name', 'wiocc' ),
		'menu_name'             => __( 'Networks', 'wiocc' ),
		'name_admin_bar'        => __( 'Network', 'wiocc' ),
		'archives'              => __( 'Network Archives', 'wiocc' ),
		'attributes'            => __( 'Network Attributes', 'wiocc' ),
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
		'label'                 => __( 'Network', 'wiocc' ),
		'description'           => __( 'Network Description', 'wiocc' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-networking',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Network', $args );

}
add_action( 'init', 'custom_post_type_Network', 0 );

add_image_size('Network', 401, 208);
add_post_type_support( 'Network', 'excerpt' );

function wiocc_get_Network_meta_box( $meta_boxes ) {
	$prefix = 'wiocc-';
	/** Post */
	$meta_boxes[] = array(
		'id' => 'network',
		'title' => esc_html__( 'Heading', 'wiocc' ),
		'post_types' => array( 'Network' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix . 'home_excerpt',
				'type' => 'textarea',
				'name' => esc_html__( 'Homepage Excerpt', 'wiocc' ),
			),

			array(
				'id' => $prefix . 'home_icon',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Homepage Icon', 'wiocc' ),
				'desc' => esc_html__( 'Iconography', 'wiocc' ),
				'max_file_uploads' => '1',
			),
		),
	);
	$meta_boxes[] = array(
		'id' => 'cta',
		'title' => esc_html__( 'Heading', 'wiocc' ),
		'post_types' => array( 'Network' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix . 'cat_link',
				'type' => 'text',
				'name' => esc_html__( 'CTA Link', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'cta_caption',
				'type' => 'text',
				'name' => esc_html__( 'CTA Caption', 'wiocc' ),
			),
            array(
                'id' => $prefix . 'cta_network_icon',
                'type' => 'text',
                'name' => esc_html__( 'CTA network icon class', 'wiocc' ),
            ),
			array(
				'id' => $prefix . 'banner_image',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Banner Image', 'wiocc' ),
				'desc' => esc_html__( 'Image shown on top of the page', 'wiocc' ),
				'max_file_uploads' => '1',
			),

		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'wiocc_get_Network_meta_box' );
