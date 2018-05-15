<?php
/**
 * The USA Hero component
 *
 * @package The_Standards
 */
?>
<!-- Gov hero BEGIN -->
<?php if( is_front_page() ) { ?>
  <main id="main-content"></main>
  <?php if( is_active_sidebar( 'hero-widget' ) ) {
    if( has_header_image() ) { ?>
      <section class="usa-hero" style="background: url('<?php header_image(); ?>') no-repeat center; background-size: cover;">
        <div class="usa-grid">
          <?php dynamic_sidebar( 'hero-widget' ); ?>
        </div>
      </section>
    <?php } else { ?>
      <section class="usa-hero">
        <div class="usa-grid">
          <?php dynamic_sidebar( 'hero-widget' ); ?>
        </div>
      </section>
    <?php } ?>
  <?php } ?>
<?php } else { ?>
  <main id="main-content">
    <?php if( get_theme_mod( 'the_standards_header_image' ) ) { ?>
      <section class="usa-hero" style="background: url('<?php echo get_theme_mod( 'the_standards_header_image' ); ?>') no-repeat center; background-size: cover;">
        <div class="usa-grid">
          <div class="usa-section">
            <?php if( is_home() ) { ?>
              <h1><?php single_post_title(); ?></h1>
            <?php } elseif( is_search() ) { ?>
              <h1>
                <?php
                /* translators: %s: search query. */
                printf( esc_html__( 'Search Results for: %s', 'the-standards' ), '<span>' . get_search_query() . '</span>' );
                ?>
              </h1>
            <?php } elseif( is_404() ) { ?>
              <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'the-standards' ); ?></h1>
            <?php } elseif( is_archive() ) {
              the_archive_title( '<h1>', '</h1>' );
            } else {
              the_title( '<h1>', '</h1>' );
            } ?>
          </div>
        </div>
      </section>
    <?php } else { ?>
      <section class="usa-hero">
        <div class="usa-grid">
          <div class="usa-section">
            <?php if( is_home() ) { ?>
              <h1><?php single_post_title(); ?></h1>
            <?php } elseif( is_search() ) { ?>
              <h1>
                <?php
                /* translators: %s: search query. */
                printf( esc_html__( 'Search Results for: %s', 'the-standards' ), '<span>' . get_search_query() . '</span>' );
                ?>
              </h1>
            <?php } elseif( is_404() ) { ?>
              <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'the-standards' ); ?></h1>
            <?php } elseif( is_archive() ) {
              the_archive_title( '<h1>', '</h1>' );
            } else {
              the_title( '<h1>', '</h1>' );
            } ?>
          </div>
        </div>
      </section>
    <?php } ?>

<?php } ?>
