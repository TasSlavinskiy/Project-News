<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Kathmag
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function kathmag_woocommerce_setup() {
  add_theme_support( 'woocommerce' );
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'kathmag_woocommerce_setup' );


/**
 * Load Education Web Woocommerce Action and Filter.
*/
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20 );

add_filter( 'woocommerce_show_page_title', '__return_false' );

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

/**
 * WooCommerce add content primary div function
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
if (!function_exists('kathmag_woocommerce_output_content_wrapper')) {
    function kathmag_woocommerce_output_content_wrapper(){ ?>
      <div class="left_and_right_sidebar_wrapper">
        <div class="km_container">
            <?php
                do_action( 'kathmag_breadcrumb' );
            ?>
            <div class="row">
              <div class="col-md-8 col-sm-12 col-xs-12 sticky_portion">
                <div id="primary" class="content-area">
                  <main id="main" class="site-main">
    <?php }
}
add_action( 'woocommerce_before_main_content', 'kathmag_woocommerce_output_content_wrapper', 10 );

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
if (!function_exists('kathmag_woocommerce_output_content_wrapper_end')) {
    function kathmag_woocommerce_output_content_wrapper_end(){ ?>
                    </main>
                </div>
              </div>

              <?php get_sidebar('woocommerce'); ?>

            </div>
        </div>
    </div>
    <?php }
}
add_action( 'woocommerce_after_main_content', 'kathmag_woocommerce_output_content_wrapper_end', 10 );
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


/**
 * Woo Commerce Number of row filter Function
*/
add_filter('loop_shop_columns', 'kathmag_loop_columns');
if (!function_exists('kathmag_loop_columns')) {
    function kathmag_loop_columns() {
        return 3;
    }
}

add_action( 'body_class', 'kathmag_woo_body_class');
if (!function_exists('kathmag_woo_body_class')) {

    function kathmag_woo_body_class( $class ) {

           $class[] = 'columns-'.intval( kathmag_loop_columns() );
           return $class;

    }
}

/**
 * WooCommerce display related product.
*/
if (!function_exists('kathmag_related_products_args')) {
  function kathmag_related_products_args( $args ) {
      $args['posts_per_page']   = 3;
      $args['columns']          = 3;
      return $args;
  }
}
add_filter( 'woocommerce_output_related_products_args', 'kathmag_related_products_args' );

/**
 * WooCommerce display upsell product.
*/
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
if ( ! function_exists( 'kathmag_woocommerce_upsell_display' ) ) {
  function kathmag_woocommerce_upsell_display() {

      woocommerce_upsell_display( 6, 3 ); 

  }
}
add_action( 'woocommerce_after_single_product_summary', 'kathmag_woocommerce_upsell_display', 15 );
