<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays the front page by default.
 * Other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Standards
 */

get_header();
?>

	<section class="usa-grid usa-section">

		<?php if( get_theme_mod( 'the_standards_main_layout_select' ) == 'sidebar' ) { ?>
			<div class="usa-width-one-third">
				<?php if( is_active_sidebar( 'front-page-1' ) ) {
					dynamic_sidebar( 'front-page-1' );
				} else { ?>
					<h2><?php	_e( 'Add a widget to Front Page 1 to remove this text', 'the-standards' ); ?></h2>
				<?php } ?>
			</div>
			<div class="usa-width-two-thirds">
				<?php
				while ( have_posts() ) :
					the_post();

					the_content();

				endwhile; // End of the loop.
				?>
			</div>
		<?php } else {
			while ( have_posts() ) :
				the_post();

				the_content();

			endwhile; // End of the loop.
		} ?>

	</section><!-- .usa-grid .usa-section -->

	<?php if( is_active_sidebar( 'front-page-2' ) ) { ?>
		<div class="usa-section usa-section-dark usa-graphic_list">
			<div class="usa-grid usa-graphic_list-row">
				<?php dynamic_sidebar( 'front-page-2' ); ?>
			</div>
		</div>
	<?php }

	if( is_active_sidebar( 'front-page-3' ) ) { ?>
		<div class="usa-section">
			<div class="usa-grid">
				<?php dynamic_sidebar( 'front-page-3' ); ?>
			</div>
		</div>
	<?php }

get_footer();
