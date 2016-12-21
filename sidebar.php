<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Classified Shop 1.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

$classified_shop_layout = 'sidebar_right';

if ( $classified_shop_layout != 'sidebar_none' ) :
?>

<aside id="secondary" class="widget-area <?php echo esc_attr( classified_shop_sidebar_option( $classified_shop_layout ) ); ?>" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
<div class="clear"></div>
<?php endif; ?>
