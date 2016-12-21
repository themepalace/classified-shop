<?php  

$default = classified_shop_get_default_theme_options();

/*Theme Panel*/
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      			=> __( 'Theme Options', 'classified-shop' ),
		'priority'   			=> 100,
		'capability' 			=> 'edit_theme_options',
	)
);

/*Section Panel*/
$wp_customize->add_panel( 'section_option_panel',
	array(
		'title'      			=> __( 'Sections', 'classified-shop' ),
		'priority'   			=> 100,
		'capability' 			=> 'edit_theme_options',
	)
);

/*Header Section*/
$wp_customize->add_section( 'section_header',
	array(
		'title'      			=> __( 'Header Options', 'classified-shop' ),
		'priority'   			=> 100,
		'panel'      			=> 'theme_option_panel',
	)
);

/*Custom Menu Section*/
$wp_customize->add_section( 'section_menu',
	array(
		'title'      			=> __( 'Post AD Options', 'classified-shop' ),
		'priority'   			=> 100,
		'panel'      			=> 'nav_menus',
	)
);

/* Post AD */
// post ad visible
$wp_customize->add_setting( 'theme_options[post_ad_visible]',
	array(
		'default'       		=> $default['post_ad_visible'],
		'capability'    		=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[post_ad_visible]',
    array(
		'label'      			=> __( 'Display Post Ad', 'classified-shop' ),
		'section'    			=> 'section_menu',
		'settings'   			=> 'theme_options[post_ad_visible]',
		'type'		 			=> 'checkbox',
    )
);

// post ad title
$wp_customize->add_setting( 'theme_options[post_ad_title]',
	array(
		'default'    			=> $default['post_ad_title'],
		'capability' 			=> 'edit_theme_options',
		'sanitize_callback'		=> 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[post_ad_title]',
    array(
		'label'       			=> __( 'Post Ad Title', 'classified-shop' ),
		'section'     			=> 'section_menu',
		'settings'    			=> 'theme_options[post_ad_title]',
		'type'		  			=> 'text',
		'active_callback'		=> 'classified_shop_post_ad_active',
    )
);

// post ad url
$wp_customize->add_setting( 'theme_options[post_ad_url]',
	array(
		'default'    			=> $default['post_ad_url'],
		'capability' 			=> 'edit_theme_options',
		'sanitize_callback'		=> 'esc_url',
	)
);
$wp_customize->add_control( 'theme_options[post_ad_url]',
    array(
		'label'       			=> __( 'Post Ad URL', 'classified-shop' ),
		'section'     			=> 'section_menu',
		'settings'    			=> 'theme_options[post_ad_url]',
		'type'		  			=> 'url',
		'active_callback'		=> 'classified_shop_post_ad_active',
    )
);

// post ad icon
$wp_customize->add_setting( 'theme_options[post_ad_icon]',
	array(
		'default'    			=> $default['post_ad_icon'],
		'capability' 			=> 'edit_theme_options',
		'sanitize_callback'		=> 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[post_ad_icon]',
    array(
		'label'       			=> __( 'Post Ad Icon', 'classified-shop' ),
		'description'			=> 'Use font awesome icon: Eg: fa-camera-retro.<br><a href="' . esc_url('http://fontawesome.io/icons/') . '" target="blank"> See more here</a>',
		'section'     			=> 'section_menu',
		'settings'    			=> 'theme_options[post_ad_icon]',
		'type'		  			=> 'text',
		'active_callback'		=> 'classified_shop_post_ad_active',
    )
);

// post ad target
$wp_customize->add_setting( 'theme_options[post_ad_target]',
	array(
		'default'       		=> $default['post_ad_target'],
		'capability'   			=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[post_ad_target]',
    array(
		'label'      			=> __( 'Open in new tab', 'classified-shop' ),
		'section'    			=> 'section_menu',
		'settings'   			=> 'theme_options[post_ad_target]',
		'type'		 			=> 'checkbox',
		'active_callback'		=> 'classified_shop_post_ad_active',
    )
);

// post ad visible
$wp_customize->add_setting( 'theme_options[scroll_top_visible]',
	array(
		'default'       		=> $default['scroll_top_visible'],
		'capability'    		=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[scroll_top_visible]',
    array(
		'label'      			=> __( 'Display Scroll Top Button', 'classified-shop' ),
		'section'    			=> 'section_footer',
		'settings'   			=> 'theme_options[scroll_top_visible]',
		'type'		 			=> 'checkbox',
    )
);


/*Footer Section*/
$wp_customize->add_section( 'section_footer',
	array(
		'title'      			=> __( 'Footer Options', 'classified-shop' ),
		'priority'   			=> 900,
		'panel'      			=> 'section_option_panel',
	)
);

// footer text
$wp_customize->add_setting( 'theme_options[footer_text]',
	array(
		'default'       		=> $default['footer_text'],
		'capability'   			=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_santize_allow_tag',
	)
);
$wp_customize->add_control( 'theme_options[footer_text]',
    array(
		'label'      			=> __( 'Footer Text', 'classified-shop' ),
		'section'    			=> 'section_footer',
		'settings'   			=> 'theme_options[footer_text]',
		'type'		 			=> 'text',
    )
);

// front display static page
$wp_customize->add_setting( 'theme_options[static_page_visible]',
	array(
		'default'       		=> $default['static_page_visible'],
		'capability'    		=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[static_page_visible]',
    array(
		'label'      			=> __( 'Display Static Page Content', 'classified-shop' ),
		'section'    			=> 'static_front_page',
		'settings'   			=> 'theme_options[static_page_visible]',
		'type'		 			=> 'checkbox',
    )
);
