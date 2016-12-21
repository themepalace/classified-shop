<?php
/**
 * Core functions.
 *
 * @package Classified Shop 1.0
 */

if ( ! function_exists( 'classified_shop_get_option' ) ) :

	/**
	 * Get theme option from key.
	 *
	 * @since  Classified Shop 1.0
	 */
	function classified_shop_get_option( $key = '' ) {

		global $classified_shop_default_options;
		if ( empty( $key ) ) {
			return;
		}

		$default = ( isset( $classified_shop_default_options[ $key ] ) ) ? $classified_shop_default_options[ $key ] : '';
		$theme_options = get_theme_mod( 'theme_options', $classified_shop_default_options );
		$theme_options = array_merge( $classified_shop_default_options, $theme_options );
		$value = '';
		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}
		return $value;

	}

endif;

if ( ! function_exists( 'classified_shop_get_options' ) ) :

	/**
	 * Get theme options.
	 *
	 * @since Classified Shop 1.0
	 */
	function classified_shop_get_options() {

		$value = array();
		$value = get_theme_mod( 'theme_options' );
		return $value;

	}

endif;


if ( ! function_exists( 'classified_shop_page_option' ) ) :

	/**
	 * Page layout options.
	 *
	 * @since Classified Shop 1.0
	 */
	function classified_shop_page_option( $string ) {
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			return 'full-width';
		} else {
			if( $string == 'sidebar_right' ) :
				return 'pull-left';
			endif;
		}
	}

endif;


if ( ! function_exists( 'classified_shop_sidebar_option' ) ) :

	/**
	 * Sidebar layout options.
	 *
	 * @since Classified Shop 1.0
	 */
	function classified_shop_sidebar_option( $string ) {

		if( $string == 'sidebar_right' ) :
			return 'pull-right';
		endif;
	}

endif;

add_action( 'classified_shop_action_pagination', 'classified_shop_pagination', 10 );
if ( ! function_exists( 'classified_shop_pagination' ) ) :

	/**
	 * pagination.
	 *
	 * @since Classified Shop 1.0
	 */
	function classified_shop_pagination() {
		$pagination = classified_shop_get_option( 'pagination_option' );
		if ( $pagination == 'default_pagination' ) :
			the_posts_navigation( array(
					'prev_text' => '<i class="fa fa-angle-double-left"></i> ' . __( 'Previous', 'classified-shop' ),
					'next_text' => __( 'Next', 'classified-shop' ) . ' <i class="fa fa-angle-double-right"></i>'
				) );
		elseif ( $pagination == 'numeric_pagination' ) :
			the_posts_pagination( array(
					'prev_text' => '<i class="fa fa-angle-double-left"></i> ' .__( 'Previous', 'classified-shop' ),
					'next_text' => __( 'Next', 'classified-shop' ) . ' <i class="fa fa-angle-double-right"></i>'
				) );
		endif;
	}

endif;


add_action( 'classified_shop_action_post_pagination', 'classified_shop_post_pagination', 10 );
if ( ! function_exists( 'classified_shop_post_pagination' ) ) :

	/**
	 * post pagination.
	 *
	 * @since Classified Shop 1.0
	 */
	function classified_shop_post_pagination() {
		the_post_navigation( array(
				'prev_text' => '<i class="fa fa-angle-double-left"></i> ' . __( 'Previous', 'classified-shop' ),
				'next_text' => __( 'Next', 'classified-shop' ) . ' <i class="fa fa-angle-double-right"></i>'
			) );
	}
endif;

/**
  * Write message for featured image upload
  *
  * @return array Values returned from customizer
  * @since Classified Shop 1.0
*/
function classified_shop_slider_image_instruction( $content, $post_id ) {
  $allowed = array( 'page' );
  if ( in_array( get_post_type( $post_id ), $allowed ) ) {
    return $content .= '<p><b>' . __( 'Note', 'classified-shop' ) . ':</b>' . __( ' The recommended size for image is 1280px by 720px while using it for Slider.', 'classified-shop' ) . '</p>';
  }
   return $content;
}
add_filter( 'admin_post_thumbnail_html', 'classified_shop_slider_image_instruction', 10, 2);
