<?php  
$tp_taxonomy = 'aditem_category';
$tp_location_taxonomy = 'aditem_location';
$no_of_products = classified_shop_get_option( 'num_of_products' );
?>

<div class="product-wrapper">
    <?php                          
    $args = array(
        'post_type'         => 'aditem',
        'posts_per_page'    => $no_of_products,
    );
    $i = 1;
    $the_query = new WP_Query( $args );
    if ( $the_query -> have_posts() ) : while ( $the_query -> have_posts() ) : $the_query -> the_post();
    ?>
        <div class="four-col os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.6s" data-os-animation-duration="2s">
            <div class="product-item">
                <div class="prod-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php  
                        if ( has_post_thumbnail() ) :
                            the_post_thumbnail( 'post-thumbnail', array( 'alt' => esc_attr( get_the_title() ) ) );
                        else :
                            echo '<img src="' . get_template_directory_uri() . '/assets/uploads/demo-300x200.jpg" alt="thumbnail">';
                        endif; 
                        ?>
                    </a>
                    <?php
                    $tp_cat            = wp_get_post_terms($post->ID, $tp_taxonomy, array("fields" => "ids"));
                    $tp_cat_id         = $tp_cat ? $tp_cat[0] : '' ;
                    $tp_cat_data       = get_option("taxonomy_$tp_cat_id");
                    $tp_color          = $tp_cat_data ? $tp_cat_data['custom_term_color_meta'] : '#5f70f4';
                    $tp_icon           = $tp_cat_id ? wsc_get_category_icon( $tp_cat_id ) : 'fa-tag';
                    $tp_location       = wp_get_post_terms($post->ID, $tp_location_taxonomy, array("fields" => "all"));
                    $tp_location_name  = $tp_location ? $tp_location[0]->name : '';
                    $tp_location_slug  = $tp_location ? $tp_location[0]->slug : '';
                    ?>
                    <div class="prod-icon" style="background:<?php echo esc_attr( $tp_color ); ?>">
                        <i class="fa <?php echo esc_attr( $tp_icon ? $tp_icon : 'fa-tag' ); ?>"></i>
                    </div><!-- end .prod-icon -->
                </div><!-- end prod-image -->
                <div class="prod-details">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php classified_shop_custom_excerpt('classified_shop_thumbnail_excerpt'); ?>
                </div><!-- end .prod-details -->
                <div class="prod-footer">
                    <div class="address">
                        <a href="<?php echo esc_url( $tp_location_slug ? get_term_link( $tp_location_slug, $tp_location_taxonomy ) : '' ); ?>">
                        <i class="fa fa-map-marker"></i><?php echo esc_html( $tp_location_name ); ?>
                        </a>
                    </div><!-- end .address -->
                    <div class="prod-price">
                        <h4>
                            <?php 
                            $tp_price = get_post_meta( get_the_ID(), '_aditem_price', true );
                            // Check if the custom field has a value.
                            if ( ! empty( $tp_price ) ) {
                                echo wsc_price( $tp_price );
                            }
                            ?>
                        </h4>
                    </div><!-- end .prod-price -->
                </div><!-- end .prod-footer -->
            </div><!-- end .product-item -->
        </div><!-- end .four-col -->
    <?php
    if ( $i%4 == 0 ):
        echo '<div class="clear"></div>';
    endif; 
    $i++; endwhile; endif; 
    wp_reset_postdata();
    ?>
</div><!-- end .product-wrapper -->
