<?php  
/**
 * @package Classified Shop 1.0
 */
?>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <input type="text" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo _e( 'Search..', 'classified-shop' ) ; ?>" name="s" id="s" /> 
        <button type="submit"><i class="fa fa-search"></i></button>
    </div>
</form>