<?php  
$default = classified_shop_get_default_theme_options();

/*Product Section*/
$wp_customize->add_section( 'section_products',
	array(
		'title'      		=> __( 'Products Tab', 'classified-shop' ),
		'priority'   		=> 300,
		'panel'      		=> 'section_option_panel',
	)
);

// Product visible option
$wp_customize->add_setting( 'theme_options[products_visible]',
	array(
		'default'       	=> $default['products_visible'],
		'capability'    	=> 'edit_theme_options',
		'sanitize_callback'	=> 'classified_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[products_visible]',
    array(
		'label'      		=> __( 'Display Products', 'classified-shop' ),
		'section'    		=> 'section_products',
		'settings'   		=> 'theme_options[products_visible]',
		'type'		 		=> 'checkbox',
    )
);

// Number of products to display
$wp_customize->add_setting( 'theme_options[num_of_products]',
	array(
		'default'    		=> $default['num_of_products'],
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback'	=> 'classified_shop_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[num_of_products]',
    array(
		'label'       		=> __( 'No. of Products', 'classified-shop' ),
		'description'		=> __( 'Min 4 / Max 12', 'classified-shop' ),
		'section'     		=> 'section_products',
		'settings'    		=> 'theme_options[num_of_products]',
		'type'		  		=> 'number',
		'input_attrs' 		=> array( 'min' => 4, 'max' => 12, 'style' => 'width: 100px;' ),
		'active_callback'	=> 'classified_shop_products_enable',
    )
);

if ( function_exists( 'classified_get_featured_aditems' ) ) :

	// Product tab 1 visible
	$wp_customize->add_setting( 'theme_options[product_tab1]',
		array(
			'default'       	=> $default['product_tab1'],
			'capability'    	=> 'edit_theme_options',
			'sanitize_callback'	=> 'classified_shop_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'theme_options[product_tab1]',
	    array(
			'label'      		=> __( 'Display Recent Products', 'classified-shop' ),
			'section'    		=> 'section_products',
			'settings'   		=> 'theme_options[product_tab1]',
			'type'		 		=> 'checkbox',
			'active_callback'	=> 'classified_shop_products_enable',
	    )
	);

	// Product tab 2 visible
	$wp_customize->add_setting( 'theme_options[product_tab2]',
		array(
			'default'       	=> $default['product_tab2'],
			'capability'    	=> 'edit_theme_options',
			'sanitize_callback'	=> 'classified_shop_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'theme_options[product_tab2]',
	    array(
			'label'      		=> __( 'Display Featured Products', 'classified-shop' ),
			'section'    		=> 'section_products',
			'settings'   		=> 'theme_options[product_tab2]',
			'type'		 		=> 'checkbox',
			'active_callback'	=> 'classified_shop_products_enable',
	    )
	);

endif;

// Product tab 4 visible
$wp_customize->add_setting( 'theme_options[product_tab3]',
	array(
		'default'       	=> $default['product_tab3'],
		'capability'    	=> 'edit_theme_options',
		'sanitize_callback'	=> 'classified_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[product_tab3]',
    array(
		'label'      		=> __( 'Display Recent Posts', 'classified-shop' ),
		'section'    		=> 'section_products',
		'settings'   		=> 'theme_options[product_tab3]',
		'type'		 		=> 'checkbox',
		'active_callback'	=> 'classified_shop_products_enable',
    )
);
