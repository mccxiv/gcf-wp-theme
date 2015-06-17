<?php

register_footer_scripts();
add_action('wp_enqueue_scripts', 'load_css');
add_action('wp_enqueue_scripts', 'load_js');
add_action('init', 'add_custom_post_types');
add_action('get_header', 'remove_admin_bar_margin');
add_action('admin_menu', 'remove_stuff_from_admin_page');
add_action('after_setup_theme', 'gcf_setup');

function remove_admin_bar_margin() {
    remove_action('wp_head', '_admin_bar_bump_cb'); // from left
}

function remove_stuff_from_admin_page() {
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page('edit.php');
}

function add_custom_post_types() {
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

function gcf_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on GCF Theme, use a find and replace
	 * to change 'gcf' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'gcf', get_template_directory() . '/languages' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
}

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

function register_footer_scripts() {
    wp_register_script('slidr', get_template_directory_uri().'/bower_components/slidr/slidr.min.js', [], false, true);
    wp_register_script('slidr-init', get_template_directory_uri().'/js/slidr-init.js', ['jquery'], false, true);
}

function the_slider() {
    $haveImages = get_field('image-1');
    if ($haveImages) {
        echo '<div class="gallery" id="gallery">';
        for ($i = 1; $i < 6; $i++) {
            if (get_field('image-'.$i)) {
                echo '<div style="background-image: url('.get_field('image-'.$i).')" data-slidr="image-'.$i.'"></div>';
            }
        }
        echo '</div>';
        wp_enqueue_script('slidr');
        wp_enqueue_script('slidr-init');
    }
}

function root() {
    echo get_template_directory_uri() . '/';
}
