<?php  

/**
 * Sanitization functions.
 *
 * @package Classified Shop 1.0
 */

if ( ! function_exists( 'classified_shop_sanitize_image' ) ) :

	/**
	 * Sanitize image.
	 *
	 * @since Classified Shop 1.0
	 *
	 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
	 *
	 * @param string               $image Image filename.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return string The image filename if the extension is allowed; otherwise, the setting default.
	 */
	function classified_shop_sanitize_image( $image, $setting ) {

		/**
		 * Array of valid image file types.
		 *
		 * The array includes image mime types that are included in wp_get_mime_types().
		*/
		$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon',
		);

		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );

		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );

	}

endif;


if ( ! function_exists( 'classified_shop_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 *
	 * @since Classified Shop 1.0
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function classified_shop_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true === $checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'classified_shop_sanitize_select' ) ) :

	/**
	 * Sanitize select.
	 *
	 * @since Classified Shop 1.0
	 *
	 * @param mixed $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 */
	function classified_shop_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;


if ( ! function_exists( 'classified_shop_sanitize_positive_integer' ) ) :

	/**
	 * Sanitize positive integer.
	 *
	 * @since Classified Shop 1.0
	 *
	 * @param int                  $input Number to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int Sanitized number; otherwise, the setting default.
	 */
	function classified_shop_sanitize_positive_integer( $input, $setting ) {

		$input = absint( $input );

		// If the input is an absolute integer, return it.
		// otherwise, return the default.
		return ( $input ? $input : $setting->default );

	}

endif;


if ( ! function_exists( 'classified_shop_sanitize_page' ) ) :
	
	/**
	 * Sanitizes page/post
	 * @param  $input entered value
	 * @return sanitized output
	 *
	 * @since Classified Shop 1.0
	 */
	function classified_shop_sanitize_page( $input ) {

		// Ensure $input is an absolute integer.
		$page_id = absint( $input );

		// If $page_id is an ID of a published page, return it; otherwise, return false
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : false );

	}

endif;


/**
 * Text field with allowed tag anchor sanitization callback example.
 *
 * @see absint() https://developer.wordpress.org/reference/functions/absint/
 *
 * @param string  $input  
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string The input with only allowed tag i.e. anchor
 */
function classified_shop_santize_allow_tag( $input, $setting ) {
	$input = wp_kses( $input, array(
		'a' => array(
			'target' => array(),
			'href' => array(),
			)
		) );

	return $input;
}
