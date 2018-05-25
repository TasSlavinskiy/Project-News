<?php
/**
 * Customizer Options - Meta
 *
 * @package Kathmag
 */


$defaults = kathmag_get_default_theme_options();


// Section - Meta
$wp_customize->add_section( 'kathmag_meta_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Post Meta Options', 'kathmag' ),
	'description'	=> esc_html__( 'Configurations of Header', 'kathmag' ),
	'panel'			=> 'kathmag_theme_options'	
) );

// Enable Post Date
$wp_customize->add_setting( 'kathmag_enable_post_date', array(
	'sanitize_callback'	=> 'kathmag_sanitize_checkbox',
	'default'			=> $defaults['kathmag_enable_post_date'],
) );

$wp_customize->add_control( 'kathmag_enable_post_date', array(
	'label'				=> esc_html__( 'Enable Post Date', 'kathmag' ),
	'section'			=> 'kathmag_meta_options',
	'type'				=> 'checkbox' 
) );

// Enable Author Name
$wp_customize->add_setting( 'kathmag_enable_author_name', array(
	'sanitize_callback'	=> 'kathmag_sanitize_checkbox',
	'default'			=> $defaults['kathmag_enable_author_name'],
) );

$wp_customize->add_control( 'kathmag_enable_author_name', array(
	'label'				=> esc_html__( 'Enable Author Name', 'kathmag' ),
	'section'			=> 'kathmag_meta_options',
	'type'				=> 'checkbox' 
) );

// Enable Comments No
$wp_customize->add_setting( 'kathmag_enable_comments_no', array(
	'sanitize_callback'	=> 'kathmag_sanitize_checkbox',
	'default'			=> $defaults['kathmag_enable_comments_no'],
) );

$wp_customize->add_control( 'kathmag_enable_comments_no', array(
	'label'				=> esc_html__( 'Enable Comments Number', 'kathmag' ),
	'section'			=> 'kathmag_meta_options',
	'type'				=> 'checkbox' 
) );