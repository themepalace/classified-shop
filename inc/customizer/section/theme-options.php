<?php  
$default = classified_shop_get_default_theme_options();

/*Page option Section*/
$wp_customize->add_section( 'section_layout',
	array(
		'title'      		=> __( 'Layout', 'classified-shop' ),
		'priority'   		=> 600,
		'panel'      		=> 'theme_option_panel',
	)
);


/*pagination option Section*/
$wp_customize->add_section( 'section_pagination',
	array(
		'title'      		=> __( 'Pagination', 'classified-shop' ),
		'priority'   		=> 600,
		'panel'      		=> 'theme_option_panel',
	)
);

// pagination option
$wp_customize->add_setting( 'theme_options[pagination_option]',
	array(
		'default'    		=> $default['pagination_option'],
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback'	=> 'classified_shop_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[pagination_option]',
    array(
		'label'       		=> __( 'Pagination Style', 'classified-shop' ),
		'section'     		=> 'section_pagination',
		'settings'    		=> 'theme_options[pagination_option]',
		'type'		  		=> 'select',
		'choices'			=> classified_shop_pagination_options(),
    )
);

// Number of words to display in excerpt
$wp_customize->add_section( 'section_excerpt',
	array(
		'title'      		=> __( 'Excerpt', 'classified-shop' ),
		'priority'   		=> 600,
		'panel'      		=> 'theme_option_panel',
	)
);

// archive excerpt
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
		'default'    		=> $default['excerpt_length'],
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback'	=> 'classified_shop_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[excerpt_length]',
    array(
		'label'       		=> __( 'Archive Excerpt Length', 'classified-shop' ),
		'description'		=> __( 'max 150 words', 'classified-shop' ),
		'section'     		=> 'section_excerpt',
		'settings'    		=> 'theme_options[excerpt_length]',
		'type'		  		=> 'number',
		'input_attrs' 		=> array( 'min' => 1, 'max' => 150, 'style' => 'width: 100px;' ),
    )
);

// thumbnail excerpt
$wp_customize->add_setting( 'theme_options[thumbnail_excerpt_length]',
	array(
		'default'    		=> $default['thumbnail_excerpt_length'],
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback'	=> 'classified_shop_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[thumbnail_excerpt_length]',
    array(
		'label'       		=> __( 'Thumbnail Excerpt Length', 'classified-shop' ),
		'description'		=> __( 'max 25 words', 'classified-shop' ),
		'section'     		=> 'section_excerpt',
		'settings'    		=> 'theme_options[thumbnail_excerpt_length]',
		'type'		  		=> 'number',
		'input_attrs' 		=> array( 'min' => 1, 'max' => 25, 'style' => 'width: 100px;' ),
    )
);

// list excerpt
$wp_customize->add_setting( 'theme_options[list_excerpt_length]',
	array(
		'default'    		=> $default['list_excerpt_length'],
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback'	=> 'classified_shop_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[list_excerpt_length]',
    array(
		'label'       		=> __( 'List Excerpt Length', 'classified-shop' ),
		'description'		=> __( 'max 50 words', 'classified-shop' ),
		'section'     		=> 'section_excerpt',
		'settings'    		=> 'theme_options[list_excerpt_length]',
		'type'		  		=> 'number',
		'input_attrs' 		=> array( 'min' => 1, 'max' => 50, 'style' => 'width: 100px;' ),
    )
);
