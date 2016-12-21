<!-- categories -->
<?php  
if ( classified_shop_get_option( 'categories_visible' ) == true  ) :

    $classified_shop_taxonomy  = classified_shop_get_option( 'taxonomy_option' );
    $tp_cat_title = classified_shop_get_option( 'category_title' );
    $tp_cat_description = classified_shop_get_option( 'category_description' );
    $slider_option = classified_shop_get_option( 'slider_option' );
    $product_option = classified_shop_get_option( 'products_visible' );
    $product_gap = ( $slider_option != true && $product_option != true ) ? 'product-gap' : '';

        if ( ! empty( $tp_cat_title ) || ! empty( $tp_cat_description ) ) : ?>

            <header class="entry-header <?php echo $product_gap; ?>">
                <?php if ( ! empty( $tp_cat_title ) ) : ?>
                    <h2 class="entry-title os-animation" data-os-animation="zoomIn" data-os-animation-delay="1s" data-os-animation-duration="2s"><?php echo esc_html( $tp_cat_title ); ?></h2>
                <?php 
                endif; 
                if ( ! empty( $tp_cat_description ) ) :
                ?>
                    <span class="os-animation" data-os-animation="fadeInDown" data-os-animation-delay="2s" data-os-animation-duration="2s">
                        <?php echo esc_html( strip_tags( htmlspecialchars_decode( $tp_cat_description ) ) ); ?>
                    </span>
                <?php endif; ?>
            </header>
            
        <?php endif; ?>
    <div class="entry-content">
        <div class="categories-wrapper">
            <?php  
            $tp_taxonomy = $classified_shop_taxonomy;
            $parent_terms = get_terms( $tp_taxonomy, array( 'parent' => 0, 'hide_empty' => 0 ) );
            foreach ( $parent_terms as $terms ) :
                $tp_cat_id     = $terms->term_id;
                $tp_cat_slug   = $terms->slug;
                $tp_cat_data   = get_option( "taxonomy_$tp_cat_id" );
                $tp_color      = $tp_cat_data['custom_term_color_meta'] ? $tp_cat_data['custom_term_color_meta'] : '#1199D3';
                if ( function_exists( 'wsc_get_category_icon' ) ) {
                    $icon = wsc_get_category_icon( $tp_cat_id );
                    $tp_icon   = ! empty( $icon ) ? $icon : 'fa-tag';
                } else {
                    $tp_icon   = 'fa-tag';
                }
            ?>  
                <style type="text/css">
                    <?php  
                        echo '.'.$tp_cat_slug.':hover { background:'.esc_attr( $tp_color ).' }';
                        echo '.'.$tp_cat_slug.':hover i.fa { color:'.esc_attr( $tp_color ).' }';
                    ?>
                </style>
                <div class="four-col os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s" data-os-animation-duration="1s">
                    <div class="category-item <?php echo esc_attr( $tp_cat_slug ); ?>">
                        <div class="icon" style="background:<?php echo esc_attr( $tp_color ); ?>" >
                            <i class="fa <?php echo esc_attr( $tp_icon ); ?>"></i>
                        </div>
                        <div class="title">
                            <a href="<?php echo esc_url( get_term_link( $terms->slug, $tp_taxonomy ) ); ?>"><h3><?php echo esc_html( $terms->name ); ?></h3></a>
                        </div>
                            <ul>
                                <?php  
                                    $child_terms = get_term_children( $terms->term_id, $tp_taxonomy );
                                    foreach ($child_terms as $child) :
                                        $child_term = get_term_by( 'id', $child, $tp_taxonomy );
                                ?>
                                            <li><a href="<?php echo esc_url( get_term_link( $child_term->slug, $tp_taxonomy ) ); ?>"><?php echo esc_html( $child_term->name ); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                    </div><!-- end .category-item -->
                </div><!-- end .four-col -->
            <?php 
            endforeach; 
            wp_reset_postdata();
            ?> 
        </div><!-- end .categories-wrapper -->
    </div><!-- end .entry-content -->
<?php endif; ?>
