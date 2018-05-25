<?php
/**
 * Kathmag Theme Customizer Options
 *
 * @package Kathmag
 */

if( !function_exists( 'kathmag_get_pages' ) ) :
	/*
	 * Function to get pages
	 */
	function kathmag_get_pages() {

		$pages  =  get_pages();
		$page_list = array();
		$page_list[0] = esc_html__( 'Select Page', 'kathmag' );

		foreach( $pages as $page ){
			$page_list[ $page->ID ] = $page->post_title;
		}

		return $page_list;

	}
endif;

if( !function_exists( 'kathmag_get_category_choices' ) ) :
	/*
	 * Function to get categories
	 */
	function kathmag_get_category_choices() {
		$categories = get_terms( 'category' );
		$cat = array();

		foreach( $categories as $category ) {
			$cat[$category->term_id] = $category->name;
		}

		return $cat;
	}
endif;

if( !function_exists( 'kathmag_banner_layouts' ) ) {
	/*
	 * Function to get layouts of top section of home
	 */
	function kathmag_banner_layouts() {
		$banner_layouts = array(
			'layout_one' => get_template_directory_uri() . '/sparklewpthemes/customizers/assets/img/news-block-1.png', 
			'layout_two' => get_template_directory_uri() . '/sparklewpthemes/customizers/assets/img/news-block-2.png', 
			'layout_three' => get_template_directory_uri() . '/sparklewpthemes/customizers/assets/img/news-block-3.png', 
		);

		return $banner_layouts;
	}
}

if( !function_exists( 'kathmag_news_block_layouts' ) ) {
	/*
	 * Function to get layouts of news block of home
	 */
	function kathmag_news_block_layouts() {
		$middle_news_layouts = array(
			'layout_one' => get_template_directory_uri() . '/sparklewpthemes/customizers/assets/img/news-block-6.png', 
			'layout_two' => get_template_directory_uri() . '/sparklewpthemes/customizers/assets/img/news-block-7.png', 
			'layout_three' => get_template_directory_uri() . '/sparklewpthemes/customizers/assets/img/news-block-11.png', 
			'layout_four' => get_template_directory_uri() . '/sparklewpthemes/customizers/assets/img/news-block-12.png',
			'layout_five' => get_template_directory_uri() . '/sparklewpthemes/customizers/assets/img/news-block-8.png',
			'layout_six' => get_template_directory_uri() . '/sparklewpthemes/customizers/assets/img/news-block-9.png',
		);

		return $middle_news_layouts;
	}
}

if( !function_exists( 'kathmag_bottom_news_block_layouts' ) ) {
	/*
	 * Function to get layouts of news block of home
	 */
	function kathmag_bottom_news_block_layouts() {
		$bottom_news_layouts = array(
			'layout_one' => get_template_directory_uri() . '/sparklewpthemes/customizers/assets/img/news-block-14.png', 
			'layout_two' => get_template_directory_uri() . '/sparklewpthemes/customizers/assets/img/news-block-15.png', 
			'layout_three' => get_template_directory_uri() . '/sparklewpthemes/customizers/assets/img/news-block-16.png',
		);

		return $bottom_news_layouts;
	}
}

if( !function_exists( 'kathmag_frontpage_sidebar_position' ) ) {
	/*
	 * Function to get sidebar position
	 */
	function kathmag_frontpage_sidebar_position() {
		$sidebar_choices = array(
			'left' => esc_html__( 'Left', 'kathmag' ),
			'right' => esc_html__( 'Right', 'kathmag' ),
		);

		return $sidebar_choices;
	}
}

if( !function_exists( 'kathmag_sidebar_position' ) ) {
	/*
	 * Function to get sidebar position
	 */
	function kathmag_sidebar_position() {
		$sidebar_choices = array(
			'left' => esc_html__( 'Left', 'kathmag' ),
			'right' => esc_html__( 'Right', 'kathmag' ),
			'none' => esc_html__( 'None', 'kathmag' )
		);

		return $sidebar_choices;
	}
}

