<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package US_Web_Design_System
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="usa-skipnav" href="#main-content"><?php esc_html_e( 'Skip to main content', 'the-standards' ); ?></a>
	<?php if( get_theme_mod( 'the_standards_header_layout_select' ) == 'basic' ) {
		get_template_part( 'inc/components/headers/header', 'basic' );
	} elseif( get_theme_mod( 'the_standards_header_layout_select' ) == 'extended' ) {
		get_template_part( 'inc/components/headers/header', 'extended' );
	} else {
		get_template_part( 'inc/components/headers/header', 'extended' );
	} ?>
	<div class="usa-overlay"></div>

	<?php get_template_part( 'inc/components/usa', 'hero' ); ?>
