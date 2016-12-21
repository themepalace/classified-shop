<?php  
$default = classified_shop_get_default_theme_options();
if ( function_exists( 'classified_get_featured_aditems' ) ) :
	/*Search Section*/
	$wp_customize->add_section( 'section_search',
		array(
			'title'      		=> __( 'Search Section', 'classified-shop' ),
			'priority'   		=> 200,
			'panel'      		=> 'section_option_panel',
		)
	);

	// search visible
	$wp_customize->add_setting( 'theme_options[section_search_visible]',
		array(
			'default'       	=> $default['section_search_visible'],
			'capability'    	=> 'edit_theme_options',
			'sanitize_callback'	=> 'classified_shop_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'theme_options[section_search_visible]',
	    array(
			'label'      		=> __( 'Display Search Section', 'classified-shop' ),
			'section'    		=> 'section_search',
			'settings'   		=> 'theme_options[section_search_visible]',
			'type'		 		=> 'checkbox',
	    )
	);

	// Search title
	$wp_customize->add_setting( 'theme_options[search_title]',
		array(
			'default'       	=> $default['search_title'],
			'capability'   		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'theme_options[search_title]',
	    array(
			'label'      		=> __( 'Search Section Title', 'classified-shop' ),
			'section'    		=> 'section_search',
			'settings'   		=> 'theme_options[search_title]',
			'type'		 		=> 'text',
			'active_callback'	=> 'classified_shop_section_search_active',
	    )
	);

	// Search description
	$wp_customize->add_setting( 'theme_options[search_description]',
		array(
			'default'       	=> $default['search_description'],
			'capability'   		=> 'edit_theme_options',
			'sanitize_callback'	=> 'esc_textarea',
		)
	);
	$wp_customize->add_control( 'theme_options[search_description]',
	    array(
			'label'      		=> __( 'Search Section Short Description', 'classified-shop' ),
			'section'    		=> 'section_search',
			'settings'   		=> 'theme_options[search_description]',
			'type'		 		=> 'textarea',
			'active_callback'	=> 'classified_shop_section_search_active',
	    )
	);
endif;