<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
		<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'classified-shop' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</header><!-- .page-header -->

	<?php
	/* Start the Loop */
	while ( have_posts() ) : the_post();

		/**
		 * Run the loop for the search to output the results.
		 * If you want to overload this in a child theme then include a file
		 * called content-search.php and that will be used instead.
		 */
		get_template_part( 'template-parts/content', 'search' );

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
