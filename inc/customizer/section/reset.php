<?php
/**
 * Reset theme options.
 *
 * @package Classified Shop 1.0
 */

// Reset Section.
$wp_customize->add_section( 'section_reset_all_settings', 
	array(
		'title'       		=> esc_html__( 'Reset All Theme Settings', 'classified-shop' ),
		'description' 		=> esc_html__( 'Caution: All theme settings will be reset to default. Refresh the page after save to view full effects.', 'classified-shop' ),
		'priority'    		=> 1000,
		'capability'  		=> 'edit_theme_options',
	)
);

$wp_customize->add_setting( 'theme_options[reset_all_settings]', 
	array(
		'default'           => false,
		'capability'        => 'edit_theme_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'classified_shop_sanitize_checkbox',
	)
);

$wp_customize->add_control( 'theme_options[reset_all_settings]', 
	array(
	    'label'    			=> __( 'Check to reset all settings', 'classified-shop' ),
	    'type'     			=> 'checkbox',
	    'section'  			=> 'section_reset_all_settings',
	    'settings' 			=> 'theme_options[reset_all_settings]',
	)
);
