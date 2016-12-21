<footer id="colophon" class="site-footer">
    <div class="standard-layout">   
        <div class="six-col">
            <div class="widget-wrap os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s" data-os-animation-duration="2s">
                <?php 
                wp_nav_menu( array( 
                    'theme_location'    => 'footer-menu', 
                    'depth'             => 1,
                    'menu_class'        => 'menu',
                    'container'         => false,
                    'fallback_cb'       => false,
                  ) 
                ); 
                ?> 
                <p><?php echo wp_kses_data( classified_shop_get_option( 'footer_text' ) ); ?></p>
            </div><!-- end .widget-wrap -->
        </div><!--- end .three-col -->
        <?php if ( has_nav_menu( 'social-menu' ) ) : ?>
            <div class="four-col">
                <div class="widget-wrap os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s" data-os-animation-duration="2s">
                    <h4 class="widget-title"><?php _e( 'Follow Us', 'classified-shop' ); ?></h4>
                    <div class="social-icons">
                        <?php 
                        wp_nav_menu( array( 
                            'theme_location'    => 'social-menu', 
                            'depth'             => 1,
                            'container'         => false,
                            'fallback_cb'       => false,
                          ) 
                        ); 
                        ?> 
                    </div><!-- end social-icons -->
                </div><!-- end .widget-wrap -->
            </div><!--- end .three-col -->
        <?php endif; ?>
        <div class="four-col pull-right">
            <div class="widget-wrap os-animation" data-os-animation="zoomIn" data-os-animation-delay="0.3s" data-os-animation-duration="2s">
                <h4 class="widget-title"><?php _e( 'Proudly powered by WordPress', 'classified-shop' ); ?></h4>
                <span><?php _e( 'Classified Shop by Theme Palace', 'classified-shop' ); ?></span>
            </div><!-- end .widget-wrap -->
        </div><!--- end .three-col -->
    </div><!-- end .standard-layout -->
</footer><!-- end .site-footer -->