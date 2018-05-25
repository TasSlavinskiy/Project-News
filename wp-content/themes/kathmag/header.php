<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kathmag
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="page_wrap">
	<header class="km_general_header km_header_layout_one">
        <?php
            $enable_top_header = kathmag_get_option( 'kathmag_enable_top_header' );
            if( $enable_top_header == 1 ) {
                ?>
                <div class="top_header">
                    <div class="km_container">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="top_left">
                                	<?php
                                		if( has_nav_menu( 'menu-2' ) ) {
                                			wp_nav_menu( array( 
                                				'theme_location' => 'menu-2',
                                				'menu_class' => 'secondary_menu',
                                                'depth'     => 1 
                                			) );
                                		}
                                	?>
                                </div><!-- .top_left -->
                            </div><!-- .col-* -->
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="top_right">
                                    <ul class="social_links">
                                        <?php
                                            $facebook_link = kathmag_get_option( 'kathmag_facebook_link' );
                                            if( !empty( $facebook_link ) ) :
                                                ?>
                                                <li>
                                                    <a href="<?php echo esc_url( $facebook_link ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <?php
                                            endif;

                                            $twitter_link = kathmag_get_option( 'kathmag_twitter_link' );
                                            if( !empty( $twitter_link ) ) :
                                                ?>
                                                <li>
                                                    <a href="<?php echo esc_url( $twitter_link ); ?>" target="_blank">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <?php
                                            endif;
                                            $googleplus_link = kathmag_get_option( 'kathmag_google_plus_link' );
                                            if( !empty( $googleplus_link ) ) :
                                                ?>
                                                <li>
                                                    <a href="<?php echo esc_url( $googleplus_link ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                                                </li>
                                                <?php
                                            endif;
                                            $instagram_link = kathmag_get_option( 'kathmag_instagram_link' );
                                            if( !empty( $instagram_link ) ) :
                                                ?>
                                                <li>
                                                    <a href="<?php echo esc_url( $instagram_link ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                                                </li>
                                                <?php
                                            endif;
                                            $linkedin_link = kathmag_get_option( 'kathmag_linkedin_link' );
                                            if( !empty( $linkedin_link ) ) :
                                                ?>
                                                <li>
                                                    <a href="<?php echo esc_url( $linkedin_link ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                                <?php
                                            endif;
                                            $pinterest_link = kathmag_get_option( 'kathmag_pinterest_link' );
                                            if( !empty( $pinterest_link ) ) :
                                                ?>
                                                <li>
                                                    <a href="<?php echo esc_url( $pinterest_link ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
                                                </li>
                                                <?php
                                            endif;
                                            $youtube_link = kathmag_get_option( 'kathmag_youtube_link' );
                                            if( !empty( $youtube_link ) ) :
                                                ?>
                                                <li>
                                                    <a href="<?php echo esc_url( $youtube_link ); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                                                </li>
                                                <?php
                                            endif;

                                            $vimeo_link = kathmag_get_option( 'kathmag_vimeo_link' );
                                            if( !empty( $vimeo_link ) ) :
                                                ?>
                                                <li>
                                                    <a href="<?php echo esc_url( $vimeo_link ); ?>" target="_blank"><i class="fa fa-vimeo"></i></a>
                                                </li>
                                                <?php
                                            endif;
                                        ?>
                                    </ul>
                                </div><!-- .top_right -->
                            </div><!-- .col-* -->
                        </div><!-- .row -->
                    </div><!-- .km_container -->
                </div><!-- .top_header -->
                <?php
            }
        ?>

        <div class="bottom_header">
            <div class="km_container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="logo_holder">
                            <?php
                                if( has_custom_logo() ) {
                                    the_custom_logo();
                                } else {
                                    ?>
                                    <h1 class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                            <?php 
                                                bloginfo( 'name' ); 
                                            ?>
                                        </a>
                                    </h1><!-- .site-title -->
                                    <p class="site-description">
                                        <?php 
                                            bloginfo( 'description' ); 
                                        ?>
                                    </p><!-- .site-description -->
                                    <?php
                                }
                            ?>
                        </div><!-- .logo_holder -->
                    </div><!-- .col-* -->
                    <?php
                        /*
                         * Load header advertisement hook
                         */
                        do_action( 'kathmag_header_advertisement' );
                    ?>
                </div><!-- row -->
                <nav class="main_navigation">
                    <div id="main-nav" class="primary_navigation">
                        <?php
                            wp_nav_menu( array( 
                                'theme_location' => 'menu-1',
                                'fallback_cb'    => 'kathmag_navigation_fallback',
                                'container'      => '',
                            ) );
                        ?>
                    </div><!-- #main-nav.primary_navigation -->
                    
                    <div class="modal fade search_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button><!-- .close -->
                                <div class="search_form">
                                    <?php
                                        get_search_form();
                                    ?>
                                </div><!-- .search_form -->
                            </div><!-- .modal-content -->
                        </div><!-- .modal-dialog.modal-lg -->
                    </div><!-- .modal.fade.search_modal -->
                </nav><!-- .main_navigation -->
            </div><!-- km_container -->
        </div><!-- .bottom_header -->
    </header>