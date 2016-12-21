<?php  

/**
 * Default theme options.
 *
 * @package Classified Shop 1.0
 */

if ( ! function_exists( 'classified_shop_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since  Classified Shop 1.0
	 */
	function classified_shop_get_default_theme_options() {
		$defaults 								= array();

		// Header.
		$defaults['site_logo']              	= '';

		// Post AD
		$defaults['post_ad_visible']        	= true;
		$defaults['post_ad_target']        		= true;
		$defaults['post_ad_url']            	= '';
		$defaults['post_ad_icon']            	= 'fa-file-text-o';
		$defaults['post_ad_title']            	= esc_html__( 'Post AD', 'classified-shop' );

		// slider
		$defaults['slider_option']        		= false;
		$defaults['slider_effect_option']       = 'default';
		$defaults['num_of_slider']        		= 2;
		$defaults['slider_controls']        	= true;

		// logo slider
		$defaults['logo_slider_option']        	= 'enabled';
		$defaults['num_of_logo_slider']        	= 3;

		// logo slider
		$defaults['num_of_products']        	= 8;

		// Shop screen
		$defaults['shop_screen_visible']        = true;
		$defaults['shop_screen_target']        	= true;
		$defaults['shop_screen_image_target']   = true;
		$defaults['shop_screen_title']        	= __( 'Shop Screen', 'classified-shop' );
		$defaults['shop_screen_description']    = __( 'Stay in touch with stylish screens', 'classified-shop' );
		$defaults['shop_screen_link']        	= '#';
		$defaults['shop_screen_link_title']     = __( 'Price starts from $450', 'classified-shop' );
		$defaults['num_of_shop_screen_image']   = 5;

		// categories section
		$defaults['categories_visible']        	= true;
		$defaults['taxonomy_option']        	= 'category';
		$defaults['category_title']        		= __( 'Categories', 'classified-shop' );
		$defaults['category_description']    	= __( 'The full list of all our items consectetur adipisicing elit, explore.', 'classified-shop' );

		// Ad location section
		$defaults['ad_location_title']        	= __( 'AD Locations', 'classified-shop' );
		$defaults['ad_location_description']    = __( 'Classiads provided you a ads locations section where you can add your desired locations there is no limit for the locations so do it as you would like to.', 'classified-shop' );
		$defaults['num_of_ad_location']        	= 25;
		$defaults['ad_location_visible']        = false;

		// slider search section
		$defaults['section_search_visible']     = true;
		$defaults['search_title']       		= __( 'Search market', 'classified-shop' );
		$defaults['search_description']       	= __( 'Market helps you find out whats happening in your city, Lets explore', 'classified-shop' );

		// scroll too button
		$defaults['scroll_top_visible']        	= true;

		// product section
		$defaults['products_visible']       	= true;
		$defaults['product_tab1']       		= false;
		$defaults['product_tab2']       		= false;
		$defaults['product_tab3']       		= true;
		$defaults['num_of_products']       		= 8;

		// Page layout
		$defaults['pagination_option']       	= 'numeric_pagination';

		// Footer.
		$defaults['footer_text'] 				= __( '&copy; 2016. Classified. All Rights Reserved.', 'classified-shop' );

		// Blog.
		$defaults['excerpt_length'] 			= 20;
		$defaults['thumbnail_excerpt_length'] 	= 7;
		$defaults['list_excerpt_length'] 		= 10;

		// Display Static Page
		$defaults['static_page_visible'] 		= true;

		//Reset Settings
		$defaults['reset_all_settings'] 		= false;

		// Pass through filter.
		$defaults = apply_filters( 'classified_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
