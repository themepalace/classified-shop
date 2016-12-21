<?php  
$default = classified_shop_get_default_theme_options();

/*Category Section*/
$wp_customize->add_section( 'section_category',
	array(
		'title'      		=> __( 'Categories', 'classified-shop' ),
		'priority'   		=> 400,
		'panel'      		=> 'section_option_panel',
	)
);

// categories visible option
$wp_customize->add_setting( 'theme_options[categories_visible]',
	array(
		'default'       	=> $default['categories_visible'],
		'capability'    	=> 'edit_theme_options',
		'sanitize_callback'	=> 'classified_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[categories_visible]',
    array(
		'label'      		=> __( 'Display Categories', 'classified-shop' ),
		'section'    		=> 'section_category',
		'settings'   		=> 'theme_options[categories_visible]',
		'type'		 		=> 'checkbox',
    )
);

// categories title
$wp_customize->add_setting( 'theme_options[category_title]',
	array(
		'default'       	=> $default['category_title'],
		'capability'    	=> 'edit_theme_options',
		'sanitize_callback'	=> 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[category_title]',
    array(
		'label'      		=> __( 'Categories Title', 'classified-shop' ),
		'section'    		=> 'section_category',
		'settings'   		=> 'theme_options[category_title]',
		'type'		 		=> 'text',
		'active_callback'	=> 'classified_shop_categories_active',
    )
);

// categories description
$wp_customize->add_setting( 'theme_options[category_description]',
	array(
		'default'       	=> $default['category_description'],
		'capability'    	=> 'edit_theme_options',
		'sanitize_callback'	=> 'esc_textarea',
	)
);
$wp_customize->add_control( 'theme_options[category_description]',
    array(
		'label'      		=> __( 'Categories Short Description', 'classified-shop' ),
		'section'    		=> 'section_category',
		'settings'   		=> 'theme_options[category_description]',
		'type'		 		=> 'textarea',
		'active_callback'	=> 'classified_shop_categories_active',
    )
);

// categories taxonomy option
$wp_customize->add_setting( 'theme_options[taxonomy_option]',
	array(
		'default'    			=> $default['taxonomy_option'],
		'capability' 			=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[taxonomy_option]',
    array(
		'label'       			=> __( 'Select Categories From', 'classified-shop' ),
		'description'       	=> __( 'You can select AD Category only after installing Classified Plugin.', 'classified-shop' ),
		'section'     			=> 'section_category',
		'settings'    			=> 'theme_options[taxonomy_option]',
		'type'		  			=> 'select',
		'choices'				=> classified_shop_taxonomy_options(),
    )
);
