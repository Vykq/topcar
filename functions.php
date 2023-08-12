<?php
/**
 * top-car-delivery functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package top-car-delivery
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function top_car_delivery_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on top-car-delivery, use a find and replace
		* to change 'top-car-delivery' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'top-car-delivery', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'top-car-delivery' ),
		)
	);
	register_nav_menus(
		array(
			'footer-service-menu' => esc_html__( 'Footer service menu', 'top-car-delivery' ),
		)
	);
	register_nav_menus(
		array(
			'footer-company-menu' => esc_html__( 'Footer company menu', 'top-car-delivery' ),
		)
	);
	register_nav_menus(
		array(
			'footer-more-menu' => esc_html__( 'Footer more menu', 'top-car-delivery' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'top_car_delivery_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'top_car_delivery_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function top_car_delivery_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'top_car_delivery_content_width', 640 );
}
add_action( 'after_setup_theme', 'top_car_delivery_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function top_car_delivery_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'top-car-delivery' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'top-car-delivery' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'top_car_delivery_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function top_car_delivery_scripts() {

	wp_enqueue_style( 'top-car-delivery-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'top-car-delivery-style', 'rtl', 'replace' );
	wp_enqueue_style( 'top-car-delivery-style-splide', get_template_directory_uri() . '/css/splide.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'top-car-delivery-style-air-datepicker', get_template_directory_uri() . '/css/air-datepicker.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'top-car-delivery-style-fonts', get_template_directory_uri() . '/css/fonts.css', array(), _S_VERSION );
	wp_enqueue_style( 'top-car-delivery-style-variables', get_template_directory_uri() . '/css/variables.css', array(), _S_VERSION );
	wp_enqueue_style( 'top-car-delivery-style-global', get_template_directory_uri() . '/css/global.css', array(), _S_VERSION );
	wp_enqueue_style( 'top-car-delivery-style-menu-btn', get_template_directory_uri() . '/css/menu-btn.css', array(), _S_VERSION );
	wp_enqueue_style( 'top-car-delivery-style-responsive', get_template_directory_uri() . '/css/responsive.css', array( 'top-car-delivery-style-menu-btn' ), _S_VERSION );


	wp_enqueue_script( 'top-car-delivery-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'top-car-delivery-calculator', get_template_directory_uri() . '/js/calculator.js', array( 'jquery' ), array(), _S_VERSION, true );
    wp_localize_script( 'top-car-delivery-calculator', 'ajax_object', array(
        'ajax_url' => admin_url( 'mycustomajax.php' ),
        'nonce'    => wp_create_nonce( 'city-suggestion-nonce' ),
        'nonce_form'    => wp_create_nonce( 'form-nonce' ),
		'themeUrl' => get_template_directory_uri(),
    ) );
	wp_enqueue_script( 'top-car-delivery-splide', get_template_directory_uri() . '/js/splide.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'top-car-delivery-air-datepicker', get_template_directory_uri() . '/js/air-datepicker.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if(is_page('calculated-costs') || is_page('thank-you')){
		wp_enqueue_style( 'top-car-delivery-calculated-costs-css', get_template_directory_uri() . '/assets/style.css', array(), '1.1' );
		wp_enqueue_script( 'top-car-delivery-calculated-costs-js', get_template_directory_uri() . '/assets/app.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'cleave', get_template_directory_uri() . '/assets/cleave.min.js', array(), '4.1.4', true );
		wp_enqueue_script( 'cleave-phone', get_template_directory_uri() . '/assets/cleave-phone.us.js', array(), '4.1.4', true );
		
	}
}
add_action( 'wp_enqueue_scripts', 'top_car_delivery_scripts' );
function enqueue_custom_script() {

}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_script' );

/**
 * Create new order on form submit
 */
require get_template_directory() . '/inc/calculator/create-new-order.php';
require __DIR__ . '/vendor/autoload.php';


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function be_arrows_in_menus( $item_output, $item, $depth, $args ) {

	if( in_array( 'menu-item-has-children', $item->classes ) ) {
		$arrow = '<input type="checkbox" class="menu_arrow menu_arrow-invert" name="menu_arrow" id="menu_arrow" /><label for="menu_arrow"></label>';
		$item_output = str_replace( '</a>', $arrow . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'be_arrows_in_menus', 10, 4 );



add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    span.order{
		border:1px solid #d4d4d4;
		border-radius:5px;
		padding: 3px 6px;
		font-weight:700;
		color:#FFF;
	}
	span.order.begin {
	background-color:#FFD73B;
	color:#FFF;
	}
	span.order.paid {
		background-color:#00A300;
	}
	span.order.unpaid{
		background-color:#A30000;
		color:#FFF;
	}
  </style>';
}