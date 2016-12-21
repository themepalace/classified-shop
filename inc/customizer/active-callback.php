<?php
/**
 * Classified customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Classified
 * @since Classified Shop 1.0
 */

if ( ! function_exists( 'classified_shop_post_ad_active' ) ) :
	/**
	 * Check if post ad is active.
	 *
	 * @since Classified Shop 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function classified_shop_post_ad_active( $control ) {
		if ( true == $control->manager->get_setting( 'theme_options[post_ad_visible]' )->value() )
			return true;

		return false;
	}
endif;


if ( ! function_exists( 'classified_shop_slider_enable' ) ) :
	/**
	 * Check if slider is active.
	 *
	 * @since Classified Shop 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function classified_shop_slider_enable( $control ) {
		if ( 'enabled' == $control->manager->get_setting( 'theme_options[slider_option]' )->value() )
			return true;

		return false;
	}
endif;


if ( ! function_exists( 'classified_shop_slider_type_custom' ) ) :
	/**
	 * Check slider type is custom.
	 *
	 * @since Classified Shop 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return option Whether the control is active to the current preview.
	 */
	function classified_shop_slider_type_custom( $control ) {
		if ( 'custom' == $control->manager->get_setting( 'theme_options[slider_type_option]' )->value() && 'enabled' == $control->manager->get_setting( 'theme_options[slider_option]' )->value() )
			return true;

		return false;
	}
endif;


if ( ! function_exists( 'classified_shop_logo_slider_enable' ) ) :
	/**
	 * Check if logo slider is active.
	 *
	 * @since Classified Shop 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function classified_shop_logo_slider_enable( $control ) {
		if ( true == $control->manager->get_setting( 'theme_options[logo_slider_option]' )->value() )
			return true;

		return false;
	}
endif;


if ( ! function_exists( 'classified_shop_products_enable' ) ) :
	/**
	 * Check if products is active.
	 *
	 * @since Classified Shop 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function classified_shop_products_enable( $control ) {
		if ( true == $control->manager->get_setting( 'theme_options[products_visible]' )->value() )
			return true;

		return false;
	}
endif;


if ( ! function_exists( 'classified_shop_categories_active' ) ) :
	/**
	 * Check if categories is active.
	 *
	 * @since Classified Shop 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function classified_shop_categories_active( $control ) {
		if ( true == $control->manager->get_setting( 'theme_options[categories_visible]' )->value() )
			return true;

		return false;
	}
endif;


if ( ! function_exists( 'classified_shop_screen_active' ) ) :
	/**
	 * Check if shop screen is active.
	 *
	 * @since Classified Shop 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function classified_shop_screen_active( $control ) {
		if ( true == $control->manager->get_setting( 'theme_options[shop_screen_visible]' )->value() )
			return true;

		return false;
	}
endif;


if ( ! function_exists( 'classified_shop_section_search_active' ) ) :
	/**
	 * Check if search form is active.
	 *
	 * @since Classified Shop 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function classified_shop_section_search_active( $control ) {
		if ( true == $control->manager->get_setting( 'theme_options[section_search_visible]' )->value() )
			return true;

		return false;
	}
endif;


if ( ! function_exists( 'classified_shop_ad_location_active' ) ) :
	/**
	 * Check if ad location is active.
	 *
	 * @since Classified Shop 1.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function classified_shop_ad_location_active( $control ) {
		if ( true == $control->manager->get_setting( 'theme_options[ad_location_visible]' )->value() )
			return true;

		return false;
	}
endif;
