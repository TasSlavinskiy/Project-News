<?php
/**
 * Widget - Initialization
 *
 * @package Kathmag

 */
/**
 * Load Widgets File
 */
require get_template_directory() . '/sparklewpthemes/theme-widgets/widgets/widget-author.php';
require get_template_directory() . '/sparklewpthemes/theme-widgets/widgets/widget-recent.php';
require get_template_directory() . '/sparklewpthemes/theme-widgets/widgets/widget-social.php';
require get_template_directory() . '/sparklewpthemes/theme-widgets/widgets/widget-slider.php';

if( !function_exists( 'kathmag_register_widgets' ) ) {
	/*
	 * Function to register widgets
	 */
	function kathmag_register_widgets() {
		/*
		 * Register Author Widget
		 */
		register_widget( 'Kathmag_Author_Widget' );

		/*
		 * Register Recent Posts Widget
		 */
		register_widget( 'Kathmag_Recent_Posts_Widget' );

		/*
		 * Register Social Links Widget
		 */
		register_widget( 'Kathmag_Social_Widget' );
		
		/*
		 * Register Slider Post Widget
		 */
		register_widget( 'Kathmag_Recent_Slider_Post_Widget' );
	}
}
add_action( 'widgets_init', 'kathmag_register_widgets' );