<?php
/**
 * Customizer - Active Callback Functions
 *
 * @package Kathmag
 */

if( ! function_exists( 'kathmag_is_active_related_posts' ) ) {

	function kathmag_is_active_related_posts( $control ) {
		if( $control->manager->get_setting( 'kathmag_enable_related_posts' )->value() == true ) {
			return true;
		} else {
			return false;
		}
	}
}

if( ! function_exists( 'kathmag_is_active_ticker_news' ) ) {

	function kathmag_is_active_ticker_news( $control ) {
		if( $control->manager->get_setting( 'kathmag_enable_ticker_news' )->value() == true ) {
			return true;
		} else {
			return false;
		}
	}
}

if( ! function_exists( 'kathmag_is_active_bottom_footer' ) ) {

	function kathmag_is_active_bottom_footer( $control ) {
		if( $control->manager->get_setting( 'kathmag_enable_footer_bottom' )->value() == true ) {
			return true;
		} else {
			return false;
		}
	}
}