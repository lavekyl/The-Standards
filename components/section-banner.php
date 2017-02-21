<?php
/**
 * This is a template part for displaying the banner area above the nav
 *
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package The_Standards
 */

?>

<!-- Gov banner BEGIN -->
<div class="usa-banner">
  <div class="usa-accordion">
    <header class="usa-banner-header">
      <div class="usa-grid usa-banner-inner">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/favicons/favicon-57.png'; ?>" alt="U.S. flag">
        <p>Built using U.S. Web Design Standards</p>
        <button class="usa-accordion-button usa-banner-button alignright" aria-expanded="false" aria-controls="gov-banner">
          <span class="usa-banner-button-text">Veterans Crisis Line</span>
        </button>
      </div>
    </header><!-- .usa-banner-header -->
    <div class="usa-banner-content usa-grid usa-accordion-content" id="gov-banner">
      <div class="usa-banner-guidance-gov">
        <div class="usa-media_block-body alignright">
          <?php if ( is_active_sidebar( 'top-widget-1' ) ) : ?>
            <div id="top-widget" class="top-widget widget-area" role="complementary">
              <?php dynamic_sidebar( 'top-widget-1' ); ?>
            </div><!-- #top-widget -->
          <?php endif; ?>
        </div>
      </div>
    </div><!-- .usa-banner-content -->
  </div><!-- .usa-accordion -->
</div><!-- .usa-banner -->
<!-- Gov banner END -->
