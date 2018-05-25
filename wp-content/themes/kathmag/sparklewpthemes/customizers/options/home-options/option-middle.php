<?php
/**
 * Customizer Options - Middle News Block
 *
 * @package Kathmag
 */

$defaults = kathmag_get_default_theme_options();

// Section - Middle News Block
$wp_customize->add_section( 'kathmag_main_news_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Middle Section Settings', 'kathmag' ),
	'panel'			=> 'kathmag_home_options'	
) );

// Middle News Elements
$wp_customize->add_setting( 'kathmag_main_news_elements', array(
	'sanitize_callback' => 'kathmag_sanitize_repeater',
	'default' => json_encode( array(
		array(
			'title' => '' ,
			'category' => '-1',
			'layout' => 'layout_one',
			'post_no' => '3',
			'enable' => 'on'
		)
	) )
));

$wp_customize->add_control( new Kathmag_Repeater_Control( $wp_customize, 'kathmag_main_news_elements', array(
	'label'   => esc_html__( 'Middle Section Elements', 'kathmag' ),
	'section' => 'kathmag_main_news_options',
	'settings' => 'kathmag_main_news_elements',
	'kathmag_box_label' => esc_html__('News Section','kathmag'),
	'kathmag_box_add_control' => esc_html__('Add News Layout','kathmag'),
	),
	array(
		'title' => array(
			'type'		  => 'text',
			'label'		  => esc_html__( 'Title', 'kathmag' ),
			'default'	  => ''
		),
		'category' => array(
			'type'        => 'multicategory',
			'label'       => esc_html__( 'Select Category', 'kathmag' ),
			'default'     => '-1'
		),				
		'layout' => array(
			'type'        => 'selector',
			'label'       => esc_html__( 'News Layouts', 'kathmag' ),
			'description' => esc_html__( 'Select the News Layout', 'kathmag' ),
			'options' 	  => kathmag_news_block_layouts(),
			'default'     => 'layout_one'
		),
		'post_no' => array(
			'type'		  => 'number',
			'label'		  => esc_html__( 'No of Posts', 'kathmag' ),
			'default'	  => '3'
		),
		'enable' => array(
			'type'        => 'switch',
			'label'       => esc_html__( 'Enable News Layout', 'kathmag' ),
			'switch' 	  => array(
				'on' 	  => esc_html__( 'Yes', 'kathmag' ),
				'off' 	  => esc_html__( 'No', 'kathmag' )
			),
			'default'     => 'on' 
		) 
) ) );