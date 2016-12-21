<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Classified Shop 1.0
 */


/**
* Hook - classified_shop_action_location.
*
* @hooked classified_shop_location - 10
*/
do_action( 'classified_shop_action_location' );


/**
* Hook - classified_shop_action_logo_slider.
*
* @hooked classified_shop_logo_slider - 10
*/
do_action( 'classified_shop_action_logo_slider' );


/**
 * Hook - classified_shop_action_backtotop.
 *
 * @hooked classified_shop_backtotop - 10
 */
do_action( 'classified_shop_action_backtotop' );


/**
 * Hook - classified_shop_primary_content_after.
 *
 * @hooked classified_shop_primary_content_end - 10
 */
do_action( 'classified_shop_primary_content_after' );


/**
 * Hook - classified_shop_content_after.
 *
 * @hooked classified_shop_content_end - 10
 */
do_action( 'classified_shop_content_after' );


/**
 * Hook - classified_shop_action_footer.
 *
 * @hooked classified_shop_footer - 10
 */
do_action( 'classified_shop_action_footer' );


/**
 * Hook - classified_shop_action_after.
 *
 * @hooked classified_shop_page_end - 10
 */
do_action( 'classified_shop_action_after' );
?>

<?php wp_footer(); ?>

</body>
</html>
