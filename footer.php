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

	</main><!-- #main-content -->

	<footer id="colophon" class="usa-footer usa-footer-medium" role="contentinfo">
		<div class="usa-grid usa-footer-return-to-top">
      <a href="#">Return to top</a>
    </div>
		<?php if ( is_active_sidebar( 'above-footer-widget-1' ) ) : ?>
			<div class="usa-footer-primary-section">
	      <div class="usa-grid">
					<?php dynamic_sidebar( 'above-footer-widget-1' ); ?>
	      </div>
	    </div><!-- .usa-footer-primary-section -->
		<?php endif; ?>
		<?php get_template_part( 'components/section', 'footer-widgets' ); ?>
		<?php if ( is_active_sidebar( 'bottom-footer-widget-1' ) ) : ?>
			<div class="site-info usa-footer-secondary_section">
	      <div class="usa-grid">
					<?php dynamic_sidebar( 'bottom-footer-widget-1' ); ?>
	      </div>
	    </div><!-- .usa-footer-primary-section -->
		<?php else : ?>
			<div class="site-info usa-footer-secondary_section">
				<div class="usa-grid">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'standards' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'standards' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'standards' ), 'standards', '<a href="https://automattic.com/" rel="designer">Kyle Laverty</a>' ); ?>
				</div><!-- .usa-grid -->
			</div><!-- .site-info -->
		<?php endif; ?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
