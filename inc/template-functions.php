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

	return $classes;
}
add_filter( 'body_class', 'the_standards_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function the_standards_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'the_standards_pingback_header' );

/**
 * Walker class for primary navigation to add usa-nav-submenu.
 */
class The_Standards_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"usa-nav-submenu\">\n";
  }
}

/**
 * Function to add class to parent menu items.
 */
function the_standards_add_menu_parent_class( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
    //Check if the item is a parent item
    if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
      $parents[] = $item->menu_item_parent;
    }
	}

	foreach ( $items as $item ) {
    if ( in_array( $item->ID, $parents ) ) {
      //Add "menu-parent-item" class to parents
      $item->classes[] = 'usa-nav-has-children';
    }
	}

	return $items;
}
add_filter( 'wp_nav_menu_objects', 'the_standards_add_menu_parent_class' );

/**
 * Add 'usa-nav-link' class to menu item anchors.
 */
add_filter( 'nav_menu_link_attributes', 'My_Theme_nav_menu_link_atts', 10, 4 );
function My_Theme_nav_menu_link_atts( $atts, $item, $args, $depth ) {
	$new_atts = array( 'class' => 'usa-nav-link' );
	if ( isset( $atts['href'] ) ) {
		$new_atts['href'] = $atts['href'];
	}

	return $new_atts;
}

/**
 * Remove id from nav menu items.
 */
add_filter( 'nav_menu_item_id', '__return_empty_string' );
