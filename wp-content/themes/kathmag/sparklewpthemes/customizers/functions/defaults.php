<?php
/**
 * Default Options.
 *
 * @package Kathmag
 */

if ( ! function_exists( 'kathmag_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function kathmag_get_option( $key ) {

		if ( empty( $key ) ) {
			return;
		}

		$value = '';

		$default = kathmag_get_default_theme_options();

		$default_value = null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {
			$default_value = $default[ $key ];
		}

		if ( null !== $default_value ) {
			$value = get_theme_mod( $key, $default_value );
		}
		else {
			$value = get_theme_mod( $key );
		}

		return $value;

	}

endif;

if ( ! function_exists( 'kathmag_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function kathmag_get_default_theme_options() {

		$defaults = array();

		// Front page Option
		$defaults['kathmag_enable_front_page']			= 0;

		// Header
		$defaults['kathmag_enable_top_header']			= 1;
		$defaults['kathmag_enable_search_button']		= 1;

		// Ticker News
		$defaults['kathmag_enable_ticker_news']			= 1;
		$defaults['kathmag_ticker_news_title']			= esc_html__( 'Breaking News', 'kathmag' );
		$defaults['kathmag_ticker_news_cat']			= 0;
		$defaults['kathmag_ticker_news_no']				= 5;
		$defaults['kathmag_enable_ticker_in_blog_page'] = 1;

		// Front Page Banner
		$defaults['kathmag_enable_banner_in_blog_page'] = 1;

		// Front Page Sidebar
		$defaults['kathmag_front_page_sidebar']			= 'right';

		// Post Page
		$defaults['kathmag_enable_post_tags_cats']		= 1;
		$defaults['kathmag_enable_related_posts']		= 1;
		$defaults['kathmag_related_posts_block_title']	= esc_html__( 'Related Posts', 'kathmag' );
		$defaults['kathmag_related_posts_no']			= 5;
		$defaults['kathmag_enable_comments']			= 1;		

		// Archive Page
		$defaults['kathmag_archive_sidebar']			= 'right';
		$defaults['kathmag_excerpt_length']				= 25;

		// Social Links
		$defaults['kathmag_facebook_link']				= '#';
		$defaults['kathmag_twitter_link']				= '';
		$defaults['kathmag_instagram_link']				= '';
		$defaults['kathmag_google_plus_link']			= '';
		$defaults['kathmag_linkedin_link']				= '';
		$defaults['kathmag_youtube_link']				= '';
		$defaults['kathmag_pinterest_link']				= '';
		$defaults['kathmag_vimeo_link']					= '';

		// Meta
		$defaults['kathmag_enable_post_date']			= 1;
		$defaults['kathmag_enable_author_name']			= 1;
		$defaults['kathmag_enable_comments_no']			= 1;

		// Breadcrumb
		$defaults['kathmag_enable_breadcrumb']			= 1;

		// Footer Bottom
		$defaults['kathmag_enable_footer_bottom']		= 1;
		$defaults['kathmag_enable_scroll_top_button']	= 1;
		$defaults['kathmag_copyright_text']				= '';

		return $defaults;
	}

endif;



