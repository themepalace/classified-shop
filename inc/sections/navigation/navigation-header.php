<div class="menu-wrapper">
    <div class="site-branding alignleft"><!-- use alignright class to change logo position -->
        <div class="site-logo">
            <?php the_custom_logo(); ?>
        </div><!-- end .site-logo -->

        <div id="site-header">
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html( bloginfo( 'name' ) ); ?></a></h1>
                <?php
                $tp_site_description = get_bloginfo( 'description', 'display' );
                if ( $tp_site_description || is_customize_preview() ) : ?>
                    <h2 class="site-description"><?php echo esc_html( $tp_site_description ); ?></h2>
                <?php endif; ?>
        </div><!-- end #site-header -->  
    </div><!--end .site-branding-->

    <nav id="site-navigation" class="main-navigation">
        <?php 
        wp_nav_menu( array( 
            'theme_location' => 'primary',
            'container_class' => 'main-menu-container standard-layout',
            'depth' => 3,
            ) 
        ); 
        ?> 
    </nav><!--end .main-navigation-->
</div><!-- end .menu-wrapper -->

