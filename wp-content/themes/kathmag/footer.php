<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kathmag
 */

?>
	</div><!-- .page_wrap -->
	<?php
		if( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) :
			?>
			<footer class="footer">
		        <div class="footer_inner">
		            <div class="km_container">
		                <div class="row">
		                	<?php
		                		if( is_active_sidebar( 'footer-1' ) ) :
				                	?>
				                	<div class="col-md-4 col-sm-12 col-xs-12">
				                		<?php
				                			dynamic_sidebar( 'footer-1' );
				                		?>
				                	</div><!-- .col-* -->
				                	<?php
		                		endif;

		                		if( is_active_sidebar( 'footer-2' ) ) :
				                	?>
				                	<div class="col-md-4 col-sm-12 col-xs-12">
				                		<?php
				                			dynamic_sidebar( 'footer-2' );
				                		?>
				                	</div><!-- .col-* -->
				                	<?php
		                		endif;

		                		if( is_active_sidebar( 'footer-3' ) ) :
				                	?>
				                	<div class="col-md-4 col-sm-12 col-xs-12">
				                		<?php
				                			dynamic_sidebar( 'footer-3' );
				                		?>
				                	</div><!-- .col-* -->
				                	<?php
		                		endif;
		                	?>
		                </div><!-- .row -->
		            </div><!-- .km_container_big -->
		        </div><!-- .footer_inner -->
		    </footer><!-- .footer -->
		    <?php
    	endif;

    	$enable_bottom_footer = kathmag_get_option('kathmag_enable_footer_bottom');

    	if( $enable_bottom_footer == 1 ) :
		    ?>
		    <div class="footer_bottom">
		        <div class="km_container">
		            <div class="row">
		                <div class="col-md-6 col-sm-6 col-xs-12">
		                    <div class="footer_bottom_content copy_right_info">
		                    	<p>
			                    	<?php
			                    		$copyright = kathmag_get_option( 'kathmag_copyright_text' );

								        if( !empty( $copyright ) ) {

								            echo esc_html( apply_filters( 'kathmag_copyright_text', $copyright . ' ' ) );

								        } else {

								            echo esc_html( apply_filters( 'kathmag_copyright_text', $content = esc_html__('Copyright  &copy; ','kathmag') . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) .'  ' ) );

								        }


								    ?>
								</p>

		                    </div><!-- .footer_bottom_content.copy_right_info -->
		                </div><!-- .col-* -->
		                <?php
		                	if( has_nav_menu( 'menu-3' ) ) :
				                ?>
				                <div class="col-md-6 col-sm-6 col-xs-12">
				                    <div class="footer_bottom_content nav_links">
				                        <?php
				                        	wp_nav_menu( array(
				                        		'theme_location' => 'menu-3',
				                        		'container' => '',
				                        		'depth'     => 1
				                        	) );
				                        ?>
				                    </div><!-- .footer_bottom_content.nav_links -->
				                </div><!-- .col-* -->
				                <?php
		                	endif;
		                ?>
		            </div><!-- .row -->
		        </div><!-- .km_container -->
		    </div><!-- .footer_bottom -->
		    <?php
    	endif;
    ?>

<?php wp_footer(); ?>

</body>
</html>
