<?php  
/**
 * Classified Metabox
 *
 * @package Theme Palace
 *
 * @since Classified Shop 1.0
 */


/**
*enque script
**/

add_action( 'admin_enqueue_scripts', 'classified_shop_enqueue_color_picker' );
function classified_shop_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'classified-shop-script-handle', get_template_directory_uri() . '/assets/js/metabox.min.js', array( 'wp-color-picker' ), false, true );
}


/**
* Classified aditem category meta box
**/

// Add term page
function classified_shop_taxonomy_add_new_meta_field() {
    // this will add the custom meta field to the add new term page
    ?>
    <div class="form-field">
        <label for="term_meta[custom_term_color_meta]"><?php _e( 'Select Color for Icon Background', 'classified-shop' ); ?></label>
        <input type="text" name="term_meta[custom_term_color_meta]" id="custom_term_color_meta" value="#bada55" class="classified-shop-color-field" data-default-color="#bada55">
        
    </div>
<?php
}
add_action( 'aditem_category_add_form_fields', 'classified_shop_taxonomy_add_new_meta_field', 10, 2 );

// Edit term page
function classified_shop_taxonomy_edit_meta_field($term) {
 
    // put the term ID into a variable
    $tp_id = $term->term_id;
 
    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_option( "taxonomy_$tp_id" ); ?>
    
    <tr class="form-field">
    <th scope="row" valign="top"><label for="term_meta[custom_term_color_meta]"><?php _e( 'Select Color for Icon Background', 'classified-shop' ); ?></label></th>
        <td>
            <input type="text" name="term_meta[custom_term_color_meta]" id="custom_term_color_meta" value="<?php echo ! empty( esc_html( $term_meta['custom_term_color_meta'] ) ) ? esc_html( $term_meta['custom_term_color_meta'] ) : ''; ?>">
        </td>
    </tr>
<?php
}
add_action( 'aditem_category_edit_form_fields', 'classified_shop_taxonomy_edit_meta_field', 10, 2 );

// Save extra taxonomy fields callback function.
function classified_shop_save_taxonomy_custom_meta( $term_id ) {
    if ( isset( $_POST['term_meta'] ) ) {
        $tp_id = $term_id;
        $term_meta = get_option( "taxonomy_$tp_id" );
        $cat_keys = array_keys( $_POST['term_meta'] );
        foreach ( $cat_keys as $key ) {
            if ( isset ( $_POST['term_meta'][$key] ) ) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        // Save the option array.
        update_option( "taxonomy_$tp_id", $term_meta );
    }
}  
add_action( 'edited_aditem_category', 'classified_shop_save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_aditem_category', 'classified_shop_save_taxonomy_custom_meta', 10, 2 );
