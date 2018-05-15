<?php
/**
 * Assets file to enqueue scripts and styles
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 *
 * @package The_Standards
 */

function the_standards_scripts() {
	wp_enqueue_style( 'the-standards-style', get_stylesheet_uri() );
	wp_enqueue_style( 'dashicons' );

	wp_enqueue_style( 'the-standards-custom-style', get_stylesheet_directory_uri() . "/assets/css/uswds.min.css", array(), '20151215' );

	wp_enqueue_script( 'the-standards-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'the-standards-js', get_template_directory_uri() . '/assets/js/uswds.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'the_standards_scripts' );
