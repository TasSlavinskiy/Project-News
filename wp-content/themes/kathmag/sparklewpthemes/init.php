<?php
/**
 * Main Custom admin functions area
 *
 * @since SparkleThemes
 *
 * @param Kathmag
 *
 */


/**
 * Custom functions that act independently of the theme header.
*/
require get_theme_file_path('sparklewpthemes/core/custom-header.php');

/**
 * Custom functions that act independently of the theme templates.
*/
require get_theme_file_path('sparklewpthemes/core/template-functions.php');

/**
 * Custom template tags for this theme.
*/
require get_theme_file_path('sparklewpthemes/core/template-tags.php');

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {

   require get_theme_file_path('sparklewpthemes/core/jetpack.php');

}

/**
* Load WooCommerce compatibility file.
*/
if ( class_exists( 'WooCommerce' ) ) {

	require get_theme_file_path('sparklewpthemes/woocommerce.php');

}


/**
 * Load Customizer Additions File.
*/
require get_theme_file_path('sparklewpthemes/customizers/functions/customizer.php');


/**
 * Load breadcrumb File
 */
require get_theme_file_path('sparklewpthemes/third-party/breadcrumbs.php');


/**
 * Load filters File
 */
require get_theme_file_path('sparklewpthemes/functions/filters.php');


/**
 * Load helpers File
 */
require get_theme_file_path('sparklewpthemes/functions/helpers.php');


/**
 * Load hooks File
 */
require get_theme_file_path('sparklewpthemes/functions/hooks.php');

/**
 * Load widgets File
 */
require get_theme_file_path('sparklewpthemes/theme-widgets/widget-init.php');


/**
 * Load Meta Boxes
 */
require get_theme_file_path('/sparklewpthemes/meta-boxes/post-metabox.php');

require get_theme_file_path('/sparklewpthemes/meta-boxes/page-metabox.php');


/**
 * Load Admin info.
 */
if ( is_admin() ) {

	require get_theme_file_path('sparklewpthemes/admin/about-theme/class.info.php');
	require get_theme_file_path('sparklewpthemes/admin/about-theme/info.php');
	
}

/**
 * Load TMG libraries.
 */
require get_theme_file_path('sparklewpthemes/tgm/tgm.php');
require get_theme_file_path('sparklewpthemes/tgm/class-tgm-plugin-activation.php');

/**
 * Load OCDI libraries.
 */
require get_theme_file_path('sparklewpthemes/ocdi/ocdi.php');

/**
 * Load in customizer upgrade to pro
*/
require get_theme_file_path('sparklewpthemes/customizers/customizer-pro/class-customize.php');

