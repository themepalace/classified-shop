<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Classified Shop 1.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function classified_shop_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add a class to make layout
	$home_page_view 	= 'wide';
	$classes[] = esc_attr( $home_page_view );

	// Add a class for typography
	$classified_shop_typography = 'montserrat';
	$classes[] = esc_attr( $classified_shop_typography );

	return $classes;
}
add_filter( 'body_class', 'classified_shop_body_classes' );
