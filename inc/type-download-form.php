<?php
/**
 * Created by PhpStorm.
 * User: Kelvin
 * Date: 25/09/2018
 * Time: 14:10
 */
function custom_post_type_download_form() {

    $labels = array(
        'name'                  => _x( 'Download Form', 'Post Type General Name', 'wiocc' ),
        'singular_name'         => _x( 'Download Form', 'Post Type Singular Name', 'wiocc' ),
        'menu_name'             => __( 'Download form', 'wiocc' ),
        'name_admin_bar'        => __( 'Download Form', 'wiocc' ),
        'archives'              => __( 'Download Form Archives', 'wiocc' ),
        'attributes'            => __( 'Download Form Attributes', 'wiocc' ),
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
        'label'                 => __( 'Download Form', 'wiocc' ),
        'description'           => __( 'Download Form Description', 'wiocc' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-format-aside',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'download-form', $args );

}
add_action( 'init', 'custom_post_type_download_form', 0 );

function mega_get_download_form_meta_box( $meta_boxes ) {
    $prefix = 'wiocc-';

    $meta_boxes[] = array(
        'id' => 'details',
        'title' => esc_html__( 'Personal information', 'wiocc' ),
        'post_types' => array( 'download-form' ),
        'context' => 'advanced',
        'priority' => 'default',
        'autosave' => true,
        'fields' => array(
            array(
                'id' => $prefix . 'first_name',
                'type' => 'text',
                'name' => esc_html__( 'First Name', 'wiocc' ),
            ),
            array(
                'id' => $prefix . 'last_name',
                'type' => 'text',
                'name' => esc_html__( 'Last Name', 'wiocc' ),
            ),
            array(
                'id' => $prefix . 'email',
                'type' => 'text',
                'name' => esc_html__( 'Email', 'wiocc' ),

            ),
            array(
                'name'            => 'Industry',
                'id'              => 'industry',
                'type'            => 'select',
                'options'         => array(
                    'industry'       => 'Industry',
                    'IT' => 'IT',
                    'marketing'        => 'Marketing',
                ),
                'multiple'        => true,
                'placeholder'     => 'Select an Item',

            ),


        ),
    );

    return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'mega_get_download_form_meta_box' );
