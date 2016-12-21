<?php  

if ( ! function_exists( 'classified_shop_doctype' ) ) :
    /**
    * Doctype Declaration
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_doctype() { ?>
        <!DOCTYPE html> <html <?php language_attributes(); ?> >
    <?php
    }
endif;

add_action( 'classified_shop_action_doctype', 'classified_shop_doctype', 10 );


if ( ! function_exists( 'classified_shop_head' ) ) :
    /**
    * Header Codes
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_head() {
    ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="<?php echo esc_attr( classified_shop_get_option( 'seo_meta_keywords' ) ); ?>">
        <meta name="description" content="<?php echo esc_attr( classified_shop_get_option( 'seo_meta_description' ) ); ?>">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
    }
endif;

add_action( 'classified_shop_action_head', 'classified_shop_head', 10 );


if ( ! function_exists( 'classified_shop_page_start' ) ) :
    /**
    * Page Start
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_page_start() {
    ?>
        <div id="page" class="container hfeed site">
            <div class="site-inner">
    <?php
    }
endif;

add_action( 'classified_shop_action_before', 'classified_shop_page_start' );


if ( ! function_exists( 'classified_shop_page_end' ) ) :
    /**
    * Page End
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_page_end() {
    ?>
            </div><!--end .site-inner-->
        </div><!--end .site-->
    <?php
    }
endif;

add_action( 'classified_shop_action_after', 'classified_shop_page_end' );


if ( ! function_exists( 'classified_shop_header_start' ) ) :
    /**
    * Header Start
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_header_start() { ?>
        <header id="masthead" class="site-header" role="banner">
    <?php
    }
endif;

add_action( 'classified_shop_action_before_header', 'classified_shop_header_start' );


if ( ! function_exists( 'classified_shop_header_end' ) ) :
    /**
    * Header End
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_header_end() { ?>
        </header><!--end masthead-->
    <?php
    }
endif;

add_action( 'classified_shop_action_after_header', 'classified_shop_header_end' );


if ( ! function_exists( 'classified_shop_nav_menu' ) ) :
    /**
    * Header Navigation
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_nav_menu() {
        get_template_part( 'inc/sections/navigation/navigation','header' );
    }
endif;

add_action( 'classified_shop_action_nav_menu', 'classified_shop_nav_menu', 10 );


if ( ! function_exists( 'classified_shop_mobile_nav_menu' ) ) :
    /**
    * Header Mobile Navigation
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_mobile_nav_menu() {
        get_template_part( 'inc/sections/navigation/navigation-mobile-header' );
    }
endif;

add_action( 'classified_shop_action_mobile_nav_menu', 'classified_shop_mobile_nav_menu', 10 );


if ( ! function_exists( 'classified_shop_content_start' ) ) :
    /**
    * Start div id #content
    *
    * Site content starts
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_content_start() { ?>
        <div id="content" class="site-content">
    <?php
    }
endif;

add_action( 'classified_content_before', 'classified_shop_content_start', 10 );


if ( ! function_exists( 'classified_shop_content_end' ) ) :
    /**
    * end div id #content
    *
    * Site content ends
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_content_end() { ?>
        </div><!--end .site-content-->
    <?php
    }
endif;

add_action( 'classified_shop_content_after', 'classified_shop_content_end', 10 );


if ( ! function_exists( 'classified_shop_primary_content_start' ) ) :
    /**
    * Start div id #content
    *
    * Site primary content starts
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_primary_content_start() { ?>
        <div id="primary" class="content-area">
    <?php
    }
endif;

add_action( 'classified_primary_content_before', 'classified_shop_primary_content_start', 10 );


if ( ! function_exists( 'classified_shop_primary_content_end' ) ) :
    /**
    * end div id #content
    *
    * Site primary content ends
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_primary_content_end() { ?>
        </div><!-- end .content-area -->
    <?php
    }
endif;

add_action( 'classified_shop_primary_content_after', 'classified_shop_primary_content_end', 10 );


if ( ! function_exists( 'classified_shop_footer' ) ) :
    /**
    *
    * Site Footer
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_footer() { 
        get_template_part( 'inc/sections/footer-section' );
    }
endif;

add_action( 'classified_shop_action_footer', 'classified_shop_footer', 10 );


if ( ! function_exists( 'classified_shop_slider' ) ) :
    /**
    *
    * Slider
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_slider() { 
        if ( ! is_home() && is_front_page() ) :
            get_template_part( 'inc/sections/slider' );
        endif;
    }
endif;

add_action( 'classified_shop_action_slider', 'classified_shop_slider', 10 );


if ( ! function_exists( 'classified_shop_products' ) ) :
    /**
    *
    * Index products
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_products() { 
        if ( ! is_home() && is_front_page() ) :
            get_template_part( 'inc/sections/products' );
        endif;
    }
endif;

add_action( 'classified_shop_action_products', 'classified_shop_products', 10 );


if ( ! function_exists( 'classified_shop_category' ) ) :
    /**
    *
    * Index category
    * Index Shop Screen
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_category() { 
        if ( ! is_home() && is_front_page() ) :
        ?>
            <section class="bg-white">
                <div class="standard-layout page-section">
                    <?php  
                    get_template_part( 'inc/sections/category' );
                    get_template_part( 'inc/sections/shop-screen' );
                    ?>
                </div><!-- end .standard-layout/.page-section -->
            </section><!-- end .bg-white -->
        <?php
        endif;
    }
endif;

add_action( 'classified_shop_action_category', 'classified_shop_category', 10 );


if ( ! function_exists( 'classified_shop_location' ) ) :
    /**
    *
    * Index location
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_location() { 
        if ( ! is_home() && is_front_page() ) :
            get_template_part( 'inc/sections/location' );
        endif;
    }
endif;

add_action( 'classified_shop_action_location', 'classified_shop_location', 10 );


if ( ! function_exists( 'classified_shop_logo_slider' ) ) :
    /**
    *
    * Index logo_slider
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_logo_slider() { 
        if ( ! is_home() && is_front_page() ) :
            get_template_part( 'inc/sections/logo-slider' );
        endif;
    }
endif;

add_action( 'classified_shop_action_logo_slider', 'classified_shop_logo_slider', 10 );


if ( ! function_exists( 'classified_shop_backtotop' ) ) :
    /**
    *
    * Backtotop
    *
    * @since Classified Shop 1.0
    *
    */
    function classified_shop_backtotop() { 
        if ( classified_shop_get_option( 'scroll_top_visible' ) == true ) :
        ?>
            <div class="backtotop"><i class="fa fa-angle-up"></i></div><!--end .backtotop-->
        <?php
        endif;
    }
