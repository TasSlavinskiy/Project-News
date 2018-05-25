<?php
/**
 * Customizer Options - Post Page
 *
 * @package Kathmag
 */

$defaults = kathmag_get_default_theme_options();

// Section - Post
$wp_customize->add_section( 'kathmag_post_page_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Single Post Options', 'kathmag' ),
	'description'	=> esc_html__( 'Configurations for single post page.', 'kathmag' ),
	'panel'			=> 'kathmag_theme_options'	
) );

// Show Post Tags
$wp_customize->add_setting( 'kathmag_enable_post_tags_cats', array(
	'sanitize_callback'		=> 'kathmag_sanitize_checkbox',
	'default'				=> $defaults['kathmag_enable_post_tags_cats'] 
) ); 

$wp_customize->add_control( 'kathmag_enable_post_tags_cats', array(
	'label'					=> esc_html__( 'Show Post Tags & Categories', 'kathmag' ),
	'section'				=> 'kathmag_post_page_option',
	'type'					=> 'checkbox'
) );

// Enable Related Posts
$wp_customize->add_setting( 'kathmag_enable_related_posts', array(
	'sanitize_callback'		=> 'kathmag_sanitize_checkbox',
	'default'				=> $defaults['kathmag_enable_related_posts'] 
) ); 

$wp_customize->add_control( 'kathmag_enable_related_posts', array(
	'label'					=> esc_html__( 'Enable Related Posts Block', 'kathmag' ),
	'section'				=> 'kathmag_post_page_option',
	'type'					=> 'checkbox'
) );

// Related Title
$wp_customize->add_setting( 'kathmag_related_posts_block_title', array(
	'sanitize_callback'		=> 'sanitize_text_field',
	'default'				=> $defaults['kathmag_related_posts_block_title'] 
) ); 

$wp_customize->add_control( 'kathmag_related_posts_block_title', array(
	'label'					=> esc_html__( 'Related Posts Block Title', 'kathmag' ),
	'section'				=> 'kathmag_post_page_option',
	'type'					=> 'text',
	'active_callback'		=> 'kathmag_is_active_related_posts',
) );

// Related Posts No
$wp_customize->add_setting( 'kathmag_related_posts_no', array(
	'sanitize_callback'		=> 'kathmag_sanitize_number',
	'default'				=> $defaults['kathmag_related_posts_no'] 
) ); 

$wp_customize->add_control( 'kathmag_related_posts_no', array(
	'label'					=> esc_html__( 'Number of Related Posts', 'kathmag' ),
	'section'				=> 'kathmag_post_page_option',
	'type'					=> 'number',
	'active_callback'		=> 'kathmag_is_active_related_posts',
) );

// Comment
$wp_customize->add_setting( 'kathmag_enable_comments', array(
	'sanitize_callback'		=> 'kathmag_sanitize_checkbox',
	'default'				=> $defaults['kathmag_enable_comments'] 
) ); 

$wp_customize->add_control( 'kathmag_enable_comments', array(
	'label'					=> esc_html__( 'Enable Comments', 'kathmag' ),
	'section'				=> 'kathmag_post_page_option',
	'type'					=> 'checkbox'
) );