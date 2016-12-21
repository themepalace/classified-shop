<?php
$tp_id              = get_the_ID();
$location_taxonomy 	= 'aditem_location';
$location   		= wp_get_post_terms( get_the_ID(), $location_taxonomy, array("fields" => "all"));
$location_name   	= ! empty( $location )? $location[0]->name : '';
$location_slug   	= ! empty( $location ) ? $location[0]->slug : '';
$taxonomy   		= 'aditem_category';
$terms      		= wp_get_post_terms( $tp_id, $taxonomy , array("fields" => "slugs") );
$term       		= ! empty( $terms ) ? $terms[0] : '';
$args = array(
    'post_type'         => 'aditem',
    'aditem_category'   => $term,
    'post__not_in'      => array( $tp_id ),
    'posts_per_page'    =>  4,
    'post_status'       => 'publish',
    'order_by'          => 'date',
    'order'             => 'desc',
    );

$the_query = new WP_Query( $args );
if ( $the_query -> have_posts() ) :
?>
<section class="bg-dark-green">
    <div class="standard-layout page-section">
        <header class="entry-header text-left">
            <h2 class="entry-title os-animation" data-os-animation="fadeInDown" data-os-animation-delay="1s" data-os-animation-duration="2s"><?php _e( 'Similar Products', 'classified-shop' ); ?></h2>
        </header>
        <div class="entry-content">
            <div class="product-wrapper">
			<?php while ( $the_query -> have_posts() ) : $the_query -> the_post(); ?>
			<div class="four-col os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.6s" data-os-animation-duration="2s">
			    <div class="product-item">
			        <div class="prod-image">
			            <a href="<?php esc_url( the_permalink() ); ?>">
                            <?php  
                            $id = get_the_ID();
                            if ( has_post_thumbnail() ) :
                                the_post_thumbnail( 'post-thumbnail', array( 'alt' => esc_attr( get_the_title() ) ) );
                            else :
                                echo '<img src="' . get_template_directory_uri() . '/assets/uploads/demo-300x200.jpg" alt="thumbnail">';
                            endif; 
			                $tp_cat 		= wp_get_post_terms( $id, $taxonomy, array("fields" => "ids") );
			                $tp_cat_id     	= !empty( $tp_cat ) ? $tp_cat[0] : '';
			                $tp_cat_data   	= get_option("taxonomy_$tp_cat_id"); 
			                $icon       	= wsc_get_category_icon( $tp_cat_id );
                            ?>
			            <div class="prod-icon" style="background:<?php echo esc_attr( $tp_cat_data['custom_term_color_meta'] ); ?>">
			                <i class="fa <?php echo esc_attr( $icon ? $icon : 'fa-tag' ); ?>"></i>
			            </div><!-- end .prod-icon -->
			        </div><!-- end prod-image -->
			        <div class="prod-details">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php echo wp_trim_words( get_the_excerpt(), classified_shop_thumbnail_excerpt(), '...' ) ?>
                    </div><!-- end .prod-details -->
			        <div class="prod-footer">
			            <div class="address">
			                <a href="<?php echo esc_url( $location_slug ? get_term_link( $location_slug, $location_taxonomy ) : '' ); ?>">
			                    <i class="fa fa-map-marker"></i><?php echo esc_html( $location_name ); ?>
			                </a>
			            </div><!-- end .address -->
			            <div class="prod-price">
			                <h4>
			                <?php 
			                $item_price = get_post_meta( get_the_ID(), '_aditem_price', true );
			                // Check if the custom field has a value.
			                if ( ! empty( $item_price ) ) {
			                    echo wsc_price( $item_price );
			                }
			                ?>
			                </h4>
			            </div><!-- end .prod-price -->
			        </div><!-- end .prod-footer -->
			    </div><!-- end .product-item -->
			</div><!-- end .four-col -->
			<?php endwhile; ?>
            </div><!-- end .product-wrapper -->
        </div><!-- end .entry-content -->
    </div><!-- end .standard-layout -->
</section>

<?php
wp_reset_postdata();
endif;