<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Classified Shop 1.0
 */

get_header(); 
$static_page = classified_shop_get_option( 'static_page_visible' );
if ( $static_page != true && is_front_page() ) :
	echo '';
else :
	$classified_shop_layout = 'sidebar_right';
?>
	<div class="front-page-wrapper">
		<main id="main" class="site-main <?php echo esc_attr( classified_shop_page_option( $classified_shop_layout ) ); ?>" role="main">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
		<?php
		if ( is_active_sidebar( 'sidebar-1' ) ){
			get_sidebar();
		}
		?>
	</div>
<?php
endif;
get_footer();