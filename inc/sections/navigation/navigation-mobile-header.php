<!-- Mobile Menu -->
<nav id="sidr-left-top" class="mobile-menu sidr left">
    <div class="site-branding">
        <?php the_custom_logo(); ?>
    </div>
    <?php 
    wp_nav_menu( array( 
        'theme_location' => 'primary', 
        'container' => false,
        'depth' => 3,
        ) 
    ); 
    ?> 
</nav><!-- end left-menu -->
<a id="sidr-left-top-button" class="menu-button right" href="#sidr-left-top"><i class="fa fa-bars"></i></a>