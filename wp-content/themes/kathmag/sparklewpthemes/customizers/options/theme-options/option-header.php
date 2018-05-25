<?php
/**
 * Customizer Options - Header
 *
 * @package Kathmag
 */

$defaults = kathmag_get_default_theme_options();

// Section - Header
$wp_customize->add_section( 'kathmag_header_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Header Options ', 'kathmag' ),
	'description'	=> esc_html__( 'Configurations of Header', 'kathmag' ),
	'panel'			=> 'kathmag_theme_options'	
) );

// Enable Top Header
$wp_customize->add_setting( 'kathmag_enable_top_header', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['kathmag_enable_top_header'],
) );
$wp_customize->add_control( 'kathmag_enable_top_header', array(
	'label'				=> esc_html__( 'Enable Top Header', 'kathmag' ),
	'section'			=> 'kathmag_header_options',
	'type'				=> 'checkbox' 
) );

// Enable Search Button
$wp_customize->add_setting( 'kathmag_enable_search_button', array(
	'sanitize_callback'	=> 'kathmag_sanitize_checkbox',
	'default'			=> $defaults['kathmag_enable_search_button'],
) );
$wp_customize->add_control( 'kathmag_enable_search_button', array(
	'label'				=> esc_html__( 'Enable Search Button', 'kathmag' ),
	'section'			=> 'kathmag_header_options',
	'type'				=> 'checkbox' 
) );