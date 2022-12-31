<?php
/**
 * Wiocc Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wiocc_Theme
 */

if ( ! function_exists( 'wiocc_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wiocc_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Wiocc Theme, use a find and replace
		 * to change 'wiocc' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wiocc', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wiocc' ),
			'header-meta' => esc_html__( 'Header Meta', 'wiocc' ),
            'menu-2' => esc_html__( 'Secondary', 'wiocc' ),

			'footer-1' => esc_html__( 'Footer 1', 'wiocc' ),
			'footer-2' => esc_html__( 'Footer 2', 'wiocc' ),
			'footer-3' => esc_html__( 'Footer 3', 'wiocc' ),
			'footer-4' => esc_html__( 'Footer 4', 'wiocc' ),
            'sitemap-1' => esc_html__( 'sitemap 1', 'wiocc' ),
            'sitemap-2' => esc_html__( 'sitemap 2', 'wiocc' ),
            'sitemap-3' => esc_html__( 'sitemap 3', 'wiocc' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wiocc_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wiocc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wiocc_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wiocc_content_width', 640 );
}
add_action( 'after_setup_theme', 'wiocc_content_width', 0 );

//add_action( 'template_redirect', 'wpb_change_search_url' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wiocc_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wiocc' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wiocc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Main Menu switcher', 'wiocc' ),
		'id'            => 'main-menu-lang-switcher',
		'description'   => esc_html__( 'Add widgets here.', 'wiocc' ),
		'before_widget' => '<div id="%1$s" class="language-select %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
    register_sidebar( array(
        'name'          => esc_html__( 'Mobile Menu switcher', 'wiocc' ),
        'id'            => 'mobile-menu-lang-switcher',
        'description'   => esc_html__( 'Add widgets here.', 'wiocc' ),
        'before_widget' => '<div id="%1$s" class="language-select %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
	register_sidebar( array(
		'name'          => esc_html__( 'Newsletter', 'wiocc' ),
		'id'            => 'newsletter',
		'description'   => esc_html__( 'Add Newsletter Form here.', 'wiocc' ),
		'before_widget' => '<div id="%1$s" class="language-select-2 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Search Sidebar', 'wiocc' ),
		'id'            => 'search-result',
		'description'   => esc_html__( 'Add Navi.', 'wiocc' ),
		'before_widget' => '<div id="%1$s" class="search-results-right %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'wiocc_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function wiocc_scripts() {

	// comment out the next two lines to load the local copy of jQuery
	if (!is_admin()) {
		wp_deregister_script( 'jquery' );
// 		wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', false, '3.2.1', true );
        wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.5.1.min.js', false, '3.5.1', true );
	}


	wp_register_script( 'fontsmoothie', get_template_directory_uri() . '/js/fontsmoothie.min.js', array(  ), 1.0, true );
	wp_register_script( 'jquery_matchHeight', get_template_directory_uri() . '/js/jquery.matchheight.min.js', array(  ), 1.0, true );
	wp_register_script( 'jquery_validate', get_template_directory_uri() . '/js/jquery.validate.js', array(), 1.0, true );
	wp_register_script( 'jquery_bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array(  ), 1.0, true );
	wp_register_script( 'wiocc_main', get_template_directory_uri() . '/js/main.js', array(  ), 1.0, true );
	wp_register_script( 'app', get_template_directory_uri() . '/js/app.js', array(  ), 1.0, true );
    wp_register_script( 'magnify', get_template_directory_uri() . '/js/magnify.js', array(  ), 1.0, true );
    wp_register_script( 'overlaps', get_template_directory_uri() . '/js/overlaps.js', array(  ), 1.0, true );
    wp_register_script('slick.min', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.0.0', true);

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'fontsmoothie' );
	wp_enqueue_script( 'jquery_matchHeight' );
	wp_enqueue_script( 'jquery_validate' );
	wp_enqueue_script( 'jquery_bxslider' );
	wp_enqueue_script( 'wiocc_main' );
	wp_enqueue_script( 'app' );
    wp_enqueue_script( 'magnify' );
    wp_enqueue_script( 'overlaps' );

	//wp_enqueue_style( 'wiocc-style', get_stylesheet_uri() );


}
add_action( 'wp_enqueue_scripts', 'wiocc_scripts' );

function send_smtp_email( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = SMTP_HOST;
    $phpmailer->SMTPAuth   = SMTP_AUTH;
    $phpmailer->Port       = SMTP_PORT;
    $phpmailer->Username   = SMTP_USERNAME;
    $phpmailer->Password   = SMTP_PASSWORD;
    $phpmailer->From       = SMTP_FROM;
    $phpmailer->FromName   = SMTP_FROMNAME;
}

add_action( 'phpmailer_init', 'send_smtp_email' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/trans.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/ajax.php';
/** Custom post types */
require get_template_directory() . '/inc/type-home-banner.php';
require get_template_directory() . '/inc/type-highlight.php';
require get_template_directory() . '/inc/type-lead.php';
require get_template_directory() . '/inc/type-usp.php';
require get_template_directory() . '/inc/type-network.php';
require get_template_directory() . '/inc/type-network-page.php';
require get_template_directory() . '/inc/type-news.php';
require get_template_directory() . '/inc/type-event.php';
require get_template_directory() . '/inc/type-testimonial.php';
require get_template_directory() . '/inc/type-director.php';
require get_template_directory() . '/inc/type-location.php';
require get_template_directory() . '/inc/type-faq.php';
require get_template_directory() . '/inc/type-about.php';
require get_template_directory() . '/inc/type-career.php';
require get_template_directory() . '/inc/type-solution.php';
require get_template_directory() . '/inc/type-client.php';
require get_template_directory() . '/inc/type-faq-category.php';
require get_template_directory() . '/inc/type-download-form.php';
require get_template_directory() . '/inc/type-career-intro.php';
require get_template_directory() . '/inc/type-executive.php';


/** Walker */
//require get_template_directory() . '/Komu_Walker_Nav.php';
require get_template_directory() . '/Wiocc_Mobile_Walker_Nav.php';
require get_template_directory() . '/Wiocc_Walker_Nav.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function get_meta_image($images){
	//print_r($images);
	$full_url='';
	foreach ( $images as $image ) {
		$full_url=$image['full_url'];

	}
	echo  $full_url;

}

function get_career_class($postID,$taxonomy){
	$specialization_terms = wp_get_post_terms(get_the_ID(),'specialization' );
	$class='';
	foreach ($specialization_terms as $specialization_term){
		$class.='term_'.$specialization_term->term_id.' ';

	}
	echo $class;
}
// Remove WP Version From Styles
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
