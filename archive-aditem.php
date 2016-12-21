<?php
/**
* The template for displaying archive pages.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package Classified Shop 1.0
*/

get_header(); 

$classified_shop_layout = 'sidebar_right';
?>
<main id="main" class="site-main <?php echo esc_attr( classified_shop_page_option( $classified_shop_layout ) ); ?>" role="main">
    <section>
        <?php if( function_exists( 'classified_search_form' ) ) : ?>
            <div class="search-wrapper list-gridview">
                <?php
                /*
                * @hooked classified_search_form
                */
                classified_search_form();
                ?>
            </div><!-- end .search-wrapper-->
        <?php endif; ?>

        <ul class="tabs product-tab">
            <li class="tab-link active" data-tab="tab-1">
                <div class="form-group">
                    <i class="fa fa-th-large"></i>
                </div><!-- end .form-group -->
            </li>
            <li class="tab-link" data-tab="tab-2">
                <div class="form-group">
                    <i class="fa fa-th-list"></i>
                </div><!-- end .form-group -->
            </li>
        </ul><!-- end .tabs -->

    <div id="tab-1" class="tab-content active productlist">
        <div class="product-list-wrapper list-gridview">
            <?php
            $i = 1;
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                $tp_taxonomy           = 'aditem_category';
                $tp_location_taxonomy  = 'aditem_location';
                $tp_price              = get_post_meta( get_the_ID(), '_aditem_price', true );
                $tp_name               = get_post_meta( get_the_ID(), '_aditem_contact_full_name', true );
                $tp_location           = wp_get_post_terms( get_the_ID(), $tp_location_taxonomy, array("fields" => "all") );
                $tp_location_name      = ! empty( $tp_location ) ? $tp_location[0]->name : '';
                $tp_location_slug      = ! empty( $tp_location ) ? $tp_location[0]->slug : '';
                $tp_cat                = wp_get_post_terms( get_the_ID(), $tp_taxonomy, array("fields" => "ids") );
                $tp_cat_id             = ! empty( $tp_cat ) ? $tp_cat[0] : '';
                $tp_cat_data           = get_option("taxonomy_$tp_cat_id");
                $tp_icon               = wsc_get_category_icon( $tp_cat_id );
                ?>
                <div class="product-list three-col os-animation 
                    <?php 
                    if( $i == 1 || $i%4 == 0) :
                        echo 'first';
                    elseif( $i%3 == 0 ) :
                        echo 'last';
                    endif;
                    ?>
                    " data-os-animation="fadeIn" data-os-animation-delay="0.1s" data-os-animation-duration="2s">
                    <div class="product-image product-list-desc os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.1s" data-os-animation-duration="1.5s">
                        <a href="<?php the_permalink(); ?>">
                            <?php  
                            if ( has_post_thumbnail() ) :
                                the_post_thumbnail( 'post-thumbnail', array( 'alt' => esc_attr( get_the_title() ) ) );
                            else :
                                echo '<img src="' . get_template_directory_uri() . '/assets/uploads/demo-300x200.jpg" alt="thumbnail">';
                            endif; 
                            ?>
                        </a>
                        <div class="icon-left">
                            <div class="icon os-animation" data-os-animation="rollIn" data-os-animation-delay="0.3s" data-os-animation-duration="2s" style="background:<?php echo esc_attr( $tp_cat_data['custom_term_color_meta'] ); ?>">
                                <i class="fa <?php echo esc_attr( $tp_icon ? $tp_icon : 'fa-tag' ); ?>"></i>
                            </div><!-- end .icon -->
                        </div><!-- end .icon-left -->
                    </div><!-- end .product-image -->
                    <div class="product-list-desc">
                        <div class="prod-desc-wrapper">
                            <h1 class="product_title os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s" data-os-animation-duration="1s">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h1>     
                            <div class="product-meta">
                                <ul class="os-animation" data-os-animation="slideInDown" data-os-animation-delay="0.1s" data-os-animation-duration="1s">
                                    <li><i class="fa fa-calendar"></i><?php echo date_i18n( 'M d', strtotime(get_the_date( 'M d' ) ) ); ?></li>
                                    <li><i class="fa fa-user"></i><?php echo esc_html( $tp_name ); ?></li>
                                    <?php if ( ! empty( $tp_location_name ) ) : ?>
                                    <li><a href="<?php echo esc_url( get_term_link( $tp_location_slug, $tp_location_taxonomy ) ); ?>"><i class="fa fa-map-marker"></i><?php echo esc_html( $tp_location_name ); ?></a></li>
                                    <?php endif; ?>
                                </ul>
                                <p><?php echo wp_trim_words( get_the_excerpt(), classified_shop_get_option( 'list_excerpt_length' ), '...' ) ?></p>
                            </div><!-- end .product-meta -->
                        </div><!-- end .pull-right-->
                    </div><!-- end .product-list-desc -->
                    <div class="product-price">
                    <h2 class="price os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.1s" data-os-animation-duration="1s"><?php echo wsc_price( $tp_price ); ?></h2>
                    <a href="<?php the_permalink(); ?>" class="read-more os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.1s" data-os-animation-duration="1s"><?php _e( 'Read More', 'classified-shop' ); ?></a>
                    </div><!-- end .product-price -->
                </div><!-- end .product-list -->
            <?php
            $i++; endwhile; 
            else :
            get_template_part( 'template-parts/content', 'none' );
            endif; 
            ?>
        </div><!-- end .product-list-wrapper -->
    </div><!-- end #tab-1 -->

    <div id="tab-2" class="tab-content productlist">
        <div class="product-list-wrapper">
            <?php
            if ( have_posts() ) : while ( have_posts() ) : the_post();
                $tp_taxonomy 			 = 'aditem_category';
                $tp_location_taxonomy    = 'aditem_location';
                $tp_price 				 = get_post_meta( get_the_ID(), '_aditem_price', true );
                $tp_name 		         = get_post_meta( get_the_ID(), '_aditem_contact_full_name', true );
                $tp_location   		     = wp_get_post_terms( get_the_ID(), $tp_location_taxonomy, array("fields" => "all") );
                $tp_location_name   	 = ! empty( $tp_location ) ? $tp_location[0]->name : '';
                $tp_location_slug   	 = ! empty( $tp_location ) ? $tp_location[0]->slug : '';
                $tp_cat            	     = wp_get_post_terms( get_the_ID(), $tp_taxonomy, array("fields" => "ids") );
                $tp_cat_id         	     = !empty( $tp_cat ) ? $tp_cat[0] : '';
                $tp_cat_data       	     = get_option("taxonomy_$tp_cat_id");
                $tp_icon                 = wsc_get_category_icon( $tp_cat_id );
                ?>
            <div class="product-list os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.1s" data-os-animation-duration="1s">
                <div class="product-image os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s" data-os-animation-duration="1s">
                    <a href="<?php the_permalink(); ?>">
                        <?php  
                        if ( has_post_thumbnail() ) :
                            the_post_thumbnail( get_the_id(), 'post-thumbnail', array( 'alt' => esc_attr( get_the_title() ) ) );
                        else :
                            echo '<img src="' . get_template_directory_uri() . '/assets/uploads/demo-300x200.jpg" alt="thumbnail">';
                        endif; 
                        ?>
                    </a>
                </div><!-- end .product-image -->
                <div class="product-list-desc">
                    <div class="icon-left">
                        <div class="icon os-animation" data-os-animation="rollIn" data-os-animation-delay="0.3s" data-os-animation-duration="1s" style="background:<?php echo esc_attr( $tp_cat_data['custom_term_color_meta'] ); ?>">
                            <i class="fa <?php echo esc_attr( $tp_icon ? $tp_icon : 'fa-tag' ); ?>"></i>
                        </div><!-- end .icon -->
                    </div><!-- end .icon-left -->
                    <div class="prod-desc-wrapper">
                        <h1 class="product_title os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s" data-os-animation-duration="0.5s">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h1>
                        <div class="product-meta">
                            <ul class=" os-animation" data-os-animation="slideInDown" data-os-animation-delay="0.3s" data-os-animation-duration="0.5s">
                            <li><i class="fa fa-calendar"></i><?php echo date_i18n( 'M d', strtotime(get_the_date( 'M d' ) ) ); ?></li>
                            <li><i class="fa fa-user"></i><?php echo esc_html( $tp_name ); ?></li>
                            <?php if ( ! empty( $tp_location_name ) ) : ?>
                                <li><a href="<?php echo esc_url( get_term_link( $tp_location_slug, $tp_location_taxonomy ) ); ?>"><i class="fa fa-map-marker"></i><?php echo esc_html( $tp_location_name ); ?></a></li>
                            <?php endif; ?>
                            </ul>
                            <p class="os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s" data-os-animation-duration="2s"><p><?php echo wp_trim_words( get_the_excerpt(), classified_shop_get_option( 'list_excerpt_length' ), '...' ) ?></p></p>
                        </div><!-- end .product-meta -->
                    </div><!-- end .pull-right-->
                </div><!-- end .product-list-desc -->
                <div class="product-price">

                    <h2 class="price os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0.3s" data-os-animation-duration="1s"><?php echo wsc_price( $tp_price ); ?></h2>
                    <a href="<?php the_permalink(); ?>" class="read-more os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s" data-os-animation-duration="1s"><?php _e( 'Read More', 'classified-shop' ); ?></a>

                </div><!-- end .product-price -->
            </div>
            <?php
            endwhile; 
            else :
            get_template_part( 'template-parts/content', 'none' );
            endif; ?>
        </div><!-- end .product-list-wrapper -->  
    </div><!-- end tab2 -->  

    <?php 
    /**
    * Hook - classified_shop_action_pagination.
    */
    do_action( 'classified_shop_action_pagination' ); 
    ?>
    <div class="clear"></div>
    </section><!-- end section -->	
</main><!-- #main -->	
<?php 
$classified_shop_page_layout = classified_shop_get_option( 'page_layout' );

if ( classified_shop_sidebar_option( $classified_shop_page_layout ) != 'hide' ) :
    get_sidebar(); 
endif;

get_footer();
