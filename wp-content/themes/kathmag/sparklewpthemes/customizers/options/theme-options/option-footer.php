<?php
/**
 * Customizer Options - Footer
 *
 * @package Kathmag
 */

$defaults = kathmag_get_default_theme_options();


// Section - Footer
$wp_customize->add_section( 'kathmag_footer_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Footer Options', 'kathmag' ),
	'description'	=> esc_html__( 'Configurations of Footer', 'kathmag' ),
	'panel'			=> 'kathmag_theme_options'	
) );

// Enable Bottom Footer
$wp_customize->add_setting( 'kathmag_enable_footer_bottom', array(
	'sanitize_callback'	=> 'kathmag_sanitize_checkbox',
	'default'			=> $defaults['kathmag_enable_footer_bottom'],
) );
$wp_customize->add_control( 'kathmag_enable_footer_bottom', array(
	'label'				=> esc_html__( 'Enable Bottom Footer', 'kathmag' ),
	'section'			=> 'kathmag_footer_options',
	'type'				=> 'checkbox' 
) );

// Enable Scroll Top Button
$wp_customize->add_setting( 'kathmag_enable_scroll_top_button', array(
	'sanitize_callback'	=> 'kathmag_sanitize_checkbox',
	'default'			=> $defaults['kathmag_enable_scroll_top_button'],
) );
$wp_customize->add_control( 'kathmag_enable_scroll_top_button', array(
	'label'				=> esc_html__( 'Enable Scroll Top Button', 'kathmag' ),
	'section'			=> 'kathmag_footer_options',
	'type'				=> 'checkbox' 
) );

// Copyright Text
$wp_customize->add_setting( 'kathmag_copyright_text', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['kathmag_copyright_text'],
) );
$wp_customize->add_control( 'kathmag_copyright_text', array(
	'label'				=> esc_html__( 'Copyright Text', 'kathmag' ),
	'section'			=> 'kathmag_footer_options',
	'type'				=> 'text',
	'active_callback'	=> 'kathmag_is_active_bottom_footer' 
) );