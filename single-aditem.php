<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Classified Shop 1.0
 */

get_header(); ?>
<main id="main" class="site-main" role="main">
<?php while ( have_posts() ) : the_post(); ?>
<section>
    <div class="standard-layout">
        <?php 
			$location_taxonomy 	= 'aditem_location';
            $tp_id              = get_the_ID();
        	$item_price 		= get_post_meta( get_the_ID(), '_aditem_price', true );
        	$tp_user 			= get_post_meta( get_the_ID(), '_aditem_contact_full_name', true );
        	$location   		= wp_get_post_terms( get_the_ID(), $location_taxonomy, array("fields" => "all"));
            $location_name   	= ! empty( $location )? $location[0]->name : '';
            $location_slug   	= ! empty( $location ) ? $location[0]->slug : '';
        	$args = array(
        		'delimiter'   => '',
        		'wrap_before' => '<ul class="breadcrumb">',
        		'wrap_after'  => '</ul>',
        		'before'      => '<li>',
        		'after'       => '</li>',
        		);
        	classified_breadcrumb( $args ); 
    	?>
    </div><!-- end .standard-layout -->
</section>

<section>
    <div class="standard-layout">
        <div class="product-single-image bg-white border-top-grey">
            <div class="two-col os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.3s" data-os-animation-duration="1.5s">
                    <?php
                    	/**
						 * classified_before_single_item_summary hook.
						 *
						 * @hooked classified_show_item_sale_flash - 10
						 * @hooked classified_show_item_images - 20
						 */
						do_action( 'classified_before_single_aditem_summary' );
					?>
            </div><!-- end .two-col -->
            <div class="two-col os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s" data-os-animation-duration="1.5s">
                <div class="summary entry-summary">
                    <h1 class="product_title entry-title"><?php the_title(); ?></h1>
                    <div class="product-meta">
                        <ul>
                            <li><i class="fa fa-calendar"></i><?php echo date_i18n( 'M d', strtotime(get_the_date( 'M d' )) ); ?></li>
                            <li><i class="fa fa-user"></i><?php echo esc_html( $tp_user ); ?></li>
                            <?php if ( ! empty( $location_name ) ) : ?>
                            <li>
                            	<a href="<?php echo esc_url( get_term_link( $location_slug, $location_taxonomy ) ); ?>"><i class="fa fa-map-marker"></i><?php echo esc_html( $location_name ); ?></a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div><!-- end .product-meta -->
                    <div class="offers">
                        <div class="price">
                            <div class="amount">
                                <span><?php echo _e( 'MSRP', 'classified-shop' ); ?></span>
                            	<?php                               
                                // Check if the custom field has a value.
                                if ( ! empty( $item_price ) ) {
                                    echo wsc_price( $item_price );
                                }
                                ?>
                            </div><!-- end .amount -->
                        </div><!-- end .price -->
                    </div><!-- end .offers -->
                    <div class="description">
                        <?php the_excerpt(); ?>
                    </div><!-- end .description-->
                </div><!-- end .entry-summary -->
            </div><!-- end .two-col -->
        </div><!-- end .single-product -->
    </div><!-- end .standard-layout -->
</section>

<section>
    <div class="standard-layout">
        <div class="product-specification product-details bg-white border-top-grey">
            <header class="entry-header text-left">
                <h2 class="entry-title os-animation" data-os-animation="fadeInDown" data-os-animation-delay="0.3s" data-os-animation-duration="2s"><?php _e('Product Details', 'classified-shop' ); ?></h2>
            </header>
            <div class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s" data-os-animation-duration="1.5s">
                <?php the_content(); ?>
            </div><!-- end .entry-content -->
            <div class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s" data-os-animation-duration="1.5s">
                <div class="tag"><?php _e( 'Seller info', 'classified-shop' ); ?></div>
                <?php if( $full_name = get_post_meta( $post->ID, '_aditem_contact_full_name', true ) ): ?>
                    <h1><?php echo esc_html( $full_name ); ?></h1>
                <?php endif; ?>
                <div class="list os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.9s" data-os-animation-duration="1.5s">
                    <ul>
                        <?php if( $dealer_phone_no = get_post_meta( $post->ID, '_aditem_contact_phone_no', true ) ): ?>
                            <li><i class="fa fa-phone"></i><?php echo esc_html( $dealer_phone_no ); ?></li>
                        <?php  
                        endif;
                        if( $dealer_location = get_post_meta( $post->ID, '_aditem_contact_location', true ) ):
                        ?>
                            <li><i class="fa fa-map-marker"></i><?php echo esc_html( $dealer_location ); ?></li>
                        <?php 
                        endif;
                        if( $dealer_email = get_post_meta( $post->ID, '_aditem_contact_email', true ) ):
                        ?>
                            <li><a href="mailto:<?php echo sanitize_email( $contact_email ); ?>"><i class="fa fa-envelope"></i><?php echo esc_html( $dealer_email ); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div><!-- end .list -->
            </div><!-- end .entry-content -->
        </div><!-- end .product-details -->
    </div><!-- end .standard-layout -->
</section>
<?php
endwhile; // End of the loop.
?>

</main><!-- #main -->
<?php 
get_template_part( 'template-parts/content-related-products' );
get_footer();
