<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Standards
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="usa-skipnav" href="#main-content"><?php esc_html_e( 'Skip to main content', 'standards' ); ?></a>
	<header id="masthead" class="usa-header usa-header-extended" role="banner">
		<?php get_template_part( 'components/section', 'banner' ); ?>
    <?php get_template_part( 'components/section', 'nav-below' ); ?>
	</header><!-- #masthead -->

	<main id="main-content" role="main">
		<?php get_template_part( 'components/section', 'hero' ); ?>
