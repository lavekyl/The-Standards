<?php
/**
 * The is a template part for displaying the hero section
 *
 * @link https://developer.wordpress.org/reference/functions/get_template_part/
 *
 * @package The_Standards
 */

?>

<?php if( is_front_page() ) { ?>
  <?php if ( has_post_thumbnail() ) { ?>
    <section class="usa-hero" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center; background-size: cover;">
      <div class="usa-grid">
        <div class="usa-hero-callout usa-section-dark">
          <h2><?php the_title(); ?></h2>
          <?php
    			$description = get_bloginfo( 'description', 'display' );
    			if ( $description || is_customize_preview() ) : ?>
    				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
    			<?php
    			endif; ?>
          <a class="usa-button usa-button-big usa-button-secondary" href="#">Learn More</a>
        </div>
      </div>
    </section>
  <?php } else { ?>
    <section class="usa-hero">
      <div class="usa-grid">
        <div class="usa-hero-callout usa-section-dark">
          <h2><?php the_title(); ?></h2>
          <?php
    			$description = get_bloginfo( 'description', 'display' );
    			if ( $description || is_customize_preview() ) : ?>
    				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
    			<?php
    			endif; ?>
          <a class="usa-button usa-button-big usa-button-secondary" href="#">Learn More</a>
        </div>
      </div>
    </section>
  <?php } ?>
<?php } elseif( is_404() ) { ?>
<section class="usa-section aligncenter">
  <?php if ( has_post_thumbnail() ) { ?>
    <?php the_post_thumbnail(); ?>
  <?php } ?>
  <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'standards' ); ?></h1>
</section>
<?php } elseif( is_search() ) { ?>
<section class="usa-section aligncenter">
  <?php if ( has_post_thumbnail() ) { ?>
    <?php the_post_thumbnail(); ?>
  <?php } ?>
  <h1><?php printf( esc_html__( 'Search Results for: %s', 'standards' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
</section>
<?php } elseif( is_archive() ) { ?>
<section class="usa-section aligncenter">
  <?php if ( has_post_thumbnail() ) { ?>
    <?php the_post_thumbnail(); ?>
  <?php } ?>
  <?php
    the_archive_title( '<h2>', '</h2>' );
    the_archive_description( '<div class="archive-description">', '</div>' );
  ?>
</section>
<?php } elseif( is_home() ) { ?>
<section class="usa-section aligncenter">
  <?php if ( has_post_thumbnail() ) { ?>
    <?php the_post_thumbnail(); ?>
  <?php } ?>
  <h1><?php echo get_the_title( get_option( 'page_for_posts' ) ); ?></h1>
</section>
<?php } else { ?>
<section class="usa-section aligncenter">
  <?php if ( has_post_thumbnail() ) { ?>
    <?php the_post_thumbnail(); ?>
  <?php } ?>
  <h1><?php the_title(); ?></h1>
</section>
<?php } ?>
