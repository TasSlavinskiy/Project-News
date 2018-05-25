<?php
/**
 * Customizer Options - Home
 *
 * @package Kathmag
 */

$defaults = kathmag_get_default_theme_options();

// Section - Home
$wp_customize->add_section( 'kathmag_front_page_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Enable Front Page', 'kathmag' ),
	'panel'			=> 'kathmag_home_options'	
) );

// Display Front Page Layout
$wp_customize->add_setting( 'kathmag_enable_front_page', array(
	'sanitize_callback'	=> 'kathmag_sanitize_checkbox',
	'default'			=> $defaults['kathmag_enable_front_page'],
) );

$wp_customize->add_control( 'kathmag_enable_front_page', array(
	'label'				=> esc_html__( 'Enable Front Page', 'kathmag' ),
	'section'			=> 'kathmag_front_page_option',
	'type'				=> 'checkbox', 
) );