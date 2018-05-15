<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Standards
 */

?>

	<?php if( is_front_page() ) {
		// nothing
	} else { ?>
		</main>
	<?php } ?>

	<?php if( get_theme_mod( 'the_standards_footer_layout_select' ) == 'slim' ) {
		get_template_part( 'inc/components/footers/footer', 'slim' );
	} elseif( get_theme_mod( 'the_standards_footer_layout_select' ) == 'medium' ) {
		get_template_part( 'inc/components/footers/footer', 'medium' );
	} elseif( get_theme_mod( 'the_standards_footer_layout_select' ) == 'big' ) {
		get_template_part( 'inc/components/footers/footer', 'big' );
	} else {
		get_template_part( 'inc/components/footers/footer', 'medium' );
	}

	wp_footer(); ?>

</body>
</html>
