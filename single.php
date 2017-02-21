<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The_Standards
 */

get_header(); ?>

<section id="primary" class="usa-grid usa-section">
  <div class="usa-width-one-third">
		<?php get_sidebar(); ?>
  </div>
  <div class="usa-width-two-thirds">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
  </div>
</section>

<?php
get_footer();
