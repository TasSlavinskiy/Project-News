<?php
/**
 * Customizer Options - Ticker News
 *
 * @package Kathmag
 */

$defaults = kathmag_get_default_theme_options();

// Section - Ticker
$wp_customize->add_section( 'kathmag_ticker_news_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Ticker News Options', 'kathmag' ),
	'description'	=> esc_html__( 'Configurations for ticker news', 'kathmag' ),
	'panel'			=> 'kathmag_home_options'	
) );

// Show Ticker News
$wp_customize->add_setting( 'kathmag_enable_ticker_news', array(
	'sanitize_callback'		=> 'kathmag_sanitize_checkbox',
	'default'				=> $defaults['kathmag_enable_ticker_news'] 
) ); 

$wp_customize->add_control( 'kathmag_enable_ticker_news', array(
	'label'					=> esc_html__( 'Show Ticker News', 'kathmag' ),
	'section'				=> 'kathmag_ticker_news_option',
	'type'					=> 'checkbox'
) );

// Ticker News Title
$wp_customize->add_setting( 'kathmag_ticker_news_title', array(
	'sanitize_callback'		=> 'sanitize_text_field',
	'default'				=> $defaults['kathmag_ticker_news_title'] 
) ); 

$wp_customize->add_control( 'kathmag_ticker_news_title', array(
	'label'					=> esc_html__( 'Ticker News Block Title', 'kathmag' ),
	'section'				=> 'kathmag_ticker_news_option',
	'type'					=> 'text',
	'active_callback'		=> 'kathmag_is_active_ticker_news'
) );

// Ticker News Cateogries
$wp_customize->add_setting( 'kathmag_ticker_news_cat', array(
	'sanitize_callback' => 'kathmag_sanitize_choices'
) );

$wp_customize->add_control( new Kathmag_Dropdown_Multiple_Chooser( $wp_customize, 'kathmag_ticker_news_cat', array(	
	'label'			=> esc_html__( 'Ticker News Categories', 'kathmag' ),
	'section'		=> 'kathmag_ticker_news_option',
	'choices'		=> kathmag_get_category_choices(),
	'active_callback'		=> 'kathmag_is_active_ticker_news'
) ) );

// Ticker News No
$wp_customize->add_setting( 'kathmag_ticker_news_no', array(
	'sanitize_callback'		=> 'kathmag_sanitize_number',
	'default'				=> $defaults['kathmag_ticker_news_no'] 
) ); 

$wp_customize->add_control( 'kathmag_ticker_news_no', array(
	'label'					=> esc_html__( 'Number of Ticker News', 'kathmag' ),
	'section'				=> 'kathmag_ticker_news_option',
	'type'					=> 'number',
	'active_callback'		=> 'kathmag_is_active_ticker_news'
) );

// Enable Ticker in Blog Page
$wp_customize->add_setting( 'kathmag_enable_ticker_in_blog_page', array(
	'sanitize_callback'	=> 'kathmag_sanitize_checkbox',
	'default'			=> $defaults['kathmag_enable_ticker_in_blog_page'],
) );
$wp_customize->add_control( 'kathmag_enable_ticker_in_blog_page', array(
	'label'				=> esc_html__( 'Show Ticker In Blog Page', 'kathmag' ),
	'section'			=> 'kathmag_ticker_news_option',
	'type'				=> 'checkbox' 
) );