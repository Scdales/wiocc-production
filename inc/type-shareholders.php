<?php
function custom_post_type_shareholders() {

$labels = array(
'name'                  => _x( 'shareholders', 'Post Type General Name', 'wiocc' ),
'singular_name'         => _x( 'shareholders', 'Post Type Singular Name', 'wiocc' ),
'menu_name'             => __( 'shareholders', 'wiocc' ),
'name_admin_bar'        => __( 'shareholders', 'wiocc' ),
'archives'              => __( 'shareholders Archives', 'wiocc' ),
'attributes'            => __( 'shareholders Attributes', 'wiocc' ),
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
$rewrite = array(
'slug'                  => 'shareholders',
'with_front'            => true,
'pages'                 => true,
'feeds'                 => true,
);
$args = array(
'label'                 => __( 'shareholders', 'wiocc' ),
'description'           => __( 'shareholders Description', 'wiocc' ),
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
'rewrite'               => $rewrite,
'publicly_queryable'    => true,
'capability_type'       => 'page',
);
register_post_type( 'shareholders', $args );

}
add_action( 'init', 'custom_post_type_shareholders', 0 );

?>