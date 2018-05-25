<?php
/**
 * Front Page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kathmag
 */

	get_header();

    do_action( 'kathmag_enable_frontpage' );

    $enable_front_page = kathmag_get_option( 'kathmag_enable_front_page' );

    if( $enable_front_page == 1 ) :

        do_action( 'kathmag_ticker_news' );

        do_action( 'kathmag_banner_layout' );

        do_action( 'kathmag_advertisement_one' );

    	?>

    	<div class="left_and_right_sidebar_wrapper">
            <div class="km_container">
                <div class="row">
                    <?php
                        $sidebar_position = kathmag_get_option( 'kathmag_front_page_sidebar' );
                        $class = null;

                        if( $sidebar_position != 'none' && is_active_sidebar( 'sidebar-1' ) ) {
                            $class = 'col-md-8 col-sm-12 col-xs-12 sticky_portion';
                        } else {
                            $class = 'col-md-12 col-sm-12 col-xs-12';
                        }

                        if( $sidebar_position == 'left' ) {
                            get_sidebar();
                        }
                    ?>
                    <div class="<?php echo esc_attr( $class ); ?>">
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main">
                                <?php
                                	do_action( 'kathmag_main_news' );
                                ?>
                            </main><!-- #main.site-main -->
                        </div><!-- #primary.content-area -->
                    </div><!-- col-*.sitcky_portion -->
                    <?php
                        if( $sidebar_position == 'right' ) {
                        	get_sidebar();
                        }
                    ?>
                </div><!-- .row -->
            </div><!-- .km_container -->
        </div><!-- .left_and_right_sidebar_wrapper -->
        <?php
            do_action( 'kathmag_advertisement_two' );
        ?>

        <div class="km_container">
            <?php
                do_action( 'kathmag_bottom_news_block' );
            ?>
        </div><!-- .km_container -->
        <?php

    endif;	

	get_footer();

?>