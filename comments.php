<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Classified Shop 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
<section>
	<div class="standard-layout">
	    <div class="feedback-wrapper">
	       
		<?php // You can start editing here -- including this comment! ?>

		<?php if ( have_comments() ) : ?>
			 <header class="entry-header text-left">
			<h2 class="entry-title os-animation comments-title" data-os-animation="fadeIn" data-os-animation-delay="1s" data-os-animation-duration="2s">
				<?php
					printf( // WPCS: XSS OK.
						esc_html( _nx( 'Feedback on &ldquo;%2$s&rdquo;', '%1$s Feedbacks on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'classified-shop' ) ),
						number_format_i18n( get_comments_number() ), get_the_title()
					);
				?>
			</h2>
	       	</header>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'classified-shop' ); ?></h2>
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'classified-shop' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'classified-shop' ) ); ?></div>
				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->
			<?php endif; // Check for comment navigation. ?>
			<div class="entry-content">
				<ul>
	            <?php  
					wp_list_comments( array( 
						'callback' 		=> 'classified_shop_comments_callback',
						'avatar_size'   => 100, 
						) );
	            ?>
	         	</ul>	
	        </div><!-- .entry-content -->
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'classified-shop' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'classified-shop' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'classified-shop' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
			<?php endif; // Check for comment navigation. ?>

		<?php endif; // Check for have_comments(). ?>

		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'classified-shop' ); ?></p>
		<?php endif; ?>

		<?php comment_form(); ?>
		</div><!-- end .feedback-wrapper -->
	</div><!-- end .standard-layout -->
</section>
</div><!-- #comments -->

<?php
function classified_shop_comments_callback( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <article id="comment-<?php comment_ID(); ?>" class="comment">

        <div class="feedback os-animation" data-os-animation="fadeIn" data-os-animation-delay="1s" data-os-animation-duration="2s">
            <div class="user-image">
                <?php echo get_avatar( $comment ); ?>
            </div>
            <div class="comment">
                <div class="desc">
                    <h3><?php echo wp_trim_words( get_comment_text(), 5, '...' ); ?></h3>
                    <div class="entry-meta">
                        <ul>
                            <li>
                            	<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><i class="fa fa-calendar"></i>
				                    <?php
				                        printf( __( '%1$s', 'classified-shop' ), get_comment_date() ); 
			                        ?>
			                    </a>
                            </li>
                            <li><a href="<?php esc_url( comment_author_link() ); ?>"><i class="fa fa-user"></i><?php echo esc_attr( get_comment_author() ); ?></a></li>
                        </ul>
                        <p><?php comment_text(); ?></p>
                        <p><?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'classified-shop' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></p>
                    </div><!-- end .entry-meta -->
                </div><!-- end .desc -->
            </div><!-- end .comment -->
        </div><!-- end .feedback -->

    </article>
</li>
<?php
}
