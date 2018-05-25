<?php
/**
 * Info setup
 *
 * @package Kathmag
 */

if ( ! function_exists( 'kathmag_info_setup' ) ) :

	/**
	 * Info setup.
	 *
	 * @since 1.0.0
	 */
	function kathmag_info_setup() {

		$config = array(

			// Welcome content.
			'welcome_content' => sprintf( esc_html__( '%1$s Kathmag, a free WordPress Magazine Theme, is stylish and beautiful theme suitable for creating Magazine, News, News Portal, Blog and Digital Content Publishing Websites. It is a modern theme with elegant and responsive design and is completely built on Customizer which allows you to customize theme settings easily with live previews. There are three sections in front page, Top, Middle and Bottom where different customizer block/section can be added, and dragged and dropped to arrange them in order. It has 7+ widget areas which includes Advertisement widget areas. There are 4+ widgets, which can be used in Sidebar and Footer widget areas. Kathmag is compatible with all types of devices, and is compatible with all kinds of browsers. Kathmag supports Woocommerce, Jetpack, Contact Form 7 and some social sharing plugins ! Official Support Forum: Support Full Demo : http://demo.sparklewpthemes.com/kathmag/demos/ and Docs: http://docs.sparklewpthemes.com/kathmag', 'kathmag' ), 'Kathmag' ),

			// Tabs.
			'tabs' => array(
				'getting-started' => esc_html__( 'Getting Started', 'kathmag' ),
				'support'         => esc_html__( 'Support', 'kathmag' ),
				'useful-plugins'  => esc_html__( 'Useful Plugins', 'kathmag' ),
				'demo-content'    => esc_html__( 'Demo Content', 'kathmag' ),
				'upgrade-to-pro'  => esc_html__( 'Upgrade to Pro', 'kathmag' ),
			),

			// Quick links.
			'quick_links' => array(

				'theme_url' => array(
					'text' => esc_html__( 'Theme Details', 'kathmag' ),
					'url'  => 'https://sparklewpthemes.com/wordpress-themes/kathmag/',
				),

				'demo_url' => array(
					'text' => esc_html__( 'View Demo', 'kathmag' ),
					'url'  => 'http://demo.sparklewpthemes.com/kathmag/demos/',
				),

				'documentation_url' => array(
					'text' => esc_html__( 'View Documentation', 'kathmag' ),
					'url'  => 'http://docs.sparklewpthemes.com/kathmagpro/',
				),

				'rating_url' => array(
					'text' => esc_html__( 'Rate This Theme','kathmag' ),
					'url'  => 'https://wordpress.org/support/theme/kathmag/reviews/#new-post',
				),

				'upgrade_to_pro' => array(
					'text' => esc_html__( 'Buy Pro Themes','kathmag' ),
					'url'  => 'https://sparklewpthemes.com/wordpress-themes/kathmagpro/',
				)

			),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__( 'Theme Documentation', 'kathmag' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'kathmag' ),
					'button_text' => esc_html__( 'View Documentation', 'kathmag' ),
					'button_url'  => 'http://docs.sparklewpthemes.com/kathmagpro/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Static Front Page', 'kathmag' ),
					'icon'        => 'dashicons dashicons-admin-generic',
					'description' => esc_html__( 'To achieve custom home page other than blog listing, you need to create and set static front page.', 'kathmag' ),
					'button_text' => esc_html__( 'Static Front Page', 'kathmag' ),
					'button_url'  => admin_url( 'customize.php?autofocus[section]=kathmag_enable_front_page' ),
					'button_type' => 'primary',
					),
				'three' => array(
					'title'       => esc_html__( 'Theme Options', 'kathmag' ),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'kathmag' ),
					'button_text' => esc_html__( 'Customize', 'kathmag' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				'five' => array(
					'title'       => esc_html__( 'Demo Content', 'kathmag' ),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf( esc_html__( 'To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'kathmag' ), esc_html__( 'One Click Demo Import', 'kathmag' ) ),
					'button_text' => esc_html__( 'Demo Content', 'kathmag' ),
					'button_url'  => admin_url( 'themes.php?page=kathmag-info&tab=demo-content' ),
					'button_type' => 'secondary',
					)
				),

			// Support.
			'support' => array(
				'one' => array(
					'title'       => esc_html__( 'Contact Support', 'kathmag' ),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'kathmag' ),
					'button_text' => esc_html__( 'Contact Support', 'kathmag' ),
					'button_url'  => 'https://sparklewpthemes.com/support/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Theme Documentation', 'kathmag' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'kathmag' ),
					'button_text' => esc_html__( 'View Documentation', 'kathmag' ),
					'button_url'  => 'http://docs.sparklewpthemes.com/kathmagpro/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'three' => array(
					'title'       => esc_html__( 'Child Theme', 'kathmag' ),
					'icon'        => 'dashicons dashicons-admin-tools',
					'description' => esc_html__( 'For advanced theme customization, it is recommended to use child theme rather than modifying the theme file itself. Using this approach, you wont lose the customization after theme update.', 'kathmag' ),
					'button_text' => esc_html__( 'Learn More', 'kathmag' ),
					'button_url'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				),

			// Useful plugins.
			'useful_plugins' => array(
				'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'kathmag' ),
				),

			// Demo content.
			'demo_content' => array(
				'description' => sprintf( esc_html__( 'To import demo content for this theme, %1$s plugin is needed. Please make sure plugin is installed and activated. After plugin is activated, you will see Import Demo Data menu under Appearance.', 'kathmag' ), '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'kathmag' ) . '</a>' ),
				),

			// Upgrade content.
			'upgrade_to_pro' => array(
				'description' => esc_html__( 'If you want more advanced features then you can upgrade to the premium version of the theme.', 'kathmag' ),
				'button_text' => esc_html__( 'Buy Pro Themes', 'kathmag' ),
				'button_url'  => 'https://sparklewpthemes.com/wordpress-themes/kathmagpro/',
				'button_type' => 'primary',
				'is_new_tab'  => true,
				),
			);

		Kathmag::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'kathmag_info_setup' );
