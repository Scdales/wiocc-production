<?php
add_action( 'admin_menu', 'wiocc_add_admin_menu' );
add_action( 'admin_init', 'wiocc_settings_init' );


function wiocc_add_admin_menu(  ) {

	add_options_page( 'Wiocc Theme Settings', 'Wiocc Theme', 'manage_options', 'mam', 'wiocc_options_page' );

}


function wiocc_settings_init(  ) {

	register_setting( 'pluginPage', 'wiocc_settings' );

	add_settings_section(
		'wiocc_pluginPage_section',
		__( 'Top Header Options', 'wordpress' ),
		'wiocc_settings_section_callback',
		'pluginPage'
	);

	add_settings_section(
		'wiocc_eventPage_section',
		__( 'Event Page Options', 'wordpress' ),
		'wiocc_settings_event_section_callback',
		'pluginPage'
	);


	//social media
	add_settings_field(
		'wiocc_text_linkedin',
		__( 'Linkedin', 'wordpress' ),
		'wiocc_text_linkedin_render',
		'pluginPage',
		'wiocc_pluginPage_section'
	);
	add_settings_field(
		'wiocc_text_pinterest',
		__( 'Pinterest', 'wordpress' ),
		'wiocc_text_pinterest_render',
		'pluginPage',
		'wiocc_pluginPage_section'
	);

	add_settings_field(
		'wiocc_text_instagram',
		__( 'Instagram', 'wordpress' ),
		'wiocc_text_instagram_render',
		'pluginPage',
		'wiocc_pluginPage_section'
	);
	add_settings_field(
		'wiocc_text_twitter',
		__( 'Twitter', 'wordpress' ),
		'wiocc_text_twitter_render',
		'pluginPage',
		'wiocc_pluginPage_section'
	);
	add_settings_field(
		'wiocc_text_facebook',
		__( 'Facebook', 'wordpress' ),
		'wiocc_text_facebook_render',
		'pluginPage',
		'wiocc_pluginPage_section'
	);
	add_settings_field(
		'wiocc_text_contact_email',
		__( 'Contact Email', 'wordpress' ),
		'wiocc_text_contact_email_render',
		'pluginPage',
		'wiocc_pluginPage_section'
	);
	/** Events Page */
	add_settings_field(
		'wiocc_text_events_page_title',
		__( 'Events page Title', 'wordpress' ),
		'wiocc_text_events_page_title_render',
		'pluginPage',
		'wiocc_eventPage_section'
	);
	add_settings_field(
		'wiocc_text_events_page_header',
		__( 'Events page Header', 'wordpress' ),
		'wiocc_text_events_page_header_render',
		'pluginPage',
		'wiocc_eventPage_section'
	);
	add_settings_field(
		'wiocc_text_events_page_footer',
		__( 'Events page Footer', 'wordpress' ),
		'wiocc_text_events_page_footer_render',
		'pluginPage',
		'wiocc_eventPage_section'
	);

}


function wiocc_text_linkedin_render(  ) {
	$options = get_option( 'wiocc_settings' );?>
	<input type='text' name='wiocc_settings[wiocc_text_linkedin]' value='<?php echo $options['wiocc_text_linkedin']; ?>'>
	<?php
}

function wiocc_text_pinterest_render(  ) {
	$options = get_option( 'wiocc_settings' );?>
	<input type='text' name='wiocc_settings[wiocc_text_pinterest]' value='<?php echo $options['wiocc_text_pinterest']; ?>'>
	<?php
}
function wiocc_text_instagram_render(  ) {
	$options = get_option( 'wiocc_settings' );?>
	<input type='text' name='wiocc_settings[wiocc_text_instagram]' value='<?php echo $options['wiocc_text_instagram']; ?>'>
	<?php
}

function wiocc_text_contact_email_render(  ) {
	$options = get_option( 'wiocc_settings' );?>
	<input type='text' name='wiocc_settings[wiocc_text_contact_email]' value='<?php echo $options['wiocc_text_contact_email']; ?>'>
	<?php
}
function wiocc_text_twitter_render(  ) {
	$options = get_option( 'wiocc_settings' );?>
	<input type='text' name='wiocc_settings[wiocc_text_twitter]' value='<?php echo $options['wiocc_text_twitter']; ?>'>
	<?php
}
function wiocc_text_facebook_render(  ) {
	$options = get_option( 'wiocc_settings' );?>
	<input type='text' name='wiocc_settings[wiocc_text_facebook]' value='<?php echo $options['wiocc_text_facebook']; ?>'>
	<?php
}
/* events page*/
function wiocc_text_events_page_title_render(  ) {
	$options = get_option( 'wiocc_settings' );?>
	<input type='text' name='wiocc_settings[wiocc_text_events_page_title]' value='<?php echo $options['wiocc_text_events_page_title']; ?>'>
	<?php
}

