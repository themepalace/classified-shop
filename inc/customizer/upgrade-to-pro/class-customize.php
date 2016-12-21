<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.7
 * @access public
 */
final class Classified_Shop_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.7
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.7
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.7
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.7
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'inc/customizer/upgrade-to-pro/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Classified_Shop_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Classified_Shop_Customize_Section_Pro(
				$manager,
				'classified-shop',
				array(
					'title'    => esc_html__( 'Classified Shop Pro', 'classified-shop' ),
					'pro_text' => esc_html__( 'Go Pro',         'classified-shop' ),
					'pro_url'  => 'http://themepalace.com/downloads/classified-shop-pro/'
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.7
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'classified-shop-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/upgrade-to-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'classified-shop-customize-controls', trailingslashit( get_template_directory_uri() ) . 'inc/customizer/upgrade-to-pro/customize-controls.css' );
	}
}

// Doing this customizer thang!
Classified_Shop_Customize::get_instance();
