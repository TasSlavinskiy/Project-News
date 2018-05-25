<?php
/**
 * Customizer Options - Archive Page
 *
 * @package Kathmag
 */

$defaults = kathmag_get_default_theme_options();

// Section - Archive
$wp_customize->add_section( 'kathmag_archive_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Archive Page Options', 'kathmag' ),
	'description'	=> esc_html__( 'The options are affective on all archive pages such as blog, search, archive etc...', 'kathmag' ),
	'panel'			=> 'kathmag_theme_options'	
) );

// Sidebar Position
$wp_customize->add_setting( 'kathmag_archive_sidebar', array(
	'sanitize_callback'	=> 'kathmag_sanitize_select',
	'default'			=> $defaults['kathmag_archive_sidebar'],
) );

$wp_customize->add_control( 'kathmag_archive_sidebar', array(
	'label'				=> esc_html__( 'Sidebar Position', 'kathmag' ),
	'section'			=> 'kathmag_archive_options',
	'type'				=> 'radio', 
	'choices'			=> kathmag_sidebar_position(),
) );