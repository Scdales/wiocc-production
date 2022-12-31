<?php
/**
 * Created by PhpStorm.
 * User: komu
 * Date: 7/16/18
 * Time: 10:19 PM
 */
function custom_post_type_client() {

	$labels = array(
		'name'                  => _x( 'Clients', 'Post Type General Name', 'wiocc' ),
		'singular_name'         => _x( 'Client', 'Post Type Singular Name', 'wiocc' ),
		'menu_name'             => __( 'Clients', 'wiocc' ),
		'name_admin_bar'        => __( 'Client', 'wiocc' ),
		'archives'              => __( 'Client Archives', 'wiocc' ),
		'attributes'            => __( 'Client Attributes', 'wiocc' ),
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
		'label'                 => __( 'Client', 'wiocc' ),
		'description'           => __( 'Client Description', 'wiocc' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'client', $args );

}
add_action( 'init', 'custom_post_type_client', 0 );

add_image_size('client', 200, 200);
add_post_type_support( 'client', 'excerpt' );

function wiocc_get_client_meta_box( $meta_boxes ) {
	$prefix = 'wiocc-';
	/** Post */
	$meta_boxes[] = array(
		'id' => 'Client',
		'title' => esc_html__( 'Heading', 'wiocc' ),
		'post_types' => array( 'Client' ),
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
				'id' => $prefix . 'text_color',
				'type' => 'text',
				'name' => esc_html__( 'Text Color', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'background_color',
				'type' => 'text',
				'name' => esc_html__( 'Background Color', 'wiocc' ),
			),
            array(
                'id' => $prefix . 'cta_font_icon_class',
                'type' => 'text',
                'name' => esc_html__( 'Font Icon Class', 'wiocc' ),
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
add_filter( 'rwmb_meta_boxes', 'wiocc_get_Client_meta_box' );
