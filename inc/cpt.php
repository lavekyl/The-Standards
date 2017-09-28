<?php
/**
 * The Standards features Post Type
 *
 * @package The_Standards
 */

 // Register custom post types
 function the_standards_register_cpt() {
 	/**
 	 * Post Type: Features.
 	 */

 	$labels = array(
 		"name" => __( 'Features', 'the_standards' ),
 		"singular_name" => __( 'Feature', 'the_standards' ),
 	);

 	$args = array(
 		"label" => __( 'Features', 'the_standards' ),
 		"labels" => $labels,
 		"description" => "Used to add feature content to your site.",
 		"public" => true,
 		"publicly_queryable" => true,
 		"show_ui" => true,
 		"show_in_rest" => false,
 		"rest_base" => "",
 		"has_archive" => false,
 		"show_in_menu" => true,
 		"exclude_from_search" => false,
 		"capability_type" => "post",
 		"map_meta_cap" => true,
 		"hierarchical" => false,
 		"rewrite" => array( "slug" => "feature", "with_front" => true ),
 		"query_var" => true,
 		"menu_icon" => "dashicons-welcome-add-page",
 		"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
 	);

 	register_post_type( "feature", $args );

}
add_action( 'init', 'the_standards_register_cpt' );
