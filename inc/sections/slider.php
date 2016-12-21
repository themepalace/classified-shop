<?php 
$slider_option = classified_shop_get_option( 'slider_option' );
$slider_effect = classified_shop_get_option( 'slider_effect_option' );
$slider_effect = ( $slider_effect == 'scroll' ) ? 'scrollHorz' : '';
if( $slider_option == true ) :
?>
    <section class="main-slider">
        <div class="cycle-slideshow" data-cycle-fx="<?php echo esc_attr( $slider_effect ); ?>" data-cycle-timeout="2500" data-cycle-pause-on-hover="false" data-cycle-speed="800" data-cycle-next="#next" data-cycle-prev="#prev">
            
            <?php  
            $no_of_slides = classified_shop_get_option( 'num_of_slider' );

            $page_list = array();
            for ( $i = 1; $i <= $no_of_slides ; $i++ ) { 
                $page_id = classified_shop_get_option( 'slider_page' . $i );
                $page_list = array_merge( $page_list, array( $page_id ) );
            }
            $args = array(
                'post_type'        => 'page',
                'include'          => $page_list,
                'posts_per_page'   => $no_of_slides,
                );
            $the_query = get_pages( $args );

            foreach ($the_query as $page) :
                $tp_title = $page->post_title;
                if ( has_post_thumbnail( $page->ID ) ) :
                    $image = get_the_post_thumbnail( $page->ID, 'large', array( 'alt' => $tp_title, 'class' => 'slider-img' ) );
                    echo $image;
                endif;
            endforeach;
            wp_reset_postdata();
            if ( count( $the_query ) >= 1 ) :
            ?>
                <div class="black-overlay"></div>
                <?php           
                $search_option = classified_shop_get_option( 'section_search_visible' );
                if( $search_option == true ) :
                    $search_title           = classified_shop_get_option( 'search_title' );
                    $search_description     = classified_shop_get_option( 'search_description' );

                    if ( function_exists( 'classified_search_form' ) ) :
                    ?>
                        <div class="search-wrapper">
                            <div class="title os-animation" data-os-animation="fadeInLeft" data-os-animation-delay="0.3s" data-os-animation-duration="1s">
                                <?php  
                                if ( ! empty( $search_title ) ) :
                                    echo '<h1>' . esc_html( $search_title ) . '</h1>';
                                endif;
                                if ( ! empty( $search_description ) ) :
                                    echo '<h3>' . esc_html( strip_tags( htmlspecialchars_decode( $search_description ) ) ) . '</h3>';
                                endif;
                                ?>
                            </div><!-- end .title -->
                            <?php
                            /*
                            * @hooked classified_search_form
                            * @hooked filtered classified_shop_search_form
                            */
                            classified_search_form();
                            ?>
                        </div><!-- end .search-wrapper-->
                    <?php 
                    endif;
                endif;
                $slider_controls = classified_shop_get_option( 'slider_controls' );
                if( $slider_controls == true) :
                ?>
                    <div class="controls">
                        <div class="cycle-prev"><a href="#" id="prev"><i class="fa fa-angle-left"></i></a></div>
                        <div class="cycle-next"><a href="#" id="next"><i class="fa fa-angle-right"></i></a></div>
                    </div><!--end .controls-->
                <?php endif; 
            endif; ?>
        </div><!--end .cycle-slideshow-->
    </section><!--end .main-slider -->
<?php endif; ?>