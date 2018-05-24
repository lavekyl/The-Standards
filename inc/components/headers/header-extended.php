<?php
/**
 * The USA Extended Header component
 *
 * @package The_Standards
 */
?>
<header class="usa-header usa-header-extended" role="banner">
  <?php if ( get_theme_mod( 'the_standards_gov_check' ) == 1 ) {
    get_template_part( 'inc/components/usa', 'banner' );
  } ?>
  <div class="usa-navbar">
    <div class="usa-logo" id="extended-logo">
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
        $us_web_design_system_description = get_bloginfo( 'description', 'display' );
        if ( $us_web_design_system_description || is_customize_preview() ) :
          ?>
          <p class="site-description"><?php echo $us_web_design_system_description; /* WPCS: xss ok. */ ?></p>
        <?php endif;
      } ?>
    </div>
    <button class="usa-menu-btn"><?php _e( 'Menu', 'the-standards' ); ?></button>
  </div>

  <nav role="navigation" class="usa-nav">
    <div class="usa-nav-inner">
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
      <div class="usa-nav-secondary">
        <?php get_template_part( 'inc/components/usa', 'search' ); ?>
        <?php
        wp_nav_menu( array(
          'theme_location' => 'secondary',
          'container' 		 => false,
          'menu_class' 		 => 'secondary-nav',
          'items_wrap' 		 => '<ul class="usa-unstyled-list usa-nav-secondary-links">%3$s</ul>',
          'fallback_cb'    => 'the_standards_default_secondary',
        ) );
        ?>
      </div>
    </div>
  </nav><!-- .usa-nav -->

</header><!-- #masthead -->
