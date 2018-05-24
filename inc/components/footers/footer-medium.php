<?php
/**
 * The USA Medium Footer component
 *
 * @package The_Standards
 */
?>
<footer class="usa-footer usa-footer-medium" role="contentinfo">
  <div class="usa-grid usa-footer-return-to-top">
    <a href="#"><?php _e( 'Return to top' ); ?></a>
  </div>
  <div class="usa-footer-primary-section">
    <div class="usa-grid-full">
      <nav class="usa-footer-nav">
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
    </div>
  </div>

  <div class="usa-footer-secondary_section">
    <div class="usa-grid">
      <div class="usa-footer-logo usa-width-one-half">
        <?php if ( has_custom_logo() ) { ?>
          <?php the_custom_logo(); ?>
        <?php } else { ?>
          <h3 class="usa-footer-logo-heading"><?php bloginfo( 'name' ); ?></h3>
        <?php } ?>
      </div>
      <div class="usa-footer-contact-links usa-width-one-half">
        <?php if ( get_theme_mod( 'the_standards_facebook' ) ) { ?>
          <a class="usa-link-facebook" href="<?php echo get_theme_mod( 'the_standards_facebook' ); ?>">
            <span>Facebook</span>
          </a>
        <?php } else { /* nothing happens */ } ?>
        <?php if ( get_theme_mod( 'the_standards_twitter' ) ) { ?>
          <a class="usa-link-twitter" href="<?php echo get_theme_mod( 'the_standards_twitter' ); ?>">
            <span>Twitter</span>
          </a>
        <?php } else { /* nothing happens */ } ?>
        <?php if ( get_theme_mod( 'the_standards_youtube' ) ) { ?>
          <a class="usa-link-youtube" href="<?php echo get_theme_mod( 'the_standards_youtube' ); ?>">
            <span>YouTube</span>
          </a>
        <?php } else { /* nothing happens */ } ?>
        <?php if ( get_theme_mod( 'the_standards_rss' ) ) { ?>
          <a class="usa-link-rss" href="<?php echo get_theme_mod( 'the_standards_rss' ); ?>">
            <span>RSS</span>
          </a>
        <?php } else { /* nothing happens */ } ?>
        <address>
          <?php if ( get_theme_mod( 'the_standards_contact_name' ) ) { ?>
            <h3 class="usa-footer-contact-heading"><?php echo get_theme_mod( 'the_standards_contact_name' ); ?></h3>
          <?php } else { /* nothing happens */ } ?>
          <?php if ( get_theme_mod( 'the_standards_phone_number' ) ) { ?>
            <p><?php echo get_theme_mod( 'the_standards_phone_number' ); ?></p>
          <?php } else { /* nothing happens */ } ?>
          <?php if ( get_theme_mod( 'the_standards_email' ) ) { ?>
            <a href="mailto:<?php echo get_theme_mod( 'the_standards_email' ); ?>"><?php echo get_theme_mod( 'the_standards_email' ); ?></a>
          <?php } else { /* nothing happens */ } ?>
        </address>
      </div>
    </div>
  </div>
</footer>
