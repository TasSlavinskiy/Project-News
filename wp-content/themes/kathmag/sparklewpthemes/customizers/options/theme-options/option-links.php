<?php
/**
 * Customizer Options - Links
 *
 * @package Kathmag
 */

$defaults = kathmag_get_default_theme_options();

// Section - Social Links
$wp_customize->add_section( 'kathmag_links_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Social Links', 'kathmag' ),
	'panel'			=> 'kathmag_theme_options'	
) );

// Facebook Link
$wp_customize->add_setting( 'kathmag_facebook_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['kathmag_facebook_link'],
) );

$wp_customize->add_control( 'kathmag_facebook_link', array(
	'label'				=> esc_html__( 'Facebook Link', 'kathmag' ),
	'section'			=> 'kathmag_links_options',
	'type'				=> 'url', 
) );

// Twitter Link
$wp_customize->add_setting( 'kathmag_twitter_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['kathmag_twitter_link'],
) );

$wp_customize->add_control( 'kathmag_twitter_link', array(
	'label'				=> esc_html__( 'Twitter Link', 'kathmag' ),
	'section'			=> 'kathmag_links_options',
	'type'				=> 'url', 
) );

// Google Plus Link
$wp_customize->add_setting( 'kathmag_google_plus_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['kathmag_google_plus_link'],
) );

$wp_customize->add_control( 'kathmag_google_plus_link', array(
	'label'				=> esc_html__( 'Google Plus Link', 'kathmag' ),
	'section'			=> 'kathmag_links_options',
	'type'				=> 'url', 
) );

// Instagram Link
$wp_customize->add_setting( 'kathmag_instagram_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['kathmag_instagram_link'],
) );

$wp_customize->add_control( 'kathmag_instagram_link', array(
	'label'				=> esc_html__( 'Instagram Link', 'kathmag' ),
	'section'			=> 'kathmag_links_options',
	'type'				=> 'url', 
) );

// Linkedin Link
$wp_customize->add_setting( 'kathmag_linkedin_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['kathmag_linkedin_link'],
) );

$wp_customize->add_control( 'kathmag_linkedin_link', array(
	'label'				=> esc_html__( 'Linkedin Link', 'kathmag' ),
	'section'			=> 'kathmag_links_options',
	'type'				=> 'url', 
) );

// Pinterest Link
$wp_customize->add_setting( 'kathmag_pinterest_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['kathmag_pinterest_link'],
) );

$wp_customize->add_control( 'kathmag_pinterest_link', array(
	'label'				=> esc_html__( 'Pinterest Link', 'kathmag' ),
	'section'			=> 'kathmag_links_options',
	'type'				=> 'url', 
) );

// Youtube Link
$wp_customize->add_setting( 'kathmag_youtube_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['kathmag_youtube_link'],
) );

$wp_customize->add_control( 'kathmag_youtube_link', array(
	'label'				=> esc_html__( 'Youtube Link', 'kathmag' ),
	'section'			=> 'kathmag_links_options',
	'type'				=> 'url', 
) );

// Vimeo Link
$wp_customize->add_setting( 'kathmag_vimeo_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['kathmag_vimeo_link'],
) );

$wp_customize->add_control( 'kathmag_vimeo_link', array(
	'label'				=> esc_html__( 'Vimeo Link', 'kathmag' ),
	'section'			=> 'kathmag_links_options',
	'type'				=> 'url', 
) );