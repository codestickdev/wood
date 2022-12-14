<?php
/**
 * Wood-zoo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wood-zoo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wood_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Wood-zoo, use a find and replace
		* to change 'wood' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wood', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wood' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wood_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'wood_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wood_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wood_content_width', 640 );
}
add_action( 'after_setup_theme', 'wood_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wood_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wood' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wood' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wood_widgets_init' );

/* ACF local JSON */
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

/**
 * Enqueue scripts and styles.
 */
function wood_scripts() {
	$version = '1.2';

	wp_enqueue_style( 'wood-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wood-style', 'rtl', 'replace' );

	// jQuery
	wp_register_script( 'wood-jquery', get_template_directory_uri() . '/plugins/jQuery/jquery-3.6.0.min.js', null, null, true );
	wp_enqueue_script('wood-jquery');

	// Lightbox
	wp_enqueue_style( 'lightbox-css', get_template_directory_uri() . '/plugins/lightbox/dist/css/lightbox.min.css', array(), $version );
	wp_register_script( 'lightbox-script', get_template_directory_uri() . '/plugins/lightbox/dist/js/lightbox.min.js', null, null, true );
	wp_enqueue_script('lightbox-script');

	// Slick
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/plugins/slick/slick-theme.css', array(), $version );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/plugins/slick/slick.css', array(), $version );
	wp_register_script( 'slick-script', get_template_directory_uri() . '/plugins/slick/slick.min.js', null, null, true );
	wp_enqueue_script('slick-script');

	// Custom styles
	wp_enqueue_style( 'wood-sass', get_template_directory_uri() . '/css/custom.css', array(), $version );

	// Custom scripts
	wp_enqueue_script( 'wood-scripts', get_template_directory_uri() . '/js/custom.js', array(), $version, true );
}
add_action( 'wp_enqueue_scripts', 'wood_scripts' );

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

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
 * Disable admin bar
 */
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Translations
 */
add_action('init', function() {
	pll_register_string('wood', 'Read more');
	pll_register_string('wood', 'About us');
	pll_register_string('wood', 'Products');
	pll_register_string('wood', 'If you fee interested in our offer we invite for contact');
	pll_register_string('wood', 'Production process');
	pll_register_string('wood', 'Contact');
	pll_register_string('wood', 'Let us stay in touch!');
});