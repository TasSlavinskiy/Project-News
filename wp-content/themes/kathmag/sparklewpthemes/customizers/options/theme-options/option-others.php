<?php
/**
 * Customizer Options - Others
 *
 * @package Kathmag
 */

$defaults = kathmag_get_default_theme_options();

// Section - Archive
$wp_customize->add_section( 'kathmag_other_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Miscellaneous', 'kathmag' ),
	'panel'			=> 'kathmag_theme_options'	
) );

// Excerpt Length
$wp_customize->add_setting( 'kathmag_excerpt_length', array(
	'sanitize_callback'	=> 'kathmag_sanitize_number',
	'default'			=> $defaults['kathmag_excerpt_length'],
) );

$wp_customize->add_control( 'kathmag_excerpt_length', array(
	'label'				=> esc_html__( 'Excerpt Length', 'kathmag' ),
	'description'		=> esc_html__( 'Set the length of short content displayed in post', 'kathmag' ),
	'section'			=> 'kathmag_other_options',
	'type'				=> 'number', 
) );