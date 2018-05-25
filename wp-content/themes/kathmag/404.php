<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Kathmag
 */

	get_header();
?>
	<div class="left_and_right_sidebar_wrapper">
        <div class="km_container">
            <?php
                do_action( 'kathmag_breadcrumb' );
            ?>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <section class="error_page_wrapper">
                                <div class="error_head">
                                    <h2>
                                    	<?php
                                    		esc_html_e( '404 Error !', 'kathmag');
                                    	?>
                                    </h2>
                                </div><!-- .error_head -->
                                <div class="error_body">
                                   <p>
                                   		<?php 
                                   			esc_html_e( 'You landed to a 404 error page. The post you are looking for either has moved or doesn\'t exists in this server', 'kathmag' ); 
                                   		?>
                                   	</p>
                                </div><!-- .error_body -->
                                <div class="error_action">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="km_btn_primary">
                                    	<?php esc_html_e( 'Go Homepage', 'kathmag' ); ?>
                                    </a>
                                </div><!-- .error_action -->
                            </section><!-- .error_page_wrapper -->
                        </main><!-- #main.site-main -->
                    </div><!-- #primary.content-area -->
                </div><!-- .col-* -->
            </div><!-- .row -->
        </div><!-- .km_container -->
    </div><!-- .left_and_right_sidebar_wrapper -->
<?php
	get_footer();
