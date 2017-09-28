<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Standards
 */

get_header(); ?>
<main id="main-content">

  <section class="usa-grid usa-section">
    <div class="usa-width-one-third">
      <?php get_sidebar(); ?>
    </div>
    <div class="usa-width-two-thirds">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
    </div>
  </section>

</main><!-- #main-content -->

<?php
get_footer();
