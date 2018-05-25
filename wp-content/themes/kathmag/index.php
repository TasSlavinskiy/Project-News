<?php
/**
 * The main template file
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

    $enable_ticker = kathmag_get_option( 'kathmag_enable_ticker_in_blog_page' );

    $enable_banner = kathmag_get_option( 'kathmag_enable_banner_in_blog_page' );

    if( $enable_ticker == 1 ) {
        do_action( 'kathmag_ticker_news' );
    }

    if( $enable_banner == 1 ) {
        do_action( 'kathmag_banner_layout' );
    }

?>
    <div class="left_and_right_sidebar_wrapper listpage_wrapper page_wrap_with_sidebar">
        <div class="km_container">
            <div class="row">
                <?php
                    $sidebar_position = kathmag_get_option( 'kathmag_archive_sidebar' );
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
                                if( have_posts() ) :
                                    ?>
                                    <section class="listpage listpage_layout_one">
                                        <div class="masonary_layout_wrapper">
                                            <div class="masonary_grid">
                                                <?php
                                                    while( have_posts() ) :
                                                        the_post();

                                                        get_template_part( 'template-parts/content', get_post_type() );

                                                    endwhile;
                                                ?>                                   
                                            </div><!-- .masonary_grid -->
                                        </div><!-- .masonary_layout_wrapper -->
                                    </section><!-- .listpage.listpage_layout_one -->
                                    <?php
                                    do_action( 'kathmag_pagination' );
                                endif;
                                ?>
                        </main><!-- #main.site-main -->
                    </div><!-- #primary.content-area -->
                </div><!-- .col-* -->
                <?php
                    if( $sidebar_position == 'right' ) :
                        get_sidebar();
                    endif;
                ?>
            </div><!-- .row -->
        </div><!-- .km_container -->
    </div><!-- .left_and_right_sidebar_wrapper.listpage_wrapper -->

<?php
	get_footer();
