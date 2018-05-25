<?php
/**
 * Customizer Options - Bottom News Block
 *
 * @package Kathmag
 */

$defaults = kathmag_get_default_theme_options();


// Section - Bottom
$wp_customize->add_section( 'kathmag_bottom_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Bottom Section Settings', 'kathmag' ),
	'panel'			=> 'kathmag_home_options'	
) );


// Bottom News Elements
$wp_customize->add_setting( 'kathmag_bottom_elements', array(
	'sanitize_callback' => 'kathmag_sanitize_repeater',
	'default' => json_encode( array(
		array(
			'category' => '-1',
			'layout' => 'layout_one',
			'post_no' => '3',
			'enable' => 'on'
		)
	) )
));

$wp_customize->add_control( new Kathmag_Repeater_Control( $wp_customize, 'kathmag_bottom_elements', array(
	'label'   => esc_html__( 'Bottom Section Elements', 'kathmag' ),
	'section' => 'kathmag_bottom_options',
	'settings' => 'kathmag_bottom_elements',
	'kathmag_box_label' => esc_html__('News Section','kathmag'),
	'kathmag_box_add_control' => esc_html__('Add News Layout','kathmag'),
	),
	array(
		'title_one' => array(
			'type'		  => 'text',
			'label'		  => esc_html__( 'Title', 'kathmag' ),
			'default'	  => '',
			'class'		  => 'kathmag-bottom-news-block-title-one'
		),
		'category_one' => array(
			'type'        => 'category',
			'label'       => esc_html__( 'Category', 'kathmag' ),
			'default'     => '-1',
			'class'       => 'kathmag-bottom-news-block-cat-one'
		),
		'title_two' => array(
			'type'		  => 'text',
			'label'		  => esc_html__( 'Title', 'kathmag' ),
			'default'	  => '',
			'class'		  => 'kathmag-bottom-news-block-title-two'
		),
		'category_two' => array(
			'type'        => 'category',
			'label'       => esc_html__( 'Category', 'kathmag' ),
			'default'     => '-1',
			'class'       => 'kathmag-bottom-news-block-cat-two'
		),	
		'title_three' => array(
			'type'		  => 'text',
			'label'		  => esc_html__( 'Title', 'kathmag' ),
			'default'	  => '',
			'class'		  => 'kathmag-bottom-news-block-title-three'
		),
		'category_three' => array(
			'type'        => 'category',
			'label'       => esc_html__( 'Category', 'kathmag' ),
			'default'     => '-1',
			'class'       => 'kathmag-bottom-news-block-cat-three'
		),						
		'layout' => array(
			'type'        => 'selector',
			'label'       => esc_html__( 'Bottom News Layouts', 'kathmag' ),
			'description' => esc_html__( 'Select News Layout', 'kathmag' ),
			'options' 	  => kathmag_bottom_news_block_layouts(),
			'default'     => 'layout_one',
			'class'		  => 'kathmag_bottom_news_layout',
		),
		'post_no' => array(
			'type'		  => 'number',
			'label'		  => esc_html__( 'No of Posts', 'kathmag' ),
			'default'	  => '3',
			'class'		  => 'kathmag_banner_post_no',
		),
		'enable' => array(
			'type'        => 'switch',
			'label'       => esc_html__( 'Enable Banner Layout', 'kathmag' ),
			'switch' 	  => array(
				'on' 		  => esc_html__( 'Yes', 'kathmag' ),
				'off' 		  => esc_html__( 'No', 'kathmag' )
			),
			'default'=> 'on'
		)
) ) );