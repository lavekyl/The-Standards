<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package The_Standards
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function the_standards_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'the_standards_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function the_standards_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'the_standards_pingback_header' );

/*
 * Add custom nav walker.
 *
 * @link https://codex.wordpress.org/Class_Reference/Walker
 */
class TheStandardsMain_Walker extends Walker_Nav_Menu {

	// add classes to ul sub-menus
  function start_lvl( &$output, $depth = 0, $args = array(), $id=0 ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $classes = array(
      'usa-nav-submenu'
    );
    $class_names = implode( ' ', $classes );

		$id = 'extended-nav-section-' . $this->curItem->menu_order;

    $output .= "\n" . $indent . '<ul id="' . $id . '" class="' . $class_names . '">' . "\n";
  }

	function end_lvl( &$output, $depth = 0, $args = array() ) {
    $output .= "</ul>\n";
  }

	// Displays start of an element. E.g '<li> Item Name'
  // @see Walker::start_el()
  function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {

		$this->curItem = $item;
		$object = $item->object;
  	$type = $item->type;
  	$title = $item->title;
  	$permalink = $item->url;

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

		$output .= '<li>';

    // Add SPAN element except in sub-menus
    if( $permalink && $permalink != '#' ) {
			if ( $depth == 0 ) {
				$output .= '<a href="' . $permalink . '" ' . $attributes . ' class="usa-nav-link"><span>';
			} else {
				$output .= '<a href="' . $permalink . '" ' . $attributes . '>';
			}
    } else {
			$output .= '<button class="usa-accordion-button usa-nav-link" aria-expanded="false" aria-controls="extended-nav-section-' . $item->menu_order . '">';
			$output .= '<span>';
    }

    $output .= $title;
    if( $permalink && $permalink != '#' ) {
			if ( $depth == 0 ) {
				$output .= '</span></a>';
			} else {
				$output .= '</a>';
			}
    } else {
    	$output .= '</span>';
			$output .= '</button>';
    }

  }

	// Displays end of an element. E.g '</li>'
  // @see Walker::end_el()
  function end_el(&$output, $item, $depth=0, $args=array()) {
      $output .= "</li>\n";
  }

}
