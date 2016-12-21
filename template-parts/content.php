<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Classified Shop 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div class="featured-image">
			<?php 
          	if ( has_post_thumbnail() ) :
                the_post_thumbnail( get_the_id(), $size = 'post-thumbnail', array( 'alt' => get_the_title() ) );
              endif; 
          	?>
		</div><!-- end .featured-image -->
		<div class="archive-contents">
			<header class="entry-header">
				<?php
					if ( is_single() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php classified_shop_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</header><!-- .entry-header -->
			<p><?php classified_shop_custom_excerpt( 'classified_shop_excerpt_length' ); ?></p>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'classified-shop' ),
					'after'  => '</div>',
				) );
			?>
			<footer class="entry-footer">
				<?php classified_shop_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div><!-- end .archive-contents -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->
