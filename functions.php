<?php
/**
 * Classified Shop functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Classified Shop 1.0
 */

if ( ! function_exists( 'classified_shop_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function classified_shop_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Classified Shop, use a find and replace
	 * to change 'classified-shop' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'classified-shop', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 300, 200, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'classified-shop' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'classified-shop' ),
		'social-menu' => esc_html__( 'Social Menu', 'classified-shop' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'classified_shop_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	* Enable support for custom logo.
	*/
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 120,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	/*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */
    add_editor_style( array( 'assets/css/editor-style.min.css' ) );
}
endif;
add_action( 'after_setup_theme', 'classified_shop_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function classified_shop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'classified_shop_content_width', 640 );
}
add_action( 'after_setup_theme', 'classified_shop_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function classified_shop_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'classified-shop' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'classified-shop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s os-animation" data-os-animation="fadeIn" data-os-animation-delay="0.3s" data-os-animation-duration="2s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title"><h4>',
		'after_title'   => '</h4></div>',
	) );
}
add_action( 'widgets_init', 'classified_shop_widgets_init' );

if ( ! function_exists( 'classified_shop_fonts_url' ) ) :
/**
 * Register Google fonts
 *
 * Create your own classified_shop_fonts_url() function to override in a child theme.
 *
 * @since Classified Shop 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function classified_shop_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	// translators: If there are characters in your language that are not supported by open sans, translate this to 'off'. Do not translate into your own language. 
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'classified-shop' ) ) {
		$fonts[] = 'Open+Sans:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Alice, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Alice font: on or off', 'classified-shop' ) ) {
		$fonts[] = 'Alice';
	}

	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'classified-shop' ) ) {
		$fonts[] = 'Lato:300,400';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'classified-shop' ) ) {
		$fonts[] = 'Montserrat';
	}

	/* translators: If there are characters in your language that are not supported by Roboto+Condensed, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto+Condensed font: on or off', 'classified-shop' ) ) {
		$fonts[] = 'Roboto+Condensed';
	}

	/* translators: If there are characters in your language that are not supported by Abel, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Abel font: on or off', 'classified-shop' ) ) {
		$fonts[] = 'Abel';
	}

	/* translators: If there are characters in your language that are not supported by Righteous, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Righteous font: on or off', 'classified-shop' ) ) {
		$fonts[] = 'Righteous';
	}

	/* translators: If there are characters in your language that are not supported by Courgette, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Courgette font: on or off', 'classified-shop' ) ) {
		$fonts[] = 'Courgette';
	}

	/* translators: If there are characters in your language that are not supported by Raleway, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'classified-shop' ) ) {
		$fonts[] = 'Raleway';
	}

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'classified-shop' ) ) {
		$fonts[] = 'Poppins';
	}

	/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'classified-shop' ) ) {
		$fonts[] = 'Roboto';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function classified_shop_scripts() {
	
	/*enqueue style*/
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'classified-shop-fonts', classified_shop_fonts_url(), array(), null );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', '', false );

	wp_enqueue_style( 'jquery-sidr-light', get_template_directory_uri() . '/assets/css/jquery.sidr.light.min.css', '', false );

	wp_enqueue_style( 'jslider', get_template_directory_uri() . '/assets/css/jslider.min.css', '', false );

	wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.min.css', '', false );

	wp_enqueue_style( 'classified-shop-style', get_stylesheet_uri() );

	/*enqueue script*/

	wp_enqueue_script( 'classified-shop-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array(), '20151215', true );

	wp_enqueue_script( 'classified-shop-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );

	wp_enqueue_script( 'sidr', get_template_directory_uri() . '/assets/js/jquery.sidr.min.js', array('jquery'), '', true );

	wp_enqueue_script( 'cycle2', get_template_directory_uri() . '/assets/js/cycle2.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'cycle2-carousel', get_template_directory_uri() . '/assets/js/jquery.cycle2.carousel.min.js', array( 'jquery' ), '', true );
	
	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.js', array( 'jquery' ), '', true );
	
	wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.min.js', array( 'jquery' ), '', true );

	/*Price Range*/

	wp_enqueue_script( 'jshashtable', get_template_directory_uri() . '/assets/js/jshashtable-2.1_src.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'numberformatter', get_template_directory_uri() . '/assets/js/jquery.numberformatter-1.2.3.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'tmpl', get_template_directory_uri() . '/assets/js/tmpl.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'dependClass', get_template_directory_uri() . '/assets/js/jquery.dependClass-0.1.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'draggable', get_template_directory_uri() . '/assets/js/draggable-0.1.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'slider', get_template_directory_uri() . '/assets/js/jquery.slider.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'classified-shop-custom', get_template_directory_uri() . '/assets/js/custom.min.js', array( 'jquery' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'classified_shop_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Classified Shop files.
 */
require get_template_directory() . '/inc/init.php';

global $classified_shop_default_options;
$classified_shop_default_options = classified_shop_get_default_theme_options();


/*
* custom excerpt
*/
// thumbnail view excerpt
function classified_shop_thumbnail_excerpt(){
	$length = classified_shop_get_option( 'thumbnail_excerpt_length' );
	return $length;
}

if ( function_exists( 'classified_get_featured_aditems' ) ) :
	// list view excerpt
	function classified_shop_list_excerpt(){
		$length = classified_shop_get_option( 'list_excerpt_length' );
		return $length;
	}
endif;

// archive excerpt
function classified_shop_excerpt_length( $length ){
	$length = classified_shop_get_option( 'excerpt_length' );
	return $length;
}

// read more
function classified_shop_excerpt_more( $more ){
	return '...';
}
add_filter( 'excerpt_more', 'classified_shop_excerpt_more' );
/*
* create the custom excerpts callback
*/
function classified_shop_custom_excerpt( $length_callback = '', $more_callback = '' ){
	$post_id = get_queried_object_id();
	if ( function_exists( $length_callback ) ){
		add_filter( 'excerpt_length', $length_callback );
	}
	$output = get_the_excerpt( $post_id );
	$output = apply_filters( 'wptexturize', $output );
	$output = apply_filters( 'convert_chars', $output );
	$output = $output;
	echo esc_html( $output );
}

add_action( 'customize_save_after', 'classified_shop_callback_reset_settings' );
if( ! function_exists( 'classified_shop_callback_reset_settings' ) ):

  /**
   * Callback for Reset all settings.
   *
   * @since Classified Shop 1.0
   *
   * @param string $input Content to be sanitized.
   * @return bool Return false.
   */
  function classified_shop_callback_reset_settings(){
  	if ( classified_shop_get_option( 'reset_all_settings' ) === true ) {
		// Reset custom theme options.
		set_theme_mod( 'theme_options', array() );
		// Reset custom header and backgrounds.
		remove_theme_mod( 'background_image' );
		remove_theme_mod( 'background_color' );
    }

  }

endif;