endif;

add_action( 'classified_shop_action_backtotop', 'classified_shop_backtotop', 10 );


if ( ! function_exists( 'classified_shop_search_form' ) ) :

    /**
    * Custom Classified Search Box
    *
    * @since Classified Shop 1.0
    */
    function classified_shop_search_form( $content ) {
        ob_start();
        ?>
        <form class=" os-animation" data-os-animation="fadeInRight" data-os-animation-delay="0.3s" data-os-animation-duration="1s" method="get" name="classified_search" action="<?php echo esc_url( home_url( '/' ) );  ?>">
            <input type="hidden" name="post_type" value="aditem" />
            <div class="form-group">
                <input type="text" id="s" name="s" placeholder="<?php _e( 'Search', 'classified-shop' ); ?>" class="form-control">
            </div><!-- end .form-group -->
            <div class="form-group dropdown-arrow">
                <?php
                $taxonomy = 'aditem_category';
                $args = array(
                    'show_option_all'    => __( 'Category', 'classified-shop' ),
                    'hide_empty'         => 0,              
                    'selected'           => 1,
                    'hierarchical'       => 1,
                    'name'               => $taxonomy,
                    'class'              => 'form-control category',              
                    'taxonomy'           => $taxonomy,
                    'selected'           => ( isset( $_GET[$taxonomy] ) ) ? esc_textarea( $_GET[$taxonomy] ) : 0,
                    'value_field'        => 'slug'
                );

                wp_dropdown_categories( $args, $taxonomy );
                ?>
            </div><!-- end .form-group -->
            <div class="form-group dropdown-arrow">
                <?php
                // only update some keys in arry
                $taxonomy = 'aditem_location';
                $args = array(
                    'show_option_all'    => __( 'Location', 'classified-shop' ),
                    'hide_empty'         => 0,              
                    'selected'           => 1,
                    'hierarchical'       => 1,
                    'name'               => $taxonomy,
                    'class'              => 'form-control',              
                    'taxonomy'           => $taxonomy,
                    'selected'           => ( isset( $_GET[$taxonomy] ) ) ? esc_textarea( $_GET[$taxonomy] ) : 0,
                    'value_field'        => 'slug'
                );

                wp_dropdown_categories( $args, $taxonomy ); 
                ?>
            </div><!-- end .form-group -->
            <div class="form-group">
                <?php if( is_front_page() ) : ?>
                    <input type="submit" name="classified_search" value="<?php _e( 'SEARCH', 'classified-shop' ); ?>" class="form-control">
                <?php else : ?>
                    <button type="submit" name="classified_search" value="" class="form-control"><i class="fa fa-search" ></i></button>
                <?php endif; ?>
            </div><!-- end .form-group -->
        </form>
        <?php
        $content = ob_get_clean();
        // ob_clean();
        return $content;
    }
endif;

add_filter( 'classified_search_form', 'classified_shop_search_form', 10 );
