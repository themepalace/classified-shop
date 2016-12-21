<?php  
$default = classified_shop_get_default_theme_options();

/*Shop screen Section*/
$wp_customize->add_section( 'section_shop_screen',
	array(
		'title'      			=> __( 'Shop Screen', 'classified-shop' ),
		'priority'   			=> 500,
		'panel'      			=> 'section_option_panel',
	)
);

// shop screen visible
$wp_customize->add_setting( 'theme_options[shop_screen_visible]',
	array(
		'default'       		=> $default['shop_screen_visible'],
		'capability'    		=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[shop_screen_visible]',
    array(
		'label'      			=> __( 'Display Shop Screen', 'classified-shop' ),
		'section'    			=> 'section_shop_screen',
		'settings'   			=> 'theme_options[shop_screen_visible]',
		'type'		 			=> 'checkbox',
    )
);

// shop screen Title
$wp_customize->add_setting( 'theme_options[shop_screen_title]',
	array(
		'default'       		=> $default['shop_screen_title'],
		'capability'    		=> 'edit_theme_options',
		'sanitize_callback'		=> 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[shop_screen_title]',
    array(
		'label'      			=> __( 'Shop Screen Title', 'classified-shop' ),
		'section'    			=> 'section_shop_screen',
		'settings'   			=> 'theme_options[shop_screen_title]',
		'type'		 			=> 'text',
		'active_callback'		=> 'classified_shop_screen_active',
    )
);

// shop screen description
$wp_customize->add_setting( 'theme_options[shop_screen_description]',
	array(
		'default'       		=> $default['shop_screen_description'],
		'capability'    		=> 'edit_theme_options',
		'sanitize_callback'		=> 'esc_textarea',
	)
);
$wp_customize->add_control( 'theme_options[shop_screen_description]',
    array(
		'label'      			=> __( 'Short Description', 'classified-shop' ),
		'section'    			=> 'section_shop_screen',
		'settings'   			=> 'theme_options[shop_screen_description]',
		'type'		 			=> 'textarea',
		'active_callback'		=> 'classified_shop_screen_active',
    )
);

// shop screen url
$wp_customize->add_setting( 'theme_options[shop_screen_link]',
	array(
		'default'       		=> $default['shop_screen_link'],
		'capability'    		=> 'edit_theme_options',
		'sanitize_callback'		=> 'esc_url',
	)
);
$wp_customize->add_control( 'theme_options[shop_screen_link]',
    array(
		'label'      			=> __( 'Link URL', 'classified-shop' ),
		'section'    			=> 'section_shop_screen',
		'settings'   			=> 'theme_options[shop_screen_link]',
		'type'		 			=> 'url',
		'active_callback'		=> 'classified_shop_screen_active',
    )
);

// shop screen link Title
$wp_customize->add_setting( 'theme_options[shop_screen_link_title]',
	array(
		'default'       		=> $default['shop_screen_link_title'],
		'capability'    		=> 'edit_theme_options',
		'sanitize_callback'		=> 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[shop_screen_link_title]',
    array(
		'label'      			=> __( 'Link Title', 'classified-shop' ),
		'section'    			=> 'section_shop_screen',
		'settings'   			=> 'theme_options[shop_screen_link_title]',
		'type'		 			=> 'text',
		'active_callback'		=> 'classified_shop_screen_active',
    )
);

// link target
$wp_customize->add_setting( 'theme_options[shop_screen_target]',
	array(
		'default'       		=> $default['shop_screen_target'],
		'capability'    		=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[shop_screen_target]',
    array(
		'label'      			=> __( 'Open link in new tab', 'classified-shop' ),
		'section'    			=> 'section_shop_screen',
		'settings'   			=> 'theme_options[shop_screen_target]',
		'type'		 			=> 'checkbox',
		'active_callback'		=> 'classified_shop_screen_active',
    )
);

// Image link target
$wp_customize->add_setting( 'theme_options[shop_screen_image_target]',
	array(
		'default'       		=> $default['shop_screen_image_target'],
		'capability'    		=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[shop_screen_image_target]',
    array(
		'label'      			=> __( 'Open image link in new tab', 'classified-shop' ),
		'section'    			=> 'section_shop_screen',
		'settings'   			=> 'theme_options[shop_screen_image_target]',
		'type'		 			=> 'checkbox',
		'active_callback'		=> 'classified_shop_screen_active',
    )
);

// Number of image
$wp_customize->add_setting( 'theme_options[num_of_shop_screen_image]',
	array(
		'default'    			=> $default['num_of_shop_screen_image'],
		'capability' 			=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[num_of_shop_screen_image]',
    array(
		'label'       			=> __( 'No. of Slides', 'classified-shop' ),
		'description'			=> __( 'Max 6 slides. Save and referesh the page to add photo after changing value.', 'classified-shop' ),
		'section'     			=> 'section_shop_screen',
		'settings'    			=> 'theme_options[num_of_shop_screen_image]',
		'type'		  			=> 'number',
		'input_attrs' 			=> array( 'min' => 1, 'max' => 6, 'style' => 'width: 100px;' ),
		'active_callback'		=> 'classified_shop_screen_active',
    )
);

$no_of_image = classified_shop_get_option( 'num_of_shop_screen_image' );
for( $i = 1; $i <= $no_of_image; $i++ ){
	if ( $no_of_image == 3 || ( $no_of_image == 5 && $i == 3 ) ) {
		$description = sprintf( __( 'Recommended size: %dpx x %dpx.', 'classified-shop' ), 200, 400 );
	} elseif ( $no_of_image == 2 ) {
		$description = sprintf( __( 'Recommended size: %dpx x %dpx.', 'classified-shop' ), 350, 400 );
	} else {
		$description = sprintf( __( 'Recommended size: %dpx x %dpx.', 'classified-shop' ), 300, 200 );
	}
	// page for image
	$wp_customize->add_setting( 'theme_options[shop_screen_page_'. $i .']',
	  array(
	    'capability'        	=> 'edit_theme_options',
	    'sanitize_callback' 	=> 'classified_shop_sanitize_page',
	  )
	);
	$wp_customize->add_control( 'theme_options[shop_screen_page_'. $i .']',
    array(
		'label'					=> __( 'Select Page ', 'classified-shop' ). $i,
		'description'			=> $description,
		'section'     			=> 'section_shop_screen',
		'settings'    			=> 'theme_options[shop_screen_page_'. $i .']',
		'type'		  			=> 'dropdown-pages',
		'active_callback'		=> 'classified_shop_screen_active',
      )
	);
}

