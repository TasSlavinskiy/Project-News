<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kathmag
 */

	get_header();

?>
	<div class="left_and_right_sidebar_wrapper listpage_wrapper listpage_layout_one_wrapper">
        <div class="km_container">
        	<?php
                do_action( 'kathmag_breadcrumb' );
            ?>
            <div class="row">
            	<?php
            		$sidebar_position = kathmag_get_option( 'kathmag_archive_sidebar' );
            		$class = null;

            		if( $sidebar_position != 'none' && is_active_sidebar( 'sidebar-1' ) ) {
            			$class = 'col-md-8 col-sm-12 col-xs-12 sticky_portion page_wrap_with_sidebar';
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
		                            <section class="listpage listpage_layout_one km_posts_widget_layout_five">
		                                <div class="km_p_w_f_inner_wrapper">
		                                	<div class="masonary_grid">
		                                	<?php
		                                		while( have_posts() ) :
		                                			the_post();
		                                			
		                                			get_template_part( 'template-parts/content', get_post_type() );

		                                    	endwhile;
		                                    ?>
		                                	</div>
		                                </div><!-- .km_p_w_f_inner_wrapper -->
		                            </section><!-- .listpage.listpage_layout_one.km_posts_widget_layout_five -->
		                            <?php
		                            do_action( 'kathmag_pagination' );

		                        else :

		                        	get_template_part( 'template-parts/content', 'none' );

		                        endif;
		                    ?>
		                </main><!-- #main.site-main -->
		            </div><!-- #primary.content-area -->
                </div><!-- .col-*.sticky_portion -->
                <?php
                	if( $sidebar_position == 'right' ) {
                		get_sidebar();
                	}
                ?>
            </div><!-- .row -->
        </div><!-- .km_container -->
    </div><!-- .left_and_right_sidebar_wrapper.listpage_wrapper.listpage_layout_one_wrapper -->
<?php
get_footer();
