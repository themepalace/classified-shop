<?php  
$default = classified_shop_get_default_theme_options();

/*Logo Slider Section*/
$wp_customize->add_section( 'section_logo_slider',
	array(
		'title'      			=> __( 'Logo Slider', 'classified-shop' ),
		'priority'   			=> 700,
		'panel'      			=> 'section_option_panel',
	)
);


// Logo Slider visible option
$wp_customize->add_setting( 'theme_options[logo_slider_option]',
	array(
		'default'       		=> $default['logo_slider_option'],
		'capability'    		=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[logo_slider_option]',
    array(
		'label'      			=> __( 'Display Logo Slider', 'classified-shop' ),
		'section'    			=> 'section_logo_slider',
		'settings'   			=> 'theme_options[logo_slider_option]',
		'type'		 			=> 'checkbox',
    )
);


// Number of slides
$wp_customize->add_setting( 'theme_options[num_of_logo_slider]',
	array(
		'default'    			=> $default['num_of_logo_slider'],
		'capability' 			=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[num_of_logo_slider]',
    array(
		'label'       			=> __( 'No. of Slides', 'classified-shop' ),
		'description'			=> __( 'Max 10 slides. Save and referesh the page to add photo after changing value.', 'classified-shop' ),
		'section'     			=> 'section_logo_slider',
		'settings'    			=> 'theme_options[num_of_logo_slider]',
		'type'		  			=> 'number',
		'input_attrs' 			=> array( 'min' => 1, 'max' => 10, 'style' => 'width: 100px;' ),
		'active_callback'		=> 'classified_shop_logo_slider_enable',
    )
);

$no_of_logo_slide = classified_shop_get_option( 'num_of_logo_slider' );

for( $i = 1; $i <= $no_of_logo_slide; $i++ ){
	// url for image
	$wp_customize->add_setting( 'theme_options[logo_slider_page'. $i .']',
	  array(
	    'capability'        	=> 'edit_theme_options',
	    'sanitize_callback' 	=> 'classified_shop_sanitize_page',
	  )
	);
	$wp_customize->add_control( 'theme_options[logo_slider_page'. $i .']',
    array(
		'label'					=> __( 'Select page ', 'classified-shop' ) . $i,
		'section'     			=> 'section_logo_slider',
		'settings'    			=> 'theme_options[logo_slider_page'. $i .']',
		'type'		  			=> 'dropdown-pages',
		'active_callback'		=> 'classified_shop_logo_slider_enable',
      )
	);
}
