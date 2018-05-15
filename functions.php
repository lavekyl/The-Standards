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
		 * If you're building a theme based on US Web Design System, use a find and replace
		 * to change 'the-standards' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'the-standards', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in seven possible locations.
		register_nav_menus( array(
			'primary' => __( 'Primary navigation menu.', 'the-standards' ),
			'secondary' => __( 'Secondary navigation menu.', 'the-standards' ),
			'footer' => __( 'Footer navigation menu.', 'the-standards' ),
		) );

		if( get_theme_mod( 'the_standards_footer_layout_select' ) == 'big' ) {
			// This theme uses wp_nav_menu() in seven possible locations.
			register_nav_menus( array(
				'footer-big-1' => __( 'Footer Big 1', 'the-standards' ),
				'footer-big-2' => __( 'Footer Big 2', 'the-standards' ),
				'footer-big-3' => __( 'Footer Big 3', 'the-standards' ),
				'footer-big-4' => __( 'Footer Big 4', 'the-standards' ),
			) );
		}

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
		add_theme_support( 'custom-background', apply_filters( 'the_standards_custom_background_args', array(
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
add_action( 'after_setup_theme', 'the_standards_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function the_standards_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
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
    <li><a href="<?php echo admin_url('nav-menus.php'); ?>" class="usa-nav-link"><span><?php _e( 'Set Up This Menu', 'the-standards' ); ?></span></a></li>
	</ul>
<?php }

/**
 * Secondary Nav fallback.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
function the_standards_default_secondary() { ?>
	<ul class="usa-unstyled-list usa-nav-secondary-links">
		<li><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php _e( 'Set Up This Menu', 'the-standards' ); ?></a></li>
	</ul>
<?php }

/**
 * Footer Nav fallback.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
function the_standards_default_footer() { ?>
	<ul class="usa-unstyled-list">
		<li class="usa-width-one-fourth usa-footer-primary-content"><a href="<?php echo admin_url('nav-menus.php'); ?>"><span class="usa-footer-primary-link"><?php _e( 'Set Up This Menu', 'the-standards' ); ?></span></a></li>
	</ul>
<?php }

/**
 * Footer Big Nav fallback.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
function the_standards_default_footer_big() { ?>
	<ul class="usa-unstyled-list usa-width-one-fourth usa-footer-primary-content">
		<li class="usa-footer-secondary-link"><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php _e( 'Set Up This Menu', 'the-standards' ); ?></a></li>
	</ul>
<?php }

/**
 * Add search item to secondary nav.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
add_filter( 'wp_nav_menu_items', 'the_standards_search_menu_item', 10, 2 );
function the_standards_search_menu_item ( $items, $args ) {
  if ( $args->theme_location == 'Secondary' ) {
		return '<li class="js-search-button-container">
							<button class="usa-header-search-button js-search-button">Search</button>
						</li>' . $items;
  }
  return $items;
}

/**
 * Add class to footer nav.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
add_filter('nav_menu_css_class', 'the_standards_menu_classes', 1, 3);
function the_standards_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'Footer') {

		$classes[] = 'usa-width-one-third usa-footer-primary-content';

  }
  return $classes;
}

/**
 * Add class to nav menus when big footer is selected.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
 */
if( get_theme_mod( 'the_standards_footer_layout_select' ) == 'big' ) {
	add_filter('nav_menu_css_class', 'the_standards_footer_menu_classes', 1, 3);
}
function the_standards_footer_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'Footer Big 1' || $args->theme_location == 'Footer Big 2' || $args->theme_location == 'Footer Big 3' || $args->theme_location == 'Footer Big 4') {
    $classes[] = 'usa-footer-secondary-link';
  }
  return $classes;
}

/**
 * Implement theme widgets.
 */
require get_template_directory() . '/inc/widgets.php';

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
 * Enqueue assets.
 */
require get_template_directory() . '/inc/assets.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
