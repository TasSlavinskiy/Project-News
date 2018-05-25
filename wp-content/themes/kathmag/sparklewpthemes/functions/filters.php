<?php
/**
 * Filter Functions.
 *
 * @package Kathmag
 */

/**
 * Filters For Excerpt 
 *
 */
if( !function_exists( 'kathmag_excerpt_more' ) ) :
	/*
	 * Excerpt More
	 */
	function kathmag_excerpt_more( $more ) {
		if( is_admin() ) {
			return $more;
		}

		return '';
	}
endif;
add_filter( 'excerpt_more', 'kathmag_excerpt_more' );


if( !function_exists( 'kathmag_excerpt_length' ) ) :
	/*
	 * Excerpt More
	 */
	function kathmag_excerpt_length( $length ) {

		if ( is_admin() ) {
			return $length;
		}

		$excerpt_length = kathmag_get_option( 'kathmag_excerpt_length' );

		if ( absint( $excerpt_length ) > 0 ) {
			$length = absint( $excerpt_length );
		}

		return apply_filters( 'kathmag_filter_excerpt_length', $length );

	}
endif;
add_filter( 'excerpt_length', 'kathmag_excerpt_length' );


if( !function_exists( 'kathmag_search_form' ) ) :
	/**
     * Search form of the theme.
     *
     * @since 1.0.0
     */
	function kathmag_search_form() {
		$form = '<form role="search" method="get" id="search-form" class="search-form clearfix" action="' . esc_url( home_url( '/' ) ) . '" >
					<input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control" placeholder="' . esc_attr__( 'Search', 'kathmag' ) . '" >
                    <button type="submit" id="searchsubmit" value="'. esc_attr__( 'Search', 'kathmag' ).'">
                    	<i class="fa fa-search" aria-hidden="true"></i>
                    </button>
			    </form>';

		return $form;
	}
endif;
add_filter( 'get_search_form', 'kathmag_search_form', 20 );