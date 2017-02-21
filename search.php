<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
  </div>
</section>

<?php
get_footer();
