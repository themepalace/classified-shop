<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Classified Shop 1.0
 */

get_header(); 
$classified_shop_layout = 'sidebar_right';
?>

<main id="main" class="site-main <?php echo esc_attr( classified_shop_page_option( $classified_shop_layout ) ); ?>" role="main">

<?php
if ( have_posts() ) : ?>

	<header class="page-header">
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
	</header><!-- .page-header -->

	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();

		/*
		 * Include the Post-Format-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 */
		get_template_part( 'template-parts/content', get_post_format() );

	endwhile;

else :

	get_template_part( 'template-parts/content', 'none' );

endif; ?>
<?php 
  /**
   * Hook - classified_shop_action_pagination.
   *
   * @hooked classified_shop_default_pagination 
   * @hooked classified_shop_numeric_pagination 
   */
  do_action( 'classified_shop_action_pagination' ); 
?>
</main><!-- #main -->

<?php
if ( is_active_sidebar( 'sidebar-1' ) ) {
	get_sidebar();
}
get_footer();
