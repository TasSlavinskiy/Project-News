<?php
/**
 * Customizer Options - Home Sidebar
 *
 * @package Kathmag
 */

$defaults = kathmag_get_default_theme_options();

// Section - Sidebar
$wp_customize->add_section( 'kathmag_front_sidebar_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Front Page Sidebar Options', 'kathmag' ),
	'panel'			=> 'kathmag_home_options',	
) );

// Sidebar Position
$wp_customize->add_setting( 'kathmag_front_page_sidebar', array(
	'sanitize_callback'	=> 'kathmag_sanitize_select',
	'default'			=> $defaults['kathmag_front_page_sidebar'],
) );
$wp_customize->add_control( 'kathmag_front_page_sidebar', array(
	'label'				=> esc_html__( 'Sidebar Position', 'kathmag' ),
	'section'			=> 'kathmag_front_sidebar_options',
	'type'				=> 'radio',
	'choices'			=> kathmag_frontpage_sidebar_position(), 
) );
