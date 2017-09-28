<?php
/**
 * The header for The Standards theme
 *
 * This is template displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Standards
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
<a class="usa-skipnav" href="#main-content"><?php esc_html_e( 'Skip to main content', 'the_standards' ); ?></a>
<header class="usa-header usa-header-extended" role="banner">
	<?php if ( get_theme_mod( 'the_standards_gov_check' ) == 1 ) {
		get_template_part( 'inc/components/usa', 'banner' );
	} ?>
	<div class="usa-navbar">
    <button class="usa-menu-btn"><?php esc_html_e( 'Menu', 'the_standards' ); ?></button>
    <div class="usa-logo" id="logo">
			<?php if ( has_custom_logo() ) { ?>
				<a href="/" accesskey="1" title="Home" aria-label="<?php bloginfo( 'name' ); ?>"><?php the_custom_logo(); ?></a>
			<?php } else { ?>
				<em class="usa-logo-text">
					<a href="/" accesskey="1" title="Home" aria-label="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
				</em>
			<?php } ?>
    </div>
  </div>
  <nav role="navigation" class="usa-nav">
    <div class="usa-nav-inner">
      <button class="usa-nav-close">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/close.svg'; ?>" alt="close">
      </button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'Primary',
        	'container' 		 => false,
        	'menu_class' 		 => 'main-nav',
					'items_wrap' 		 => '<ul class="usa-nav-primary usa-accordion">%3$s</ul>',
					'fallback_cb'    => 'the_standards_default_main',
					'walker' 				 => new The_Standards_Walker_Nav_Menu()
				) );
			?>
			<div class="usa-nav-secondary">
				<?php get_template_part( 'inc/components/usa', 'search' ); ?>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'Secondary',
						'container' 		 => false,
						'menu_class' 		 => 'secondary-nav',
						'items_wrap' 		 => '<ul class="usa-unstyled-list usa-nav-secondary-links">%3$s</ul>',
						'fallback_cb'    => 'the_standards_default_secondary',
					) );
				?>
      </div>
    </div>
  </nav>
</header>
