<?php
/**
 * The Standards functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package The_Standards
 */

if ( ! function_exists( 'the_standards_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function the_standards_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on The Standards, use a find and replace
		 * to change 'the_standards' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'the_standards', get_template_directory() . '/languages' );

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
			'Primary' => __( 'This is the primary navigation menu.', 'the_standards' ),
			'Secondary' => __( 'This is the secondary navigation menu.', 'the_standards' ),
			'Footer' => __( 'This is the footer navigation menu.', 'the_standards' ),
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
add_action( 'after_setup_theme', 'the_standards_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function the_standards_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'the_standards_content_width', 640 );
}
add_action( 'after_setup_theme', 'the_standards_content_width', 0 );

/**
 * Main Nav fallback.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
function the_standards_default_main() { ?>
	<ul class="usa-nav-primary usa-accordion">
    <li><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php _e( 'Set Up This Menu', 'the_standards' ); ?></a></li>
	</ul>
<?php }

/**
 * Secondary Nav fallback.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
function the_standards_default_secondary() { ?>
	<ul class="usa-unstyled-list usa-nav-secondary-links">
		<li><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php _e( 'Set Up This Menu', 'the_standards' ); ?></a></li>
	</ul>
<?php }

/**
 * Footer Nav fallback.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
function the_standards_default_footer() { ?>
	<ul class="usa-unstyled-list">
		<li class="usa-width-one-fourth usa-footer-primary-content"><a href="<?php echo admin_url('nav-menus.php'); ?>"><span class="usa-footer-primary-link"><?php _e( 'Set Up This Menu', 'the_standards' ); ?></span></a></li>
	</ul>
<?php }

/**
 * Enqueue scripts and styles.
 */
function the_standards_scripts_and_styles() {
	wp_enqueue_style( 'the_standards-uswds-styles', get_template_directory_uri() . '/assets/css/uswds.min.css' );
	wp_enqueue_style( 'the_standards-style', get_stylesheet_uri() );

	wp_enqueue_script( 'the_standards-uswds-scripts', get_template_directory_uri() . '/assets/js/uswds.min.js', array(), '20170905', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'the_standards_scripts_and_styles' );

/**
 * Widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Feature custom post type.
 */
require get_template_directory() . '/inc/cpt.php';

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
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
