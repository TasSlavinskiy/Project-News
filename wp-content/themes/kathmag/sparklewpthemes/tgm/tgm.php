<?php
/**
 * Recommended plugins
 *
 * @package Kathmag
 */

if ( ! function_exists( 'kathmag_recommended_plugins' ) ) :

	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function kathmag_recommended_plugins() {

		$plugins = array(
			array(
				'name' => 'AccessPress Social Counter',
				'slug' => 'accesspress-social-counter',
				'required' => false,
            ),
            array(
				'name' => 'AccessPress Social Share',
				'slug' => 'accesspress-social-share',
				'required' => false,
            ),
			array(
				'name'     => esc_html__( 'Contact Form 7', 'kathmag' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			),
			array(
	            'name' => 'Easy Google Fonts',
	            'slug' => 'easy-google-fonts',
	            'required' => false,
            ),
			array(
				'name'     => esc_html__( 'WooCommerce', 'kathmag' ),
				'slug'     => 'woocommerce',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'One Click Demo Import', 'kathmag' ),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			),
		);

		tgmpa( $plugins );

	}

endif;

add_action( 'tgmpa_register', 'kathmag_recommended_plugins' );
