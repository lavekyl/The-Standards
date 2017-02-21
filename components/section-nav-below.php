<?php
/**
 * This is a template part for displaying the nav area with navigation below the logo
 *
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package The_Standards
 */

?>

<div class="usa-navbar">
  <button class="usa-menu-btn"><?php esc_html_e( 'Menu', 'standards' ); ?></button>
  <div class="usa-logo" id="logo">
    <?php
    if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom_logo' ) ) {
      the_custom_logo();
    } else {
    ?>
    <em class="usa-logo-text">
      <?php
      if ( is_front_page() ) : ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" accesskey="1" title="Home" aria-label="Home"><?php bloginfo( 'name' ); ?></a></h1>
      <?php else : ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
      <?php
      endif; ?>
    </em>
    <?php } ?>
  </div><!-- .usa-logo -->
  <?php if ( is_active_sidebar( 'header-right-1' ) ) : ?>
    <div id="header-right" class="header-right widget-area" role="complementary">
      <?php dynamic_sidebar( 'header-right-1' ); ?>
    </div><!-- #header-right -->
  <?php endif; ?>
</div><!-- .usa-navbar -->
<nav role="navigation" class="usa-nav">
  <div class="usa-nav-inner">
    <button class="usa-nav-close">
      <img src="<?php echo get_template_directory_uri() . '/assets/img/close.svg'; ?>" alt="close">
    </button>
    <?php
      wp_nav_menu( array(
        'theme_location' => 'menu-1',
        'menu_id' => 'primary-menu',
        'menu_class' => 'usa-nav-primary usa-accordion'
      ) );
    ?>
  </div>
</nav><!-- .usa-nav -->
