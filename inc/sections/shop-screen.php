<!-- shop screen -->
<?php  
if ( classified_shop_get_option( 'shop_screen_visible' ) == true ) :
    $shop_screen_title          = classified_shop_get_option( 'shop_screen_title');
    $shop_screen_description    = classified_shop_get_option( 'shop_screen_description');
    $shop_screen_link           = classified_shop_get_option( 'shop_screen_link');
    $shop_screen_link_title     = classified_shop_get_option( 'shop_screen_link_title');
    $shop_screen_target         = ( classified_shop_get_option( 'shop_screen_target') == true ) ? '_blank' : '';
    $shop_screen_image_target   = ( classified_shop_get_option( 'shop_screen_image_target') == true ) ? '_blank' : '';

?>
    <div class="shop-screens bg-grey">
        <div class="two-col">
            <?php if ( ! empty( $shop_screen_title ) || ! empty( $shop_screen_description ) ) : ?>
                <div class="title">
                    <?php if ( ! empty( $shop_screen_title ) ) : ?>
                        <h1 class="os-animation" data-os-animation="zoomIn" data-os-animation-delay="1s" data-os-animation-duration="2s"><?php echo esc_html( $shop_screen_title ); ?></h1>
                    <?php  
                    endif;
                    if ( ! empty( $shop_screen_description ) ) :
                    ?>
                        <span class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="2s" data-os-animation-duration="2s"><?php echo esc_html( strip_tags( htmlspecialchars_decode( $shop_screen_description ) ) ); ?></span>
                    <?php endif; ?>
                </div><!-- end .title-->
            <?php 
            endif;
            if ( ! empty( $shop_screen_link_title ) ) : 
            ?>
                <a href="<?php echo esc_url( $shop_screen_link ); ?>" target="<?php echo esc_attr( $shop_screen_target ); ?>" ><span class="btn btn-large btn-red os-animation" data-os-animation="slideInDown" data-os-animation-delay="2s" data-os-animation-duration="2s"><?php echo esc_html( $shop_screen_link_title ); ?></span></a>
            <?php endif; ?>
        </div><!-- end .two-col -->

        <div class="two-col">
            <div class="screenshots-wrapper">   
                <?php  
                switch ( classified_shop_get_option( 'num_of_shop_screen_image' ) ) {
                    case 6:
                ?>
                    <div class="three-col">
                        <?php 
                        for ( $i = 1; $i <= 6; $i++ ) {
                            $id = null;
                            if ( ! empty( classified_shop_get_option( 'shop_screen_page_'.$i ) ) ) {
                                $id = classified_shop_get_option( 'shop_screen_page_'.$i );
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
                        $i = 1;
                        foreach ( $posts as $post ) { ?>
                            <div class="bg-white half os-animation" data-os-animation="fadeIn" data-os-animation-delay="2s" data-os-animation-duration="2s">
                                <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                                    <a href="<?php the_permalink( $post->ID ); ?>" target="<?php echo esc_attr( $shop_screen_image_target ); ?>">
                                    <?php the_post_thumbnail( $post->ID, $size = 'large', $attr = array( 'alt' => get_the_title( $post->ID ) ) ); ?>
                                    </a>
                                <?php endif; ?>
                            </div><!-- end .bg-white -->   
                            <?php if ( $i%2 == 0 ) : ?>  
                                </div>  
                                <div class="three-col">
                            <?php 
                            endif;
                            $i++; 
                        }
                        ?>
                    </div><!-- end .three-col -->
                <?php          
                    break;
                case 5:
                ?>
                    <div class="three-col">
                        <?php 
                        for ( $i = 1; $i <= 5; $i++ ) {
                            $id = null;
                            if ( ! empty( classified_shop_get_option( 'shop_screen_page_'.$i ) ) ) {
                                $id = classified_shop_get_option( 'shop_screen_page_'.$i );
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
                        $i = 1;
                        foreach ( $posts as $post ) { 
                            $image_num = ( $i == 3 ) ? 'full' : 'half'; ?>
                            <div class="bg-white <?php echo esc_attr( $image_num ); ?> os-animation" data-os-animation="fadeIn" data-os-animation-delay="2s" data-os-animation-duration="2s">
                                <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                                    <a href="<?php the_permalink( $post->ID ); ?>" target="<?php echo esc_attr( $shop_screen_image_target ); ?>">
                                    <?php the_post_thumbnail( $post->ID, $size = 'large', $attr = array( 'alt' => get_the_title( $post->ID ) ) ); ?>
                                    </a>
                                <?php endif; ?>
                            </div><!-- end .bg-white -->   
                            <?php if ( $i%2 == 0 || $i%3 == 0 ) : ?> 
                                </div>  
                                <div class="three-col">
                            <?php 
                            endif;
                            $i++; 
                        }
                        ?>
                    </div><!-- end .three-col -->
                <?php  
                    break;
                case 4:
                ?>
                <div class="two-col">
                    <?php 
                        for ( $i = 1; $i <= 4; $i++ ) {
                            $id = null;
                            if ( ! empty( classified_shop_get_option( 'shop_screen_page_'.$i ) ) ) {
                                $id = classified_shop_get_option( 'shop_screen_page_'.$i );
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
                        $i = 1;
                        foreach ( $posts as $post ) { ?>
                             <div class="bg-white ncurses_halfdelay(tenth) os-animation" data-os-animation="fadeIn" data-os-animation-delay="2s" data-os-animation-duration="2s">
                                <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                                    <a href="<?php the_permalink( $post->ID ); ?>" target="<?php echo esc_attr( $shop_screen_image_target ); ?>">
                                    <?php the_post_thumbnail( $post->ID, $size = 'large', $attr = array( 'alt' => get_the_title( $post->ID ) ) ); ?>
                                    </a>
                                <?php endif; ?>
                            </div><!-- end .bg-white -->   
                            <?php if ( $i%2 == 0 ) : ?>  
                                </div>  
                                <div class="two-col">
                            <?php 
                            endif;
                            $i++; 
                        }
                        ?>
                    </div><!-- end .three-col -->
                    <?php  
                        break;
                    case 3:
                        for ( $i = 1; $i <= 3; $i++ ) {
                            $id = null;
                            if ( ! empty( classified_shop_get_option( 'shop_screen_page_'.$i ) ) ) {
                                $id = classified_shop_get_option( 'shop_screen_page_'.$i );
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
                        $i = 1;
                        foreach ( $posts as $post ) { ?>
                            <div class="three-col">
                                <div class="bg-white full os-animation" data-os-animation="fadeIn" data-os-animation-delay="2s" data-os-animation-duration="2s">
                                    <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                                        <a href="<?php the_permalink( $post->ID ); ?>" target="<?php echo esc_attr( $shop_screen_image_target ); ?>">
                                        <?php the_post_thumbnail( $post->ID, $size = 'large', $attr = array( 'alt' => get_the_title( $post->ID ) ) ); ?>
                                        </a>
                                    <?php endif; ?>
                                </div><!-- end .bg-white --> 
                            </div>  
                            <?php
                            $i++; 
                        }
                        break;
                    case 2:
                        for ( $i = 1; $i <= 2; $i++ ) {
                            $id = null;
                            if ( ! empty( classified_shop_get_option( 'shop_screen_page_'.$i ) ) ) {
                                $id = classified_shop_get_option( 'shop_screen_page_'.$i );
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
                        $i = 1;
                        foreach ( $posts as $post ) { ?>
                            <div class="two-col">
                                <div class="bg-white full os-animation" data-os-animation="fadeIn" data-os-animation-delay="2s" data-os-animation-duration="2s">
                                    <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                                        <a href="<?php the_permalink( $post->ID ); ?>" target="<?php echo esc_attr( $shop_screen_image_target ); ?>">
                                        <?php the_post_thumbnail( $post->ID, $size = 'large', $attr = array( 'alt' => get_the_title( $post->ID ) ) ); ?>
                                        </a>
                                    <?php endif; ?>
                                </div><!-- end .bg-white --> 
                            </div>  
                            <?php
                            $i++; 
                        }
                        break;
                    case 1:
                        for ( $i = 1; $i <= 1; $i++ ) {
                            $id = null;
                            if ( ! empty( classified_shop_get_option( 'shop_screen_page_'.$i ) ) ) {
                                $id = classified_shop_get_option( 'shop_screen_page_'.$i );
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
                        $i = 1;
                        foreach ( $posts as $post ) { ?>
                            <div class="one-col">
                                <div class="bg-white full os-animation" data-os-animation="fadeIn" data-os-animation-delay="2s" data-os-animation-duration="2s">
                                    <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                                        <a href="<?php the_permalink( $post->ID ); ?>" target="<?php echo esc_attr( $shop_screen_image_target ); ?>">
                                        <?php the_post_thumbnail( $post->ID, $size = 'large', $attr = array( 'alt' => get_the_title( $post->ID ) ) ); ?>
                                        </a>
                                    <?php endif; ?>
                                </div><!-- end .bg-white --> 
                            </div>  
                            <?php
                            $i++; 
                        }
                    break;
                }
                ?>     
            </div><!-- end .screenhots-wrapper -->
        </div><!-- end .two-col -->
    </div><!-- end .shop-screens -->
<?php endif; ?>
<div class="clear"></div>