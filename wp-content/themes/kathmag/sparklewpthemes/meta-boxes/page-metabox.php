<?php
/**
 * Page Meta Box.
 *
 * @package Kathmag
 */

function kathmag_page_meta_init() {

    add_meta_box( 'page_sidebar_metabox', esc_html__( 'Sidebar Position', 'kathmag' ), 'kathmag_page_sidebar_meta', 'page', 'side', 'default' );

}
add_action( 'admin_init', 'kathmag_page_meta_init' );

/*
 * Page Meta Box
 */
function kathmag_page_sidebar_meta( $post ) {

    $values     = get_post_custom( $post->ID );

    $sidebar   = isset( $values['sidebar'] ) ? esc_html( $values['sidebar'][0] ) : 'right';

    wp_nonce_field( 'kathmag_page_sidebar_meta_nonce', 'meta_box_nonce' );

    $sidebar_positions = kathmag_sidebar_position();

    ?>

    <table width="100%" border="0" class="options" cellspacing="5" cellpadding="5">
        <tr>
            <?php
                foreach( $sidebar_positions as $key => $option ) {
                    ?>
                    <td width="10%">
                        <input type="radio" name="sidebar" id="sidebar" value="<?php echo esc_attr( $key ); ?>" <?php if( $sidebar == $key ) { esc_attr_e( 'checked', 'kathmag' ); } ?>><?php echo esc_html( $option ); ?>                
                    </td>  
                    <?php
                }
            ?>        
        </tr>        
          
    </table>   
    <?php   
}


function kathmag_page_sidebar_meta_save( $post_id ) {
    global $post;  

    $custom_meta_fields = array( 'sidebar' );

    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( sanitize_key( $_POST['meta_box_nonce'] ), 'kathmag_page_sidebar_meta_nonce' ) ) return;
    
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
   
 
    foreach( $custom_meta_fields as $custom_meta_field ){

        if( isset( $_POST[$custom_meta_field] ) )           

            update_post_meta($post->ID, $custom_meta_field, sanitize_text_field( wp_unslash( $_POST[$custom_meta_field] ) ) );      
    }   
}
add_action( 'save_post', 'kathmag_page_sidebar_meta_save' );