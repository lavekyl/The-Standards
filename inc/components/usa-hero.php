<?php
/**
 * The USA Hero component
 *
 * @package The_Standards
 */
?>
<?php if ( has_post_thumbnail() ) { ?>
  <section class="usa-hero" style="background: url('<?php the_post_thumbnail_url(); ?>') no-repeat center; background-size: cover;">
    <div class="usa-grid">
      <?php if ( is_active_sidebar( 'hero-widget' ) ) {
        dynamic_sidebar( 'hero-widget' );
      } ?>
    </div>
  </section>
<?php } else { ?>
  <section class="usa-hero">
    <div class="usa-grid">
      <?php if ( is_active_sidebar( 'hero-widget' ) ) {
        dynamic_sidebar( 'hero-widget' );
      } ?>
    </div>
  </section>
<?php } ?>
