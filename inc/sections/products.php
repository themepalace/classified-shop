<?php 
if ( classified_shop_get_option( 'products_visible' ) == true ) : 
    $slider_option = classified_shop_get_option( 'slider_option' );
    $product_gap = ( $slider_option != true ) ? 'product-gap' : '';
?>
<section class="bg-dark-green <?php echo esc_attr( $product_gap ); ?>">
    <div class="standard-layout page-section">
        <div class="entry-content">
            <ul class="tabs os-animation" data-os-animation="zoomIn" data-os-animation-delay="1s" data-os-animation-duration="2s">
                <?php  

                $tab_1 = ( function_exists( 'classified_get_featured_aditems' ) ) ? classified_shop_get_option( 'product_tab1' ) : false;
                $tab_2 = ( function_exists( 'classified_get_featured_aditems' ) ) ? classified_shop_get_option( 'product_tab2' ) : false;
                $tab_3 = classified_shop_get_option( 'product_tab3' );
                if ( function_exists( 'classified_get_featured_aditems' ) ) :
                    if ( $tab_1 == true ) :
                    ?>
                        <li class="tab-link active" data-tab="tab-1"><?php _e( 'Recent', 'classified-shop' ) ?></li>
                    <?php 
                    endif; 
                    if ( $tab_2 == true ) :
                    ?>
                        <li class="tab-link <?php echo ( $tab_1 != true ) ? esc_attr( 'active' ) : '' ?>" data-tab="tab-2"><?php _e( 'Featured', 'classified-shop' ) ?></li>
                    <?php 
                    endif;
                endif;
                if ( $tab_3 == true ) :
                    ?>
                        <li class="tab-link <?php echo ( $tab_1 != true && $tab_2 != true ) ? esc_attr( 'active' ) : '' ?>" data-tab="tab-3"><?php _e( 'Recent Posts', 'classified-shop' ) ?></li>
                <?php 
                endif;
                ?>
            </ul>
            <?php 
            if ( function_exists( 'classified_get_featured_aditems' ) ) :
                if ( $tab_1 == true ) :?>
                    <div id="tab-1" class="tab-content active">
                        <?php get_template_part( 'inc/sections/product-sections/first-tab' ); ?>
                    </div><!-- end #tab-1 --> 
                <?php
                endif;
                if ( $tab_2 == true ) : ?>
                    <div id="tab-2" class="tab-content <?php echo ( $tab_1 != true ) ? esc_attr( 'active' ) : '' ?>">
                        <?php get_template_part( 'inc/sections/product-sections/second-tab' ); ?>
                    </div><!-- end #tab-2 -->
                <?php
                endif;
            endif;
            if ( $tab_3 == true ) : ?>
                <div id="tab-3" class="tab-content <?php echo ( $tab_1 != true && $tab_2 != true ) ? 'active' : '' ?>">
                    <?php get_template_part( 'inc/sections/product-sections/third-tab' ); ?>
                </div><!-- end #tab-3 -->
            <?php
            endif;
            ?>            
        </div><!-- end .entry-content -->
    </div><!-- end .standard-layout -->
</section>  
<?php endif; ?>