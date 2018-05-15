<?php
/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package The_Standards
 */

function the_standards_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'the_standards' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'the_standards' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

  register_sidebar( array(
		'name'          => esc_html__( 'Hero', 'the_standards' ),
		'id'            => 'hero-widget',
		'description'   => esc_html__( 'Add widget here.', 'the_standards' ),
		'before_widget' => '<div class="usa-hero-callout usa-section-dark">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Front Page 1', 'the-standards' ),
		'id'            => 'front-page-1',
		'description'   => esc_html__( 'Add widgets here.', 'the-standards' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
  register_sidebar( array(
		'name'          => esc_html__( 'Front Page 2', 'the-standards' ),
		'id'            => 'front-page-2',
		'description'   => esc_html__( 'Add widgets here.', 'the-standards' ),
		'before_widget' => '<div class="usa-media_block-body">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
  register_sidebar( array(
		'name'          => esc_html__( 'Front Page 3', 'the-standards' ),
		'id'            => 'front-page-3',
		'description'   => esc_html__( 'Add widgets here.', 'the-standards' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	if( get_theme_mod( 'the_standards_footer_layout_select' ) == 'big' ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Big Widget', 'the-standards' ),
			'id'            => 'footer-big',
			'description'   => esc_html__( 'Add widgets here.', 'the-standards' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3 class="usa-sign_up-header">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'the_standards_widgets_init' );

/**
 * Add column CSS classes to dynamic sidebar widgets.
 *
 * @link https://gist.github.com/annalinneajohansson/5906962
 */
function the_standards_flexible_widget_classes( $params ) {

	global $the_standards_widget_num; // Global a counter array

	$this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
	$arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets
	if( !$the_standards_widget_num ) {
		// If the counter array doesn't exist, create it
		$the_standards_widget_num = array();
	}
	if( !isset( $arr_registered_widgets[$this_id] ) || !is_array( $arr_registered_widgets[$this_id] ) ) {
		 // Check if the current sidebar has no widgets
		return $params; // No widgets in this sidebar... bail early.
	}
	if( isset( $the_standards_widget_num[$this_id] ) ) {
		 // See if the counter array has an entry for this sidebar
		$the_standards_widget_num[$this_id] ++;
	} else {
		 // If not, create it starting with 1
		$the_standards_widget_num[$this_id] = 1;
	}

	// Add an array with widget areas that are flexible
	$the_standards_widget_ids = array( 'front-page-2' );

	// Add a widget number class for additional styling options
	$class = 'class="usa-widget-' . $the_standards_widget_num[$this_id] . ' ';
	foreach ( $the_standards_widget_ids as $the_standards_widget_id ) {

		if( $this_id == '' . $the_standards_widget_id . '' && count( $arr_registered_widgets['' . $the_standards_widget_id . ''] ) == 1 ) {
			// If there is one widget
			$class .= 'usa-media_block ';
		} elseif( $this_id == '' . $the_standards_widget_id . '' && count( $arr_registered_widgets['' . $the_standards_widget_id . ''] ) == 2 ) {
			// If there are two widgets
			$class .= 'usa-width-one-half usa-media_block ';
		} elseif( $this_id == '' . $the_standards_widget_id . '' && count( $arr_registered_widgets['' . $the_standards_widget_id . ''] ) == 3 ) {
			// If there are three widgets
			$class .= 'usa-width-one-third usa-media_block ';
		} elseif( $this_id == '' . $the_standards_widget_id . '' && count( $arr_registered_widgets['' . $the_standards_widget_id . ''] ) == 4 ) {
			// If there are four widgets
			$class .= 'usa-width-one-fourth usa-media_block ';
		} else {
			// If there are more than four widgets
			$class .= 'usa-media_block ';
		}

	}

	// Insert our new classes into "before widget"
	$params[0]['before_widget'] = str_replace( 'class="', $class, $params[0]['before_widget'] );
	return $params;
}
add_filter( 'dynamic_sidebar_params', 'the_standards_flexible_widget_classes' );
