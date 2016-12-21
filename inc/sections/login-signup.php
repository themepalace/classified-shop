<?php  
/**
 * Primary Menu Filter functions.
 *
 * @package Classified Shop 1.0
 */

if ( ! function_exists( 'classified_shop_add_post_ad' ) ) :

    /**
     * Post AD Function
     *
     * @since Classified Shop 1.0
     */
    function classified_shop_add_post_ad() {
        $post_ad_visible = classified_shop_get_option( 'post_ad_visible' );
        $post_ad_title = classified_shop_get_option( 'post_ad_title' );
        if( $post_ad_visible == true && ! empty( $post_ad_title ) ) :
            $post_ad_target = classified_shop_get_option( 'post_ad_target' ) ? '_blank' : '';
            $post_ad_url = classified_shop_get_option( 'post_ad_url' );
            $post_ad_icon = classified_shop_get_option( 'post_ad_icon' );
            $val = '<li class="' . esc_attr( $post_ad_visible ) . '">
                        <div class="post-ad">
                            <a target="' . esc_attr($post_ad_target) . '" href="' . esc_url( $post_ad_url ) . '">
                            <i class="fa ' . esc_attr($post_ad_icon) . '"></i>' . esc_html( $post_ad_title ) . '</a>
                        </div><!-- end .post-ad -->
                    </li>';
            return $val;
        endif; 
    }
endif;


add_filter('wp_nav_menu_items','classified_shop_post_ad_function', 10, 2);
if ( ! function_exists( 'classified_shop_post_ad_function' ) ) :

    /**
     * Filter Primary Navigation.
     *
     * @since Classified Shop 1.0
     */
    function classified_shop_post_ad_function( $nav, $args ) {

        if( $args->theme_location == 'primary' ) {
            $val = classified_shop_add_post_ad();
            
            return $nav.$val;
        }
        return $nav;
    }
endif;