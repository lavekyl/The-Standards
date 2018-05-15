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
function the_standards_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'the_standards_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'the_standards_customize_partial_blogdescription',
		) );
	}

	// Display Options section
	$wp_customize->add_section( 'the_standards_display_options', array(
		'title' => __( 'Display Options', 'the-standards' ),
		'priority' => 150,
		'capability' => 'edit_theme_options',
	) );

	// Header Layout start
	$wp_customize->add_setting(
		'the_standards_header_layout_select',
		array(
			'default'   	   	  => 'basic',
			'sanitize_callback' => 'the_standards_sanitize_input',
			'transport' 	    	=> 'refresh'
		)
	);
	$wp_customize->add_control(
		'the_standards_header_layout_select',
		array(
			'section'  => 'the_standards_display_options',
			'label'    => 'Header Layout',
			'type'     => 'select',
			'choices'  => array(
				'basic'      			=> 'Basic Header',
				'extended'   			=> 'Extended Header'
			)
		)
	);
	// Header Layout end

	// Main Content Layout start
	$wp_customize->add_setting(
		'the_standards_main_layout_select',
		array(
			'default'   	   	  => 'no-sidebar',
			'sanitize_callback' => 'the_standards_sanitize_input',
			'transport' 	    	=> 'refresh'
		)
	);
	$wp_customize->add_control(
		'the_standards_main_layout_select',
		array(
			'section'  => 'the_standards_display_options',
			'label'    => 'Main Content Layout',
			'type'     => 'select',
			'choices'  => array(
				'sidebar'      			=> 'Sidebar',
				'no-sidebar'   			=> 'No Sidebar'
			)
		)
	);
	// Main Content Layout end

	// Footer Layout start
	$wp_customize->add_setting(
		'the_standards_footer_layout_select',
		array(
			'default'   	   	  => 'medium',
			'sanitize_callback' => 'the_standards_sanitize_input',
			'transport' 	    	=> 'refresh'
		)
	);
	$wp_customize->add_control(
		'the_standards_footer_layout_select',
		array(
			'section'  => 'the_standards_display_options',
			'label'    => 'Footer Layout',
			'type'     => 'select',
			'choices'  => array(
				'slim'      => 'Slim Footer',
				'medium'   	=> 'Medium Footer',
				'big'				=> 'Big Footer'
			)
		)
	);
	// Footer Layout end

	// Standard Header Image start
	$wp_customize->add_setting(
		'the_standards_header_image',
		array(
		  'default'      	    => '',
			'sanitize_callback' => 'the_standards_sanitize_input',
		  'transport'    	    => 'refresh'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'the_standards_header_image',
			array(
			    'label'    => 'Standard Header Image',
			    'settings' => 'the_standards_header_image',
			    'section'  => 'the_standards_display_options'
			)
		)
	);
	// Standard Header Image end

	// Social Media items start
	$wp_customize->add_section( 'social_media_section', array(
		'title' => __( 'Social Media', 'the-standards' ),
		'priority' => 160,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'the_standards_facebook', array(
	  'default' => 'Facebook',
	  'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'the_standards_facebook', array(
	  'type' => 'text',
	  'section' => 'social_media_section',
	  'label' => __( 'Facebook Profile URL' ),
	) );

	$wp_customize->add_setting( 'the_standards_twitter', array(
	  'default' => 'Twitter',
	  'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'the_standards_twitter', array(
	  'type' => 'text',
	  'section' => 'social_media_section',
	  'label' => __( 'Twitter Profile URL' ),
	) );

	$wp_customize->add_setting( 'the_standards_youtube', array(
	  'default' => 'Youtube',
	  'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'the_standards_youtube', array(
	  'type' => 'text',
	  'section' => 'social_media_section',
	  'label' => __( 'Youtube Profile URL' ),
	) );

	$wp_customize->add_setting( 'the_standards_rss', array(
	  'default' => 'RSS',
	  'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'the_standards_rss', array(
	  'type' => 'text',
	  'section' => 'social_media_section',
	  'label' => __( 'RSS Feed URL' ),
	) );
	// Social Media items end

	// Contact info start
	$wp_customize->add_section( 'contact_information_section', array(
		'title' => __( 'Contact Information', 'the-standards' ),
		'priority' => 170,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'the_standards_contact_name', array(
	  'default' => 'Contact Name',
	  'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'the_standards_contact_name', array(
	  'type' => 'text',
	  'section' => 'contact_information_section',
	  'label' => __( 'Contact Name' ),
	) );

	$wp_customize->add_setting( 'the_standards_phone_number', array(
	  'default' => 'Contact Number',
	  'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'the_standards_phone_number', array(
	  'type' => 'text',
	  'section' => 'contact_information_section',
	  'label' => __( 'Contact Number' ),
	) );

	$wp_customize->add_setting( 'the_standards_email', array(
	  'default' => 'Email Address',
	  'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'the_standards_email', array(
	  'type' => 'text',
	  'section' => 'contact_information_section',
	  'label' => __( 'Email Address' ),
	) );
	// Contact info end

	// Government website checkbox start
	$wp_customize->add_setting( 'the_standards_gov_check', array(
	  'default' => 1,
	) );
	$wp_customize->add_control( 'the_standards_gov_check', array(
	  'type' => 'checkbox',
	  'section' => 'title_tagline',
	  'label' => __( 'Is this an official government website?' ),
	) );
	// Government website checkbox end
}
add_action( 'customize_register', 'the_standards_customize_register' );

/**
 * Sanitizes the incoming input and returns it prior to serialization.
 *
 * @param      string    $input    The string to sanitize
 * @return     string              The sanitized string
 * @package    digital-creative-agency
 * @since      0.5.0
 * @version    1.0.2
 */
function the_standards_sanitize_input( $input ) {
	return strip_tags( stripslashes( $input ) );
} // end the_standards_sanitize_input

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function the_standards_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function the_standards_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function the_standards_customize_preview_js() {
	wp_enqueue_script( 'the-standards-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'the_standards_customize_preview_js' );
