<?php
/**
 * Created by PhpStorm.
 * User: komu
 * Date: 7/16/18
 * Time: 10:19 PM
 */
function custom_post_type_NetworkPage() {

	$labels = array(
		'name'                  => _x( 'NetworkPages', 'Post Type General Name', 'wiocc' ),
		'singular_name'         => _x( 'NetworkPage', 'Post Type Singular Name', 'wiocc' ),
		'menu_name'             => __( 'NetworkPages', 'wiocc' ),
		'name_admin_bar'        => __( 'NetworkPage', 'wiocc' ),
		'archives'              => __( 'NetworkPage Archives', 'wiocc' ),
		'attributes'            => __( 'NetworkPage Attributes', 'wiocc' ),
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
		'label'                 => __( 'NetworkPage', 'wiocc' ),
		'description'           => __( 'NetworkPage Description', 'wiocc' ),
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
	register_post_type( 'networkpage', $args );

}
add_action( 'init', 'custom_post_type_NetworkPage', 0 );

function wiocc_get_NetworkPage_meta_box( $meta_boxes ) {
	$prefix = 'wiocc-';
	/** Post */
	$meta_boxes[] = array(
		'id' => 'NetworkPage',
		'title' => esc_html__( 'Content Blocks', 'wiocc' ),
		'post_types' => array( 'NetworkPage' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(

			array(
				'id' => $prefix . 'block_1_heading',
				'type' => 'text',
				'name' => esc_html__( 'Block 1 Heading', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'block_1_content',
				'name' => esc_html__( 'Block 1 Content', 'wiocc' ),
				'type' => 'wysiwyg',
			),
			array(
				'id' => $prefix . 'block_1_cta',
				'type' => 'text',
				'name' => esc_html__( 'Block 1 CTA', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'block_1_cta_title',
				'type' => 'text',
				'name' => esc_html__( 'Block 1 CTA Title', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'block_2_heading',
				'type' => 'text',
				'name' => esc_html__( 'Block 2 Heading', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'block_2_content',
				'name' => esc_html__( 'Block 2 Content', 'wiocc' ),
				'type' => 'wysiwyg',
			),
			array(
				'id' => $prefix . 'block_2_cta',
				'type' => 'text',
				'name' => esc_html__( 'Block 2 CTA', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'block_2_cta_title',
				'type' => 'text',
				'name' => esc_html__( 'Block 2 CTA Title', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'block_3_heading',
				'type' => 'text',
				'name' => esc_html__( 'Block 3 Heading', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'block_3_content',
				'name' => esc_html__( 'Block 3 Content', 'wiocc' ),
				'type' => 'wysiwyg',
			),
			array(
				'id' => $prefix . 'block_3_cta',
				'type' => 'text',
				'name' => esc_html__( 'Block 3 CTA', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'block_3_cta_title',
				'type' => 'text',
				'name' => esc_html__( 'Block 3 CTA Title', 'wiocc' ),
			),
            array(
                'id' => $prefix . 'cta',
                'type' => 'post',
                'name' => esc_html__( 'Post', 'wiocc' ),
                'post_type' => 'post',
                'field_type' => 'select_advanced',
            ),

		),
	);
	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'wiocc_get_NetworkPage_meta_box' );
