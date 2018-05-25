<?php
/**
 * Customizer Options - Banner Posts
 *
 * @package Kathmag
 */

$defaults = kathmag_get_default_theme_options();


// Section - Banner
$wp_customize->add_section( 'kathmag_banner_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Top Section Settings', 'kathmag' ),
	'panel'			=> 'kathmag_home_options'	
) );

// Enable Banner in Blog Page
$wp_customize->add_setting( 'kathmag_enable_banner_in_blog_page', array(
	'sanitize_callback'	=> 'kathmag_sanitize_checkbox',
	'default'			=> $defaults['kathmag_enable_banner_in_blog_page'],
) );
$wp_customize->add_control( 'kathmag_enable_banner_in_blog_page', array(
	'label'				=> esc_html__( 'Show Banner In Blog Page', 'kathmag' ),
	'section'			=> 'kathmag_banner_options',
	'type'				=> 'checkbox' 
) );

// Banner Elements
$wp_customize->add_setting( 'kathmag_banner_elements', array(
	'sanitize_callback' => 'kathmag_sanitize_repeater',
	'default' => json_encode( array(
		array(
			'category' => '-1',
			'layout' => 'layout_one',
			'post_no' => '5',
			'enable' => 'on'
		)
	) )
));

$wp_customize->add_control( new Kathmag_Repeater_Control( $wp_customize, 'kathmag_banner_elements', array(
	'label'   => esc_html__( 'Top Section Elements', 'kathmag' ),
	'description' => esc_html__( 'Top Section is visible in both front page and blog page.', 'kathmag' ),
	'section' => 'kathmag_banner_options',
	'settings' => 'kathmag_banner_elements',
	'kathmag_box_label' => esc_html__('Banner Section','kathmag'),
	'kathmag_box_add_control' => esc_html__('Add Banner','kathmag'),
	),
	array(
		'category' => array(
			'type'        => 'multicategory',
			'label'       => esc_html__( 'Select Category', 'kathmag' ),
			'default'     => '-1'
		),				
		'layout' => array(
			'type'        => 'selector',
			'label'       => esc_html__( 'Banner Layouts', 'kathmag' ),
			'description' => esc_html__( 'Select Banner Layout', 'kathmag' ),
			'options' 	  => kathmag_banner_layouts(),
			'default'     => 'layout_one',
			'class' 	  => 'kathmag_banner_layout',
		),
		'post_no' => array(
			'type'		  => 'number',
			'label'		  => esc_html__( 'No of Posts', 'kathmag' ),
			'default'	  => '5',
			'class'		  => 'kathmag_banner_post_no',
		),
		'enable' => array(
			'type'        => 'switch',
			'label'       => esc_html__( 'Enable Banner Layout', 'kathmag' ),
			'switch' 	  => array(
				'on' 	  => esc_html__( 'Yes', 'kathmag' ),
				'off' 	  => esc_html__( 'No', 'kathmag' )
			),
			'default'     => 'on' 
		) 
) ) );