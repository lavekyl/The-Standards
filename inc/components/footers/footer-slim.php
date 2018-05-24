<?php
/**
 * The USA Slim Footer component
 *
 * @package The_Standards
 */
?>
<footer class="usa-footer usa-footer-slim" role="contentinfo">
  <div class="usa-grid usa-footer-return-to-top">
    <a href="#"><?php _e( 'Return to top' ); ?></a>
  </div>
  <div class="usa-footer-primary-section">
    <div class="usa-grid">
      <nav class="usa-footer-nav usa-width-two-thirds">
        <?php
          wp_nav_menu( array(
            'theme_location' => 'footer',
            'container' 		 => false,
            'menu_class' 		 => 'footer-nav',
            'link_before'		 => '<span class="usa-footer-primary-link">',
            'link_after'		 => '</span>',
            'items_wrap' 		 => '<ul class="usa-unstyled-list">%3$s</ul>',
            'fallback_cb'    => 'the_standards_default_footer',
          ) );
        ?>
      </nav>
      <div class="usa-width-one-third">
        <?php if ( get_theme_mod( 'the_standards_phone_number' ) ) { ?>
        <div class="usa-footer-primary-content usa-footer-contact_info">
          <p>
            <a href="tel:<?php echo get_theme_mod( 'the_standards_phone_number' ); ?>"><?php echo get_theme_mod( 'the_standards_phone_number' ); ?></a>
          </p>
        </div>
        <?php } else { /* nothing happens */ } ?>
        <?php if ( get_theme_mod( 'the_standards_email' ) ) { ?>
        <div class="usa-footer-primary-content usa-footer-contact_info">
          <p><a href="<?php echo get_theme_mod( 'the_standards_email' ); ?>"><?php echo get_theme_mod( 'the_standards_email' ); ?></a></p>
        </div>
        <?php } else { /* nothing happens */ } ?>
      </div>
    </div>
  </div>
  <div class="usa-footer-secondary_section">
    <div class="usa-grid">
      <div class="usa-footer-logo">
        <?php if ( has_custom_logo() ) {
          $the_standards_logo_image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ); ?>
          <img src="<?php echo esc_url( $the_standards_logo_image[0] ); ?>" class="usa-footer-slim-logo-img" />
        <?php } else { ?>
          <h3 class="usa-footer-slim-logo-heading"><?php bloginfo( 'name' ); ?></h3>
        <?php } ?>
      </div>
    </div>
  </div>
</footer>
