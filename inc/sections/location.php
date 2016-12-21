<?php  
if ( classified_shop_get_option( 'ad_location_visible' ) == true && function_exists( 'classified_get_featured_aditems' ) ) :
    $tp_location_title = classified_shop_get_option( 'ad_location_title' );
    $tp_location_description = classified_shop_get_option( 'ad_location_description' );
    $no_of_location = classified_shop_get_option( 'num_of_ad_location' );
?>
    <section class="bg-white map">
        <div class="standard-layout page-section">
            <?php if ( ! empty( $tp_location_title ) || ! empty( $tp_location_description ) ) : ?>
                <header class="entry-header">
                    <?php if ( ! empty( $tp_location_title ) ) : ?>
                        <h2 class="entry-title os-animation" data-os-animation="zoomIn" data-os-animation-delay="2s" data-os-animation-duration="2s"><?php echo esc_html( $tp_location_title ); ?></h2>
                    <?php  
                    endif;
                    if ( ! empty( $tp_location_description ) ) :
                    ?>
                        <span class="os-animation" data-os-animation="fadeInDown" data-os-animation-delay="2s" data-os-animation-duration="4s"><?php echo esc_html( strip_tags( htmlspecialchars_decode( $tp_location_description ) ) ); ?></span>
                    <?php endif; ?>
                </header>
            <?php endif; ?>
            <div class="entry-content">
                <div class="locations">
                    <ul>
                        <?php  
                        $tp_border = array( 'border-left-green', 'border-left-blue', 'border-left-red', 'border-left-darkgreen', 'border-left-grey', 'border-left-lightblue' );
                        $tp_taxonomy = 'aditem_location';
                        $tp_location = get_terms( $tp_taxonomy , array( 'hide_empty' => 0, 'number' => $no_of_location ) );
                        $i = 0;
                        foreach ( $tp_location as $tp_location_name ) :
                            if( $i == 6 ) $i = 0;
                        ?>
                            <li class="<?php echo esc_attr( $tp_border[$i] ); ?> os-animation" data-os-animation="zoomIn" data-os-animation-delay="1s" data-os-animation-duration="2s">
                            <a href="<?php echo esc_url( get_term_link( $tp_location_name->slug, $tp_taxonomy ) ); ?>"><i class="fa fa-map-marker"></i><?php echo esc_html( $tp_location_name->name ); ?></a>
                            </li>
                        <?php
                            $i++; 
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div><!-- .end locations -->
            </div><!-- end .entry-content -->
        </div><!-- end .standard-layout -->
    </section>
<?php endif; ?>