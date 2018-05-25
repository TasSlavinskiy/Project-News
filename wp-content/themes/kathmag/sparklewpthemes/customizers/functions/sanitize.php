<?php
/**
 * Sanitization Functions
 *
 * @package Kathmag
 */

/**
 * Sanitization Function - Checkbox
 * 
 * @param $checked
 * @return bool
 */
if( !function_exists( 'kathmag_sanitize_checkbox' ) ) :

	function kathmag_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif;

/**
 * Sanitization Function - Choices
 * 
 * @param $input, $setting
 * @return $input
 */
if( !function_exists( 'kathmag_sanitize_choices' ) ) :

	function kathmag_sanitize_choices( $input, $setting ) {
	    global $wp_customize;
	    
	    if(!empty($input)){
	        $input = array_map('absint', $input);
	    }

	    return $input;
	} 

endif;



/**
 * Sanitization Function - Select
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('kathmag_sanitize_select') ) :

	function kathmag_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	
endif;

/**
 * Sanitization Function - Number
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('kathmag_sanitize_number') ) :

	function kathmag_sanitize_number( $input, $setting ) {

		$number = absint( $input );

		// If the input is a positibe number, return it; otherwise, return the default.
		return ( $number ? $number : $setting->default );
	}
	
endif;

/**
 * Sanitization Function - Repeater
 *
 * @param $input
 * @return sanitized input
 *
 */
if ( !function_exists('kathmag_sanitize_repeater') ) :

    function kathmag_sanitize_repeater( $input ){
      
        $input_decoded = json_decode( $input, true );
        $allowed_html = array(
            'br' => array(),
            'em' => array(),
            'strong' => array(),
            'a' => array(
                'href' => array(),
                'class' => array(),
                'id' => array(),
                'target' => array()
            ),
            'button' => array(
                'class' => array(),
                'id' => array()
            )
        );        
        
        if( !empty( $input_decoded ) ) {
            foreach( $input_decoded as $boxes => $box ) {
                foreach( $box as $key => $value ) {
                    $input_decoded[$boxes][$key] = sanitize_text_field( $value );
                }
            }
            return json_encode( $input_decoded );
        }        
        return $input;
    }

endif;

