<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The_Standards
 */

get_header(); ?>
<main id="main-content">

	<section class="usa-grid usa-section">
		<aside class="usa-width-one-fourth usa-layout-docs-sidenav">
    	<?php get_sidebar(); ?>
		</aside><!-- .usa-width-one-fourth .usa-layout-docs-sidenav -->
    <div class="usa-width-three-fourths usa-layout-docs-main_content">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single' );

				the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

    </div>
  </section>
</main><!-- #main-content -->

<?php
get_footer();
