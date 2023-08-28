<?php
if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}
define('THEME_URI', get_template_directory_uri());
define('MBAIO_DIR', get_template_directory() . '/core/extensions/meta-box/');
define('MBAIO_URL', get_template_directory_uri() . '/core/extensions/meta-box/');
require_once MBAIO_DIR . 'meta-box.php';
require_once MBAIO_DIR . 'extensions/mb-settings-page/mb-settings-page.php';
require_once MBAIO_DIR . 'extensions/meta-box-group/meta-box-group.php';
require_once MBAIO_DIR . 'extensions/mb-term-meta/mb-term-meta.php';
require_once MBAIO_DIR . 'extensions/meta-box-tabs/meta-box-tabs.php';
require_once MBAIO_DIR . 'extensions/mb-user-meta/mb-user-meta.php';

require_once get_template_directory() . '/core/extensions/bootstrap-4-nav-walker/init.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wiki_nhakhoa_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wiki_nhakhoa, use a find and replace
		* to change 'wiki_nhakhoa' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('wiki_nhakhoa', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(array(
		'primary-menu' => esc_html__('Primary Menu', 'wiki_nhakhoa'),
		'footer-about-menu' => esc_html__('Footer About Menu', 'wiki_nhakhoa'),
		'footer-policy-menu' => esc_html__('Footer Policy Menu', 'wiki_nhakhoa'),
		'footer-cate-menu' => esc_html__('Footer Category Menu', 'wiki_nhakhoa'),
	));

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
			'wiki_nhakhoa_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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
add_action('after_setup_theme', 'wiki_nhakhoa_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wiki_nhakhoa_content_width()
{
	$GLOBALS['content_width'] = apply_filters('wiki_nhakhoa_content_width', 640);
}
add_action('after_setup_theme', 'wiki_nhakhoa_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wiki_nhakhoa_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'wiki_nhakhoa'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'wiki_nhakhoa'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'wiki_nhakhoa_widgets_init');
/**
 * Include jQuery
 */
function wb_include_jquery()
{
	if (!is_admin()) {
		wp_deregister_script('jquery-core');
		// wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery.min.js', array(), null, true);
		wp_enqueue_script('jquery-min', get_template_directory_uri() . '/assets/jquery.min.js', array(), '221414', true);
	}
}
add_action('wp_enqueue_scripts', 'wb_include_jquery');
/**
 * Enqueue scripts and styles.
 */
function wiki_nhakhoa_scripts()
{
	wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/assets/jquery-ui-1.12.1/jquery-ui.css');
	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/slick-1.6.0/slick.css');
	wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/slick-1.6.0/slick-theme.css');
	wp_enqueue_style('bootraps-ui', get_template_directory_uri() . '/assets/bootstrap-4.5.0-dist/css/bootstrap.min.css');
	wp_enqueue_style('awesome-ui', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style('main', get_template_directory_uri() . '/css/styles.min.css?s');

	wp_enqueue_style('wiki_nhakhoa-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('wiki_nhakhoa-style', 'rtl', 'replace');

	if (!is_admin()) {
		// wp_enqueue_script('jquery-min', get_template_directory_uri() . '/assets/jquery.min.js', array(), '221414', true);
		wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/assets/jquery-ui-1.12.1/jquery-ui.min.js', array(), '221217', true);
		wp_enqueue_script('slick', get_template_directory_uri() . '/assets/slick-1.6.0/slick.min.js', array('jquery-min'), '20151215', true);
		wp_enqueue_script('bootraps-js', get_template_directory_uri() . '/assets/bootstrap-4.5.0-dist/js/bootstrap.min.js', array('jquery-min'), '221218', true);

		wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery-min'), '20151215', true);
		wp_localize_script('main', 'vmajax', array('ajaxurl' => admin_url('admin-ajax.php')));
		wp_localize_script('main', 'wikipost', array('posttype' => get_post_type()));
	}
	wp_enqueue_script('wiki_nhakhoa-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'wiki_nhakhoa_scripts');
/**
 * ẩn editor
 */
function hide_editor()
{
	// Thay thế 'post_type' bằng tên của post type mà bạn muốn ẩn trình soạn thảo
	$post_type = array('doctor', 'brand', 'table_price');
	foreach ($post_type as $key => $value) {
		remove_post_type_support($value, 'editor');
	}
}
add_action('init', 'hide_editor');
/**
 * Module Mega Menu
 */
require_once get_template_directory() . '/core/modules/mega-menu/mega-menu-walker.php';


require_once get_template_directory() . '/core/theme-helpers.php';
/**
 * Module location
 */
require_once get_template_directory() . '/core/modules/get-location/init.php';
/**
 * Module theme options
 */
require_once get_template_directory() . '/core/modules/theme-options/init.php';
/**
 * Module Post Type
 */
require_once get_template_directory() . '/core/modules/post-type/doctor/init.php';

require_once get_template_directory() . '/core/modules/post-type/brand/init.php';

require_once get_template_directory() . '/core/modules/post-type/status/init.php';

require_once get_template_directory() . '/core/modules/post-type/service/init.php';

require_once get_template_directory() . '/core/modules/post-type/price/init.php';

require_once get_template_directory() . '/core/modules/post-type/toplist/init.php';

/**
 * Module user
 */
require_once get_template_directory() . '/core/modules/users-profile/users-profile.php';
/**
 * Module comment
 */
require_once get_template_directory() . '/core/modules/comment/init.php';
require_once get_template_directory() . '/core/modules/comment/comment-ratting.php';
/**
 * Module archive page
 */
require_once get_template_directory() . '/core/modules/archive-page/init.php';

add_action('save_post', 'wiki_set_total_ratting_post');
if (!function_exists('wiki_set_total_ratting_post')) {
	function wiki_set_total_ratting_post($post_id)
	{
		$post_type = get_post_type($post_id);
		if ($post_type == 'doctor' || $post_type == 'brand') {
			$total_ratting_comment = get_post_meta($post_id, 'total-ratting-post', true) ? get_post_meta($post_id, 'total-ratting-post', true) : 0;
			if (!$total_ratting_comment) {
				update_post_meta($post_id, 'total-ratting-post', 0);
			}
			caculate_total_post($post_type, $post_id);
		}
	}
}

function add_noindex_to_terms()
{
	if (is_tax('service_cat')) {
		echo '<meta name="robots" content="noindex,follow">';
	}
}
add_action('wp_head', 'add_noindex_to_terms');
