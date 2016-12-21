<?php  
$default = classified_shop_get_default_theme_options();

/*Slider Section*/
$wp_customize->add_section( 'section_slider',
	array(
		'title'      			=> __( 'Featured Slider', 'classified-shop' ),
		'priority'   			=> 100,
		'panel'      			=> 'section_option_panel',
	)
);

// slider visible option
$wp_customize->add_setting( 'theme_options[slider_option]',
	array(
		'default'    			=> $default['slider_option'],
		'capability' 			=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[slider_option]',
    array(
		'label'       			=> __( 'Display Slider', 'classified-shop' ),
		'section'     			=> 'section_slider',
		'settings'    			=> 'theme_options[slider_option]',
		'type'		  			=> 'checkbox',
    )
);

// slider type option
$wp_customize->add_setting( 'theme_options[slider_effect_option]',
	array(
		'default'    			=> $default['slider_effect_option'],
		'capability' 			=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[slider_effect_option]',
    array(
		'label'       			=> __( 'Slider Effect', 'classified-shop' ),
		'section'     			=> 'section_slider',
		'settings'    			=> 'theme_options[slider_effect_option]',
		'type'		  			=> 'select',
		'choices'				=> classified_shop_slider_effect_options(),
		'active_callback'		=> 'classified_shop_slider_enable',
    )
);

// Number of slides
$wp_customize->add_setting( 'theme_options[num_of_slider]',
	array(
		'default'    			=> $default['num_of_slider'],
		'capability' 			=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[num_of_slider]',
    array(
		'label'       			=> __( 'No. of Slides', 'classified-shop' ),
		'description'			=> __( 'Max 5 slides. Save and referesh the page to add photo after changing value.', 'classified-shop' ),
		'section'     			=> 'section_slider',
		'settings'    			=> 'theme_options[num_of_slider]',
		'type'		  			=> 'number',
		'input_attrs' 			=> array( 'min' => 1, 'max' => 5, 'style' => 'width: 100px;' ),
		'active_callback'		=> 'classified_shop_slider_enable',
    )
);


$no_of_slide = classified_shop_get_option( 'num_of_slider' );

for( $i = 1; $i <= $no_of_slide; $i++ ){
	// Number of slides
	$wp_customize->add_setting( 'theme_options[slider_page'. $i .']',
		array(
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback'	=> 'classified_shop_sanitize_page',
		)
	);
	$wp_customize->add_control( 'theme_options[slider_page'. $i .']',
	    array(
			'label'       		=> sprintf( __( 'Select Page # %s', 'classified-shop' ), $i ),
			'section'     		=> 'section_slider',
			'settings'    		=> 'theme_options[slider_page'. $i .']',
			'type'		  		=> 'dropdown-pages',
			'active_callback'	=> 'classified_shop_slider_enable',
	    )
	);
}


// controller visible
$wp_customize->add_setting( 'theme_options[slider_controls]',
	array(
		'default'       		=> $default['slider_controls'],
		'capability'    		=> 'edit_theme_options',
		'sanitize_callback'		=> 'classified_shop_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[slider_controls]',
    array(
		'label'      			=> __( 'Show Slider Controller', 'classified-shop' ),
		'section'    			=> 'section_slider',
		'settings'   			=> 'theme_options[slider_controls]',
		'type'		 			=> 'checkbox',
		'active_callback'		=> 'classified_shop_slider_enable',
    )
);
