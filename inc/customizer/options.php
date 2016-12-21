<?php  

if( ! function_exists( 'classified_shop_slider_effect_options' ) ) :

    /**
    * Returns slider effect options.
    *
    * @since Classified Shop 1.0
    */
    function classified_shop_slider_effect_options(){

        $choices = array(
          'default'     => __( 'Fade In', 'classified-shop' ),
          'scroll'  => __( 'Scroll Horizontal', 'classified-shop' ),
        );
        $output = apply_filters( 'classified_shop_slider_effect_options', $choices );
        if ( ! empty( $output ) ) {
          ksort( $output );
        }
        return $output;
        
    }

endif;


if( ! function_exists( 'classified_shop_page_layout_options' ) ) :

/**
* Returns Page layout options.
*
* @since Classified Shop 1.0
*/
    function classified_shop_page_layout_options(){

        $choices = array(
          'sidebar_right' => __( 'Right Sidebar', 'classified-shop' ),
          'sidebar_left'  => __( 'Left Sidebar', 'classified-shop' ),
          'sidebar_none'  => __( 'No Sidebar', 'classified-shop' ),
        );
        $output = apply_filters( 'classified_shop_page_layout_options', $choices );
        if ( ! empty( $output ) ) {
          ksort( $output );
        }
        return $output;

    }

endif;


if( ! function_exists( 'classified_shop_pagination_options' ) ) :

/**
* Returns pagination options.
*
* @since Classified Shop 1.0
*/
    function classified_shop_pagination_options(){

        $choices = array(
          'numeric_pagination' => __( 'Numeric Pagination', 'classified-shop' ),
          'default_pagination'  => __( 'Default Pagination', 'classified-shop' ),
        );
        $output = apply_filters( 'classified_shop_pagination_options', $choices );
        if ( ! empty( $output ) ) {
          ksort( $output );
        }
        return $output;

    }

endif;


if( ! function_exists( 'classified_shop_taxonomy_options' ) ) :

    /**
    * Returns taxonomy options.
    *
    * @since Classified Shop 1.0
    */
    function classified_shop_taxonomy_options(){
        if ( function_exists( 'classified_get_featured_aditems' ) ){
            $choices = array(
              'category'        => __( 'Post Category', 'classified-shop' ),
              'aditem_category' => __( 'AD Category', 'classified-shop' ),
            );
        } else {
            $choices = array(
              'category'        => __( 'Post Category', 'classified-shop' ),
            );
        }
        $output = apply_filters( 'classified_shop_taxonomy_options', $choices );
        if ( ! empty( $output ) ) {
          ksort( $output );
        }
        return $output;
        
    }

endif;