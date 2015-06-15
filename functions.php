<?php

add_action('wp_enqueue_scripts', 'load_css');
add_action('wp_enqueue_scripts', 'load_js');
add_action('init', 'add_custom_post_types');
add_action('get_header', 'remove_admin_bar_margin');
add_action('admin_menu', 'remove_stuff_from_admin_page');

function remove_admin_bar_margin() {
    remove_action('wp_head', '_admin_bar_bump_cb'); // from left
}

function remove_stuff_from_admin_page() {
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page('edit.php');
}

function add_custom_post_types() {

    /*register_post_type('homepage_section', [
        'labels' => [
            'name' => 'Homepage Sections',
            'singular_name' => 'Homepage Section',
        ],
        'description' => 'These bits of content will appear on the homepage',
        'public' => true,
        'menu_position' => 5,
        'supports' => ['title', 'editor']
    ]);*/

    register_post_type('member', [
        'labels' => [
            'name' => 'Staff & Board Members',
            'singular_name' => 'Member',
        ],
        'description' => 'This is a person whose biography will appear on the website, for both board members and staff',
        'public' => true,
        'menu_position' => 20,
        'supports' => ['title', 'editor', 'thumbnail']
    ]);

    register_post_type('project', [
        'labels' => [
            'name' => 'Projects',
            'singular_name' => 'Project',
        ],
        'description' => 'A project to which the GCF has contributed',
        'public' => true,
        'menu_position' => 21,
        'supports' => ['title', 'editor']
    ]);
}

if ( ! function_exists( 'gcf_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gcf_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on GCF Theme, use a find and replace
	 * to change 'gcf' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'gcf', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	//add_theme_support( 'automatic-feed-links' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'gcf' ),
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'gcf_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // gcf_setup
add_action( 'after_setup_theme', 'gcf_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gcf_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gcf_content_width', 640 );
}
add_action( 'after_setup_theme', 'gcf_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function gcf_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gcf' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'gcf_widgets_init' );

function load_css() {
    wp_enqueue_style('main', get_template_directory_uri().'/css/main.css');
    wp_enqueue_style('animate', get_template_directory_uri().'/css/animate.css');
    wp_enqueue_style('content', get_template_directory_uri().'/css/content.css');
    wp_enqueue_style('sidebar', get_template_directory_uri().'/css/sidebar.css');
    wp_enqueue_style('accents', get_template_directory_uri().'/css/accents.css');
}

function load_js() {
    wp_enqueue_script('accent-switcher', get_template_directory_uri().'/js/accent-switcher.js', ['jquery']);
    wp_enqueue_script('load-animations', get_template_directory_uri().'/js/load-animations.js', ['jquery', 'wait-for-images']);
	wp_enqueue_script('hover-background-switcher', get_template_directory_uri().'/js/hover-background-switcher.js', ['jquery']);
    wp_enqueue_script('wait-for-images', get_template_directory_uri().'/bower_components/waitForImages/dist/jquery.waitforimages.min.js', ['jquery']);
}

function root() {
    echo get_template_directory_uri() . '/';
}
