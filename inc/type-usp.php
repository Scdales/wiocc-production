<?php
/**
 * Created by PhpStorm.
 * User: komu
 * Date: 7/16/18
 * Time: 10:19 PM
 */
function custom_post_type_Usp() {

	$labels = array(
		'name'                  => _x( 'Usps', 'Post Type General Name', 'wiocc' ),
		'singular_name'         => _x( 'Usp', 'Post Type Singular Name', 'wiocc' ),
		'menu_name'             => __( 'Usps', 'wiocc' ),
		'name_admin_bar'        => __( 'Usp', 'wiocc' ),
		'archives'              => __( 'Usp Archives', 'wiocc' ),
		'attributes'            => __( 'Usp Attributes', 'wiocc' ),
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
		'label'                 => __( 'Usp', 'wiocc' ),
		'description'           => __( 'Usp Description', 'wiocc' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-money',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'usp', $args );

}
add_action( 'init', 'custom_post_type_Usp', 0 );

add_image_size('usp', 401, 208);
add_post_type_support( 'usp', 'excerpt' );

function wiocc_get_Usp_meta_box( $meta_boxes ) {
	$prefix = 'wiocc-';
	/** Post */
	$meta_boxes[] = array(
		'id' => 'Usp',
		'title' => esc_html__( 'Heading', 'wiocc' ),
		'post_types' => array( 'Usp' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix . 'heading_part2',
				'type' => 'textarea',
				'name' => esc_html__( 'Heading 2 Label', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'cta_label',
				'type' => 'text',
				'name' => esc_html__( 'CTA Label', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'cta_font_icon_class',
				'type' => 'text',
				'name' => esc_html__( 'Font Icon Class', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'usp_ico',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Usp Icon', 'mega' ),
				'desc' => esc_html__( 'Iconography', 'mega' ),
				'max_file_uploads' => '1',
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'wiocc_get_Usp_meta_box' );
