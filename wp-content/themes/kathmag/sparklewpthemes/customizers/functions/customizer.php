<?php
/**
 * Kathmag Theme Customizer
 *
 * @package Kathmag
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kathmag_customize_register( $wp_customize ) {

	// Dropdown Category Class
	require get_theme_file_path( 'sparklewpthemes/customizers/functions/controls.php' );

	// Sanitization Callback
	require get_theme_file_path( 'sparklewpthemes/customizers/functions/sanitize.php' );

	// Customization Options
	require get_theme_file_path( 'sparklewpthemes/customizers/options/option-init.php' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'custom_logo' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {

		$wp_customize->selective_refresh->add_partial( 'custom_logo', array(
			'selector'        => '.custom-logo-link',
			'render_callback' => '_return_false',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'kathmag_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'kathmag_customize_partial_blogdescription',
		) );
	}

}
add_action( 'customize_register', 'kathmag_customize_register' );

/**
 * Load active callback functions
 */
require get_theme_file_path( 'sparklewpthemes/customizers/functions/active.php' );

/**
 * Load choices used in customizer options
 */
require get_theme_file_path( 'sparklewpthemes/customizers/functions/choices.php' );

/**
 * Load default values of customizer options
 */
require get_theme_file_path( 'sparklewpthemes/customizers/functions/defaults.php' );

/**
 * Load yynamic CSS
 */
require get_theme_file_path( 'sparklewpthemes/customizers/functions/dynamic.php' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function kathmag_customize_partial_blogname() {

	bloginfo( 'name' );

}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function kathmag_customize_partial_blogdescription() {

	bloginfo( 'description' );

}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kathmag_customize_preview_js() {

	wp_enqueue_script( 'kathmag-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20180319', true );

}
add_action( 'customize_preview_init', 'kathmag_customize_preview_js' );

/**
 * Enqueue Styles and Scripts for admin panel
 */
function kathmag_enqueue_admin_scripts() {

	wp_enqueue_style( 'chosen', get_template_directory_uri() . '/sparklewpthemes/customizers/assets/css/chosen.css' );	

	wp_enqueue_style( 'kathmag-custom-style', get_template_directory_uri() . '/sparklewpthemes/customizers/assets/css/custom-style.css' );

	wp_enqueue_script( 'chosen', get_template_directory_uri() . '/sparklewpthemes/customizers/assets/js/chosen.js', array('jquery'), '1.8.3', true );	

	wp_enqueue_script( 'kathmag-custom-script', get_template_directory_uri() . '/sparklewpthemes/customizers/assets/js/custom-script.js', array('jquery'), '20180319', true );	
}
add_action( 'customize_controls_enqueue_scripts', 'kathmag_enqueue_admin_scripts' );
