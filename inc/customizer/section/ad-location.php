<?php  
$default = classified_shop_get_default_theme_options();
if ( function_exists( 'classified_get_featured_aditems' ) ) :
	/*AD Location Section*/
	$wp_customize->add_section( 'section_ad_location',
		array(
			'title'      		=> __( 'AD Locations', 'classified-shop' ),
			'priority'   		=> 600,
			'panel'      		=> 'section_option_panel',
		)
	);

	// AD Location visible
	$wp_customize->add_setting( 'theme_options[ad_location_visible]',
		array(
			'default'       	=> $default['ad_location_visible'],
			'capability'    	=> 'edit_theme_options',
			'sanitize_callback'	=> 'classified_shop_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'theme_options[ad_location_visible]',
	    array(
			'label'      		=> __( 'Display Ad Location', 'classified-shop' ),
			'section'    		=> 'section_ad_location',
			'settings'   		=> 'theme_options[ad_location_visible]',
			'type'		 		=> 'checkbox',
	    )
	);

	// AD Location title
	$wp_customize->add_setting( 'theme_options[ad_location_title]',
		array(
			'default'       	=> $default['ad_location_title'],
			'capability'    	=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'theme_options[ad_location_title]',
	    array(
			'label'      		=> __( 'AD Location Title', 'classified-shop' ),
			'section'    		=> 'section_ad_location',
			'settings'   		=> 'theme_options[ad_location_title]',
			'type'		 		=> 'text',
			'active_callback'	=> 'classified_shop_ad_location_active',
	    )
	);

	// AD Location description
	$wp_customize->add_setting( 'theme_options[ad_location_description]',
		array(
			'default'       	=> $default['ad_location_description'],
			'capability'    	=> 'edit_theme_options',
			'sanitize_callback'	=> 'esc_textarea',
		)
	);
	$wp_customize->add_control( 'theme_options[ad_location_description]',
	    array(
			'label'      		=> __( 'AD Location Short Description', 'classified-shop' ),
			'section'    		=> 'section_ad_location',
			'settings'   		=> 'theme_options[ad_location_description]',
			'type'		 		=> 'textarea',
			'active_callback'	=> 'classified_shop_ad_location_active',
	    )
	);

	// Number of locations
	$wp_customize->add_setting( 'theme_options[num_of_ad_location]',
		array(
			'default'    		=> $default['num_of_ad_location'],
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback'	=> 'classified_shop_sanitize_positive_integer',
		)
	);
	$wp_customize->add_control( 'theme_options[num_of_ad_location]',
	    array(
			'label'       		=> __( 'No. of locations', 'classified-shop' ),
			'description'		=> __( 'Max 25 locations.', 'classified-shop' ),
			'section'     		=> 'section_ad_location',
			'settings'    		=> 'theme_options[num_of_ad_location]',
			'type'		  		=> 'number',
			'input_attrs' 		=> array( 'min' => 5, 'max' => 25, 'style' => 'width: 100px;' ),
			'active_callback'	=> 'classified_shop_ad_location_active',
	    )
	);
endif;