<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Classified Shop 1.0
 */

get_header(); 
$classified_shop_layout = 'sidebar_right';
?>

<main id="main" class="site-main <?php echo esc_attr( classified_shop_page_option( $classified_shop_layout ) ); ?>" role="main">

<?php
while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content-single', get_post_format() );

	/**
	* Hook classified_shop_action_post_pagination
	*  
	* @hooked classified_shop_post_pagination 
	*/
	do_action( 'classified_shop_action_post_pagination' );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.
?>

</main><!-- #main -->

<?php
if ( is_active_sidebar( 'sidebar-1' ) ) {	
	get_sidebar();
}
get_footer();
