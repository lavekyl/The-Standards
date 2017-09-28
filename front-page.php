<?php
/**
 * The template for the front page
 *
 * This is the template that displays the front page by default.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Standards
 */

get_header(); ?>
<main id="main-content">

  <div class="usa-overlay"></div>
  <?php get_template_part( 'inc/components/usa', 'hero' ); ?>

  <section class="usa-grid usa-section">
    <div class="usa-width-one-third">
      <h2><?php bloginfo( 'description' ); ?></h2>
    </div>
    <div class="usa-width-two-thirds">
			<?php if ( have_posts() ) {
      	while ( have_posts() ) {
      		the_post();
      		the_content();
      	} // end while
      } // end if ?>
    </div>
  </section>

  <?php get_template_part( 'inc/components/usa', 'graphic_list' ); ?>

</main><!-- #main-content -->

<?php
get_footer();
