<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
		if ( have_posts() ) :
			
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
  </div>
</section>

<?php
get_footer();