function wiocc_text_events_page_header_render(  ) {
	$options = get_option( 'wiocc_settings' );?>
	<textarea name='wiocc_settings[wiocc_text_events_page_header]'><?php echo $options['wiocc_text_events_page_header']; ?></textarea>
	<?php
}
function wiocc_text_events_page_footer_render(  ) {
	$options = get_option( 'wiocc_settings' );?>
	<textarea name='wiocc_settings[wiocc_text_events_page_footer]'><?php echo $options['wiocc_text_events_page_footer']; ?></textarea>
	<?php
}


function wiocc_options_page(  ) {

	?>
	<form action='options.php' method='post'>

		<h2>Site Wide Configurations</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );

		submit_button();
		?>

	</form>
	<?php

}
function wiocc_get_pages_meta_box( $meta_boxes ) {
	$prefix = 'wiocc-';

	/** gallery */
	$meta_boxes[] = array(
		'id' => 'page_details',
		'title' => esc_html__( 'Page Details', 'wiocc' ),
		'post_types' => array( 'page', 'career' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => true,
		'fields' => array(
			array(
				'id' => $prefix . 'content_header',
				'type' => 'text',
				'name' => esc_html__( 'Content Header', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'banner_image',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Banner Image', 'wiocc' ),
				'desc' => esc_html__( 'Image shown on top of the page', 'wiocc' ),
				'max_file_uploads' => '1',
			),
			array(
				'id' => $prefix . 'image_2',
				'type' => 'image_advanced',
				'name' => esc_html__( 'Image 2', 'wiocc' ),
				'desc' => esc_html__( 'Second Image', 'wiocc' ),
				'max_file_uploads' => '1',
			),
		),
	);
	$meta_boxes[] = array(
		'id' => 'page_blocks',
		'title' => esc_html__( 'Other Details', 'wiocc' ),
		'post_types' => array( 'page' ),
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
                'id' => $prefix . 'block_1_icon_class',
                'type' => 'text',
                'name' => esc_html__( 'Block 1 Icon class', 'wiocc' ),
            ),
			array(
				'id' => $prefix . 'block_1_content',
				'name' => esc_html__( 'Block 1 Content', 'wiocc' ),
				'type' => 'wysiwyg',
			),
			array(
				'id' => $prefix . 'block_2_heading',
				'type' => 'text',
				'name' => esc_html__( 'Block 2 Heading', 'wiocc' ),
			),
            array(
                'id' => $prefix . 'block_2_icon_class',
                'type' => 'text',
                'name' => esc_html__( 'Block 2 Icon class', 'wiocc' ),
            ),
			array(
				'id' => $prefix . 'block_2_content',
				'name' => esc_html__( 'Block 2 Content', 'wiocc' ),
				'type' => 'wysiwyg',
			),

            array(
                'id'               => $prefix.'file',
                'name'             => 'File upload',
                'type'             => 'file_upload',
                'force_delete'     => false,
                'max_file_uploads' => 2,
                'max_status'       => 'false',
            ),
			array(
				'id' => $prefix . 'block_3_heading',
				'type' => 'text',
				'name' => esc_html__( 'Block 3 Heading', 'wiocc' ),
			),
            array(
                'id' => $prefix . 'block_3_icon_class',
                'type' => 'text',
                'name' => esc_html__( 'Block 3 Icon class', 'wiocc' ),
            ),
			array(
				'id' => $prefix . 'block_3_content',
				'name' => esc_html__( 'Block 3 Content', 'wiocc' ),
				'type' => 'wysiwyg',
			),
			array(
				'id' => $prefix . 'block_4_heading',
				'type' => 'text',
				'name' => esc_html__( 'Block 4 Heading', 'wiocc' ),
			),
			array(
				'id' => $prefix . 'block_4_content',
				'name' => esc_html__( 'Block 4 Content', 'wiocc' ),
				'type' => 'wysiwyg',
			),
			array(
				'id' => $prefix . 'cta',
				'type' => 'post',
				'name' => esc_html__( 'Post', 'wiocc' ),
				'post_type' => 'page',
				'field_type' => 'select_tree',
			),
            array(
                'id' => $prefix . 'linked_post_url',
                'type' => 'text',
                'name' => esc_html__( 'linked_post_url', 'wiocc' ),
            ),

			array(
				'id' => $prefix . 'cta_title',
				'type' => 'text',
				'name' => esc_html__( 'CTA Title', 'wiocc' ),
			),

		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'wiocc_get_pages_meta_box' );
//Home Banner image size
add_image_size('home_banner', 1920, 1135);

?>
