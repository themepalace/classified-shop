<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Classified Shop 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php classified_shop_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<p><?php classified_shop_custom_excerpt( 'classified_shop_excerpt_length' ); ?></p>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php classified_shop_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
