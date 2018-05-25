<?php
/**
 * Customizer Options Links
 *
 * @package Kathmag
 */

$wp_customize->add_panel( 'kathmag_theme_options', array(
	'title'			=> esc_html__( 'Theme Options', 'kathmag' ),
	'description'	=> esc_html__( 'Spark Construction Theme Options', 'kathmag' ),
	'priority'		=> 10	
) );

$wp_customize->add_panel( 'kathmag_home_options', array(
	'title'			=> esc_html__( 'Front Page Options', 'kathmag' ),
	'description'	=> esc_html__( 'Spark Construction Customization Options', 'kathmag' ),
	'priority'		=> 10	
) );


// Home
require get_theme_file_path( 'sparklewpthemes/customizers/options/home-options/option-home.php' );
// Home-Ticker
require get_theme_file_path( 'sparklewpthemes/customizers/options/home-options/option-ticker.php' );
// Home-Top
require get_theme_file_path( 'sparklewpthemes/customizers/options/home-options/option-top.php' );
// Home-Middle
require get_theme_file_path( 'sparklewpthemes/customizers/options/home-options/option-middle.php' );
// Home-Bottom
require get_theme_file_path( 'sparklewpthemes/customizers/options/home-options/option-bottom.php' );
// Home-Sidebar
require get_theme_file_path( 'sparklewpthemes/customizers/options/home-options/option-sidebar.php' );

// Header
require get_theme_file_path( 'sparklewpthemes/customizers/options/theme-options/option-header.php' );
// Footer
require get_theme_file_path( 'sparklewpthemes/customizers/options/theme-options/option-footer.php' );
// Archive Post
require get_theme_file_path( 'sparklewpthemes/customizers/options/theme-options/option-archive.php' );
// Single Post
require get_theme_file_path( 'sparklewpthemes/customizers/options/theme-options/option-post.php' );
// Meta
require get_theme_file_path( 'sparklewpthemes/customizers/options/theme-options/option-meta.php' );
// Breadcrumb
require get_theme_file_path( 'sparklewpthemes/customizers/options/theme-options/option-breadcrumb.php' );
// Links
require get_theme_file_path( 'sparklewpthemes/customizers/options/theme-options/option-links.php' );
// Others
require get_theme_file_path( 'sparklewpthemes/customizers/options/theme-options/option-others.php' );