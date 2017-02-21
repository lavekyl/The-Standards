<?php
/**
 * The front page template file
 *
 * It is used to display the front page of the website.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_Standards
 */

get_header(); ?>

<section id="primary" class="usa-grid usa-section">
  <?php if ( is_active_sidebar( 'homepage-sidebar-1' ) ) : ?>
    <?php get_template_part( 'components/section', 'front-sidebar' ); ?>
  <?php else : ?>
    <?php get_template_part( 'components/section', 'front-nosidebar' ); ?>
  <?php endif; ?>
</section>

<?php
get_footer();
