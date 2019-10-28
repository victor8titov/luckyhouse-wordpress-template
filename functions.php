<?php
/**
 * Lucky_House functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lucky_House
 */

if ( ! function_exists( 'luckyhouse_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function luckyhouse_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Lucky_House, use a find and replace
		 * to change 'luckyhouse' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'luckyhouse', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'luckyhouse' ),
			'custom_header_menu' => "Меню на главном развороте",
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
		add_theme_support( 'custom-background', apply_filters( 'luckyhouse_custom_background_args', array(
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
add_action( 'after_setup_theme', 'luckyhouse_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function luckyhouse_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'luckyhouse_content_width', 640 );
}
add_action( 'after_setup_theme', 'luckyhouse_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function luckyhouse_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'luckyhouse' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'luckyhouse' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'luckyhouse_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function luckyhouse_scripts() {
	/* style */
	wp_enqueue_style('main-style', get_template_directory_uri() . '/styles/main.css', array(), '?ver=1.0');

	/* javascript */
	// отменяем зарегистрированный jQuery
	wp_deregister_script('jquery-core');
	wp_deregister_script('jquery');

	// регистрируем
	wp_register_script( 'jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, null, true );
	wp_register_script( 'jquery', false, array('jquery-core'), null, true );

	// подключаем
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/lib/jquery-easing/jquery.easing.min.js',array('jquery'), true, true);

	wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/js/lib/bootstrap/bootstrap.bundle.min.js',array('jquery'), true, true);

	wp_enqueue_script('bootstrap-validation', get_template_directory_uri() . '/js/lib/jqBootstrapValidation.js',array('jquery'), true, true);

	wp_enqueue_script('slick', get_template_directory_uri() . '/js/lib/slick/slick.js',array('jquery'), true, true);

	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js',array('jquery'), true, true);

	wp_enqueue_script('contact-me', get_template_directory_uri() . '/js/contact_me.js',array('jquery'), true, true);



	wp_enqueue_style( 'luckyhouse-style', get_stylesheet_uri() );

	wp_enqueue_script( 'luckyhouse-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'luckyhouse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	//if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	//	wp_enqueue_script( 'comment-reply' );
	//}
}
add_action( 'wp_enqueue_scripts', 'luckyhouse_scripts' );

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

/* new image size */
add_image_size('lh_thumbnail', 400, 300, true);

/* 
	**********************************

	Clear head 

	*********************************
*/

// Удаляем код meta name="generator"
remove_action( 'wp_head', 'wp_generator' );
 
// Удаляем link rel="canonical" // Этот тег лучше выводить с помощью плагина Yoast SEO или All In One SEO Pack
remove_action( 'wp_head', 'rel_canonical' );
 
// Удаляем link rel="shortlink" - короткую ссылку на текущую страницу
remove_action( 'wp_head', 'wp_shortlink_wp_head' ); 
 
// Удаляем link rel="EditURI" type="application/rsd+xml" title="RSD"
// Используется для сервиса Really Simple Discovery 
remove_action( 'wp_head', 'rsd_link' ); 
 
// Удаляем link rel="wlwmanifest" type="application/wlwmanifest+xml"
// Используется Windows Live Writer
remove_action( 'wp_head', 'wlwmanifest_link' );
 
// Удаляем различные ссылки link rel
// на главную страницу
remove_action( 'wp_head', 'index_rel_link' ); 
// на первую запись
remove_action( 'wp_head', 'start_post_rel_link', 10 );  
// на предыдущую запись
remove_action( 'wp_head', 'parent_post_rel_link', 10 ); 
// на следующую запись
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10 );
 
// Удаляем связь с родительской записью
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 ); 
 
// Удаляем вывод /feed/
remove_action( 'wp_head', 'feed_links', 2 );
// Удаляем вывод /feed/ для записей, категорий, тегов и подобного
remove_action( 'wp_head', 'feed_links_extra', 3 );
 
// Удаляем ненужный css плагина WP-PageNavi
remove_action( 'wp_head', 'pagenavi_css' );

//	Отключаем Emoji
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2.2.1/svg/' );

		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}

	return $urls;
}
//dns-prefetch
add_filter( 'emoji_svg_url', '__return_false' );
//		Emoji end

//  Удаляем стили css-класса .recentcomments
add_action( 'widgets_init', 'sheensay_remove_recent_comments_style' );
 
function sheensay_remove_recent_comments_style() {
  global $wp_widget_factory;
  remove_action( 'wp_head', array( $wp_widget_factory -> widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}


//Disable gutenberg style in Front
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );

//  Отключаем wp-json

// Отключаем сам REST API
add_filter('rest_enabled', '__return_false');

// Отключаем фильтры REST API
remove_action( 'xmlrpc_rsd_apis',            'rest_output_rsd' );
remove_action( 'wp_head',                    'rest_output_link_wp_head', 10, 0 );
remove_action( 'template_redirect',          'rest_output_link_header', 11, 0 );
remove_action( 'auth_cookie_malformed',      'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired',        'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username',   'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash',       'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid',          'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

// Отключаем события REST API
remove_action( 'init',          'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
remove_action( 'parse_request', 'rest_api_loaded' );

// Отключаем Embeds связанные с REST API
remove_action( 'rest_api_init',          'wp_oembed_register_route'              );
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
// если собираетесь выводить вставки из других сайтов на своем, то закомментируйте след. строку.
remove_action( 'wp_head',                'wp_oembed_add_host_js'                 );


/* 
	**********************************

	End Clear head 

	*********************************
*/


define('LH_PATH',get_template_directory());
define('LH_INC', get_template_directory() . '/inc');

/* 

	********************************
	
	Add other settings

	- custom post type 
	- meta box
	
	******************************	
*/
require_once LH_INC . '/settings.php';


function show_block($id) {
	$p = 'lh_'; // prefix
	$metaD = get_post_meta( get_the_ID(), $p.$id);
	settype( $metaD[0], 'int');
	
	if ( $metaD[0] ) {
		return true;
	} else {
		return false;
	}
}

function lh_get_meta_box($id) {
	$p = 'lh_'; //prefix
	$meta = get_post_meta( get_the_ID(), $p.$id);
	
	if (is_array($meta) && count( $meta) === 1 ) {
		return $meta[0];
	} elseif (is_array($meta) && count($meta) >1) {
		return $meta;
	}
	

}

/* 

	********************************
	
	Form script

	
	******************************	
*/
require_once LH_INC . '/form.php';


/* 
	****************************

	Сохранение в константу id главной странци

	****************************
*/
$ids = get_all_page_ids();
foreach ( $ids as $value) {
	if (get_page_template_slug( $value ) === "page-home.php") {
		define("LH_ID_MAIN_PAGE", $value);				
		break;
	}
}

/* 
	custom menu
*/

require_once LH_INC . '/custom-menu.php';
