<?php
/**
 * Helper Functions
 *
 * @package Kathmag
 */

/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'kathmag_fonts_url' ) ) :
    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function kathmag_fonts_url()
    {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Roboto font: on or off', 'kathmag')) {
            $fonts[] = 'Roboto:300,400,500,600,700,900';
        }

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Work Sans font: on or off', 'kathmag')) {
            $fonts[] = 'Work+Sans:300,400,500,600,700';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
                'subset' => urldecode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }
endif;


/**
 * Fallback menu
 */
if ( ! function_exists( 'kathmag_navigation_fallback' ) ) :

    /**
     * Fallback for primary navigation.
     *
     * @since 1.0.0
     */
    function kathmag_navigation_fallback() {
        ?>
        <ul id="menu-main-menu" class="menu">
            <li>
                <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" title="<?php esc_attr_e( 'Add Menu', 'kathmag' ); ?>">
                    <?php
                        esc_html_e( 'Add a menu', 'kathmag' );
                    ?>
                </a>
            </li>
        </ul>
        <?php
    }
endif;