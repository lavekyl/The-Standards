<?php
/**
 * The Standards widgets
 *
 * @package The_Standards
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
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
		'before_title'  => '<h2><span class="usa-hero-callout-alt">',
		'after_title'   => '</span></h2>',
	) );
}
add_action( 'widgets_init', 'the_standards_widgets_init' );
