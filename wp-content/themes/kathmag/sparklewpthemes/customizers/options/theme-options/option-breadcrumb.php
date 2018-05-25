<?php
/**
 * Customizer Options - Breadcrumb
 *
 * @package Kathmag
 */


$defaults = kathmag_get_default_theme_options();


// Section - Breadcrumb
$wp_customize->add_section( 'kathmag_breadcrumb_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Breadcrumb Options', 'kathmag' ),
	'description'	=> esc_html__( 'Configurations of Breadcrumb', 'kathmag' ),
	'panel'			=> 'kathmag_theme_options'	
) );

// Enable Breadcrumb
$wp_customize->add_setting( 'kathmag_enable_breadcrumb', array(
	'sanitize_callback'	=> 'kathmag_sanitize_checkbox',
	'default'			=> $defaults['kathmag_enable_breadcrumb'],
) );

$wp_customize->add_control( 'kathmag_enable_breadcrumb', array(
	'label'				=> esc_html__( 'Enable Breadcrumb', 'kathmag' ),
	'section'			=> 'kathmag_breadcrumb_options',
	'type'				=> 'checkbox' 
) );