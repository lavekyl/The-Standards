<?php
/**
 * The USA Basic Header component
 *
 * @package The_Standards
 */
?>
<?php if ( get_theme_mod( 'the_standards_gov_check' ) == 1 ) {
  get_template_part( 'inc/components/usa', 'banner' );
} ?>
<header class="usa-header usa-header-basic" role="banner">
  <div class="usa-nav-container">
    <div class="usa-navbar">
      <div class="usa-logo" id="basic-logo">
        <?php if( has_custom_logo() ) { ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" accesskey="1" title="Home" aria-label="Home"><?php the_custom_logo(); ?></a>
        <?php } else {
          if ( is_front_page() && is_home() ) :
            ?>
            <h1 class="site-title">
              <em class="usa-logo-text">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" accesskey="1" title="Home" aria-label="Home"><?php bloginfo( 'name' ); ?></a>
              </em>
            </h1>
            <?php
          else :
            ?>
            <p class="site-title">
              <em class="usa-logo-text">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" accesskey="1" aria-label="Home"><?php bloginfo( 'name' ); ?></a>
              </em>
            </p>
            <?php
          endif;
          $the_standards_description = get_bloginfo( 'description', 'display' );
          if ( $the_standards_description || is_customize_preview() ) :
            ?>
            <p class="site-description"><?php echo $the_standards_description; /* WPCS: xss ok. */ ?></p>
          <?php endif;
        } ?>
      </div>
      <button class="usa-menu-btn"><?php _e( 'Menu', 'the-standards' ); ?></button>
    </div>

    <nav role="navigation" class="usa-nav">
      <button class="usa-nav-close">
        <?php
        $usa_nav_close = sprintf( '<img src="%s" alt="%s" />', get_stylesheet_directory_uri() .'/assets/img/close.svg', 'close' );
        echo $usa_nav_close;
        ?>
      </button>
      <?php
      wp_nav_menu( array(
        'theme_location' => 'primary',
        'container' 		 => false,
        'menu_id'        => '',
        'menu_class'		 => 'usa-nav-primary usa-accordion',
        'walker'  			 => new TheStandardsMain_Walker(), // use our custom walker
        'fallback_cb'    => 'the_standards_default_main',
      ) );
      ?>
      <?php get_template_part( 'inc/components/usa', 'search' ); ?>
    </nav>
  </div>
</header>
