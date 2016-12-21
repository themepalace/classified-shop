<?php
/**
 * Classified Shop Theme Customizer.
 *
 * @package Classified Shop 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function classified_shop_customize_register( $wp_customize ) {
	// Load Sanitization
	require get_template_directory() . '/inc/customizer/sanitize.php';

	// Load choices options
	require get_template_directory() . '/inc/customizer/options.php';

	// Load Active Callback
	require get_template_directory() . '/inc/customizer/active-callback.php';


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Load custom customizer
	require get_template_directory() . '/inc/customizer/custom-customizer.php';
	require get_template_directory() . '/inc/customizer/section/slider.php';
	require get_template_directory() . '/inc/customizer/section/logo-slider.php';
	require get_template_directory() . '/inc/customizer/section/products.php';
	require get_template_directory() . '/inc/customizer/section/shop-screen.php';
	require get_template_directory() . '/inc/customizer/section/category.php';
	require get_template_directory() . '/inc/customizer/section/ad-location.php';
	require get_template_directory() . '/inc/customizer/section/search.php';
	require get_template_directory() . '/inc/customizer/section/theme-options.php';
	require get_template_directory() . '/inc/customizer/section/reset.php';
}
add_action( 'customize_register', 'classified_shop_customize_register' );

// Load customizer theme pro link
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function classified_shop_customize_preview_js() {
	wp_enqueue_script( 'classified_shop_customizer', get_template_directory_uri() . '/assets/js/customizer.min.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'classified_shop_customize_preview_js' );
