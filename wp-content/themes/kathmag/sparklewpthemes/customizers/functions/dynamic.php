<?php
/**
 * Dynamic Options hook.
 *
 * @package Kathmag
 */

if ( ! function_exists( 'kathmag_dynamic_css' ) ) :

    function kathmag_dynamic_css() {    

    	$show_search_button = kathmag_get_option( 'kathmag_enable_search_button' );

		$show_scroll_top_button = kathmag_get_option( 'kathmag_enable_scroll_top_button' );

	    ?>               
		    <style>
		    	<?php
		    		if( has_header_image() ) :
		    			?>
		    			header.km_general_header {
			    			background-image: url(<?php header_image(); ?>);
			    		}
		    			<?php
		    		endif;

		    		if( $show_search_button != 1 ) {
		    			?>
		    			.main_navigation .primary_navigation ul li.primarynav_search_icon {
			    			display: none;
			    		}
		    			<?php
		    		}

		    		if( $show_scroll_top_button != 1 ) {
		    			?>
		    			#toTop {
			    			display: none !important;
			    		}
		    			<?php
		    		}
		    	?>
		    </style>
		    
		<?php 
	}

endif;

add_action( 'wp_head', 'kathmag_dynamic_css' );