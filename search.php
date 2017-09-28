<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
			if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'the_standards' ), '<span>' . get_search_query() . '</span>' );
					?></h1>
				</header><!-- .page-header -->

				<?php
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

</main><!-- #main-content -->

<?php
get_footer();
