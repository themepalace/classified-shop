<?php 
$no_of_products = classified_shop_get_option( 'num_of_products' );
?>

<div class="product-wrapper">
    <?php  
    $args      = array(
        'post_type'         => 'post',
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
                        the_post_thumbnail( get_the_id(), 'post-thumbnail', array( 'alt' => esc_attr( get_the_title() ) ) );
                    else :
                        echo '<img src="' . get_template_directory_uri() . '/assets/uploads/demo-300x200.jpg" alt="thumbnail">';
                    endif; 
                    ?>
                </a>
                <div class="prod-icon bg-red">
                    <i class="fa fa-bullseye"></i>
                </div><!-- end .prod-icon -->
            </div><!-- end prod-image -->
            <div class="prod-details">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php classified_shop_custom_excerpt('classified_shop_thumbnail_excerpt'); ?>
            </div><!-- end .prod-details -->
            <div class="prod-footer">
                <div class="address">
                    <?php  
                    $tp_categories = get_the_category();
                    $no_of_cat = 1;
                    foreach ($tp_categories as $category) {
                        echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a> ';
                        if( $no_of_cat == 2 ) break;
                        $no_of_cat++;
                    }
                    ?>
                </div><!-- end .address -->
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
