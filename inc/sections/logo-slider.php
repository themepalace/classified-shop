<?php 
$logo_slider_option = classified_shop_get_option( 'logo_slider_option' );
if( $logo_slider_option == 'enabled') :
?>
    <section id="logo-carousel" class="bg-white">
        <div class="standard-layout page-section">
            <div class="cycle-slideshow os-animation" data-os-animation="bounceIn" data-os-animation-delay="1s" data-os-animation-duration="2s" data-cycle-timeout="3000" data-cycle-fx="carousel" data-cycle-carousel-visible="4" data-cycle-slides=">a">
            	<?php  
        		$no_of_logo_slider = classified_shop_get_option( 'num_of_logo_slider' );
        		for ( $i = 1; $i <= $no_of_logo_slider; $i++ ) {
                    $id = null;
                    if ( ! empty( classified_shop_get_option( 'logo_slider_page'.$i ) ) ) {
                        $id = classified_shop_get_option( 'logo_slider_page'.$i );
                    }
                    if ( ! empty( $id ) ) {
                        $ids[] = absint( $id );
                    }
                }

                // Bail if no valid pages are selected.
                if ( empty( $ids ) ) {
                    return ;
                }
                $args = array(
                    'no_found_rows'  => true,
                    'orderby'        => 'post__in',
                    'post_type'      => 'page',
                    'include'       => $ids,
                );

                $posts = get_posts( $args );
                foreach ( $posts as $post ) {
                    if ( has_post_thumbnail( $post->ID ) ) :
                    ?> 
                        <a href="<?php the_permalink( $post->ID ); ?>">
                        <?php the_post_thumbnail( $post->ID, $size = 'post-thumbnail', $attr = array( 'alt' => $post->name ) ); ?>
                        </a>
                    <?php
                    endif;
                }
            	?>              
            </div><!--end .cycle-slideshow-->
        </div><!-- end .standard-layout -->
    </section>
<?php endif; ?>