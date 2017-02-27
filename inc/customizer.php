<?php
/**
 * The Standards Theme Customizer
 *
 * @package The_Standards
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function standards_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//**** Section colors start
	// Header background
	$wp_customize->add_setting( 'header_background_color' , array(
    'default'     => '#ffffff',
    'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
		'label'        => 'Header Background Color',
		'section'    => 'colors',
		'settings'   => 'header_background_color',
	) ) );

	// Nav background
	$wp_customize->add_setting( 'nav_background_color' , array(
    'default'     => '#ffffff',
    'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_background_color', array(
		'label'        => 'Navigation Background Color',
		'section'    => 'colors',
		'settings'   => 'nav_background_color',
	) ) );

	// Nav links
	$wp_customize->add_setting( 'nav_link_color' , array(
    'default'     => '#212121',
    'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nav_link_color', array(
		'label'        => 'Navigation Link Color',
		'section'    => 'colors',
		'settings'   => 'nav_link_color',
	) ) );

	// Footer primary background
	$wp_customize->add_setting( 'footer_prime_background_color' , array(
    'default'     => '#f1f1f1',
    'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_prime_background_color', array(
		'label'        => 'Footer Primary Background Color',
		'section'    => 'colors',
		'settings'   => 'footer_prime_background_color',
	) ) );

	// Footer primary text color
	$wp_customize->add_setting( 'footer_prime_text_color' , array(
    'default'     => '#212121',
    'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_prime_text_color', array(
		'label'        => 'Footer Primary Text Color',
		'section'    => 'colors',
		'settings'   => 'footer_prime_text_color',
	) ) );

	// Footer secondary background
	$wp_customize->add_setting( 'footer_sec_background_color' , array(
    'default'     => '#d6d7d9',
    'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_sec_background_color', array(
		'label'        => 'Footer Secondary Background Color',
		'section'    => 'colors',
		'settings'   => 'footer_sec_background_color',
	) ) );

	// Footer secondary text color
	$wp_customize->add_setting( 'footer_sec_text_color' , array(
    'default'     => '#212121',
    'transport'   => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_sec_text_color', array(
		'label'        => 'Footer Secondary Text Color',
		'section'    => 'colors',
		'settings'   => 'footer_sec_text_color',
	) ) );
	//**** Section colors end

}
add_action( 'customize_register', 'standards_customize_register' );

/**
 * Adds CSS from the customizer settings.
 */
function standards_customizer_css() { ?>
	<style type="text/css">
		.usa-header {
			background: <?php echo get_theme_mod('header_background_color', '#ffffff'); ?>;
		}
		.usa-nav {
			background: <?php echo get_theme_mod('nav_background_color', '#ffffff'); ?>;
		}
		.usa-nav-primary a {
			color: <?php echo get_theme_mod('nav_link_color', '#212121'); ?>;
		}
		.usa-footer-primary-section {
			background: <?php echo get_theme_mod('footer_prime_background_color', '#f1f1f1'); ?>;
		}
		.usa-footer-secondary_section {
			background: <?php echo get_theme_mod('footer_sec_background_color', '#d6d7d9'); ?>;
		}
	</style>
<?php }
add_action( 'wp_head', 'standards_customizer_css');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function standards_customize_preview_js() {
	wp_enqueue_script( 'standards_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'standards_customize_preview_js' );
