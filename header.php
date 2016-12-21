<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Classified Shop 1.0
	 */
?>
<?php
	/**
	 * Hook - classified_shop_action_doctype.
	 *
	 * @hooked classified_shop_doctype -  10
	 */
	do_action( 'classified_shop_action_doctype' );
?>
<head>
<?php
	/**
	 * Hook - classified_shop_action_head.
	 *
	 * @hooked classified_shop_head -  10
	 */
	do_action( 'classified_shop_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
/**
 * Hook - classified_shop_action_before.
 *
 * @hooked classified_shop_page_start - 10
 */
do_action( 'classified_shop_action_before' );


/**
* Hook - classified_shop_action_before_header.
*
* @hooked classified_shop_header_start - 10
*/
do_action( 'classified_shop_action_before_header' );


/**
* Hook - classified_shop_action_nav_menu.
*
* @hooked classified_shop_nav_menu - 10
*/
do_action( 'classified_shop_action_nav_menu' );


/**
* Hook - classified_shop_action_after_header.
*
* @hooked classified_shop_header_end - 10
*/
do_action( 'classified_shop_action_after_header' );


/**
* Hook - classified_shop_action_mobile_nav_menu.
*
* @hooked classified_shop_mobile_nav_menu - 10
*/
do_action( 'classified_shop_action_mobile_nav_menu' );


/**
* Hook - classified_content_before.
*
* @hooked classified_shop_content_start - 10
*/
do_action( 'classified_content_before' );


/**
* Hook - classified_primary_content_before.
*
* @hooked classified_shop_primary_content_start - 10
*/
do_action( 'classified_primary_content_before' );


/**
* Hook - classified_shop_action_slider.
*
* @hooked classified_shop_slider - 10
*/
do_action( 'classified_shop_action_slider' );


/**
* Hook - classified_shop_action_products.
*
* @hooked classified_shop_products - 10
*/
do_action( 'classified_shop_action_products' );


/**
* Hook - classified_shop_action_category.
*
* @hooked classified_shop_category - 10
*/
do_action( 'classified_shop_action_category' );
?>