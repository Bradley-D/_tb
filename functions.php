<?php
/**
 * _tb functions and definitions
 *
 * @package _tb
 * @version 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( '_tb_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
	function _tb_setup() {
	  global $cap, $content_width, $wp_version;

	  // This theme styles the visual editor with editor-style.css to match the theme style.
	  add_editor_style();

	  if ( function_exists( 'add_theme_support' ) ) {

			/**
			 * Add default posts and comments RSS feed links to head
			*/
			if ( version_compare( $wp_version, '3.0', '>=' ) ) :
				add_theme_support( 'automatic-feed-links' );
			else :
				automatic_feed_links();
			endif;

			/**
			 * Enable support for Post Thumbnails on posts and pages
			 *
			 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
			*/
			add_theme_support( 'post-thumbnails' );
			add_image_size( 'full-width', 1900, 500 );

			/**
			 * Enable support for Post Formats
			*/
			add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

			/**
			 * Setup the WordPress core custom background feature.
			*/
			add_theme_support( 'custom-background', apply_filters( '_tb_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );

	  }

		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on _tb, use a find and replace
		 * to change '_tb' to the name of your theme in all the template files
		*/
		load_theme_textdomain( '_tb', get_template_directory() . '/languages' );

		/**
		 * This theme uses wp_nav_menu() in one location.
		*/
	    register_nav_menus( array(
	        'primary'  => __( 'Header bottom menu', '_tb' ),
	    ) );

	    /**
	    * Add theme support for WooCommerce
	    */
			add_theme_support( 'woocommerce' );

			/**
			 * Check if WooCommerce is active
			 **/
			if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			    require 'includes/tb-wc-functions.php';
			}

	}
endif; // _tb_setup
add_action( 'after_setup_theme', '_tb_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function _tb_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_tb' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array (
		'name'          => __( 'Header', '_glse' ),
		'id'            => 'header',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Full Width', '_glse' ),
		'id'            => 'footer-full',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', '_glse' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', '_glse' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', '_glse' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', '_glse' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', '_tb_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function _tb_scripts() {

	// load Google Fonts
	wp_enqueue_style( 'google_font', 'http://fonts.googleapis.com/css?family=Raleway:400,700,200' );

  // load bootstrap css
  wp_enqueue_style( '_tb-bootstrap', get_template_directory_uri() . '/includes/resources/bootstrap/css/bootstrap.css' );

  // load _tb styles
  wp_enqueue_style( '_tb-style', get_stylesheet_uri() );

  // load theme js
  wp_enqueue_script('_tb-themejs', get_template_directory_uri().'/includes/js/theme.js', array('jquery') );

  // load bootstrap js
  wp_enqueue_script('_tb-bootstrapjs', get_template_directory_uri().'/includes/resources/bootstrap/js/bootstrap.js', array('jquery') );

  // load bootstrap wp js
  wp_enqueue_script( '_tb-bootstrapwp', get_template_directory_uri() . '/includes/js/bootstrap-wp.js', array('jquery') );

  wp_enqueue_script( '_tb-skip-link-focus-fix', get_template_directory_uri() . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
  }

  if ( is_singular() && wp_attachment_is_image() ) {
      wp_enqueue_script( '_tb-keyboard-image-navigation', get_template_directory_uri() . '/includes/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
  }

}
add_action( 'wp_enqueue_scripts', '_tb_scripts' );


/**
 * Implement the Custom Header feature.
 */
require trailingslashit( get_template_directory() ) . 'includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . 'includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require trailingslashit( get_template_directory() ) . 'includes/extras.php';

/**
 * Customizer additions.
 */
require trailingslashit( get_template_directory() ) . 'includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require trailingslashit( get_template_directory() ) . 'includes/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require trailingslashit( get_template_directory() ) . 'includes/bootstrap-wp-navwalker.php';

/**
 * Load custom functions
 */
require trailingslashit( get_template_directory() ) . 'includes/custom-functions.php';
