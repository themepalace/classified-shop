<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
if ( have_posts() ) :

	if ( is_home() && ! is_front_page() ) : ?>
		<header>
			<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
		</header>

	<?php
	endif;

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
