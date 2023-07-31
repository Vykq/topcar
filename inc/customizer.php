<?php
/**
 * top-car-delivery Theme Customizer
 *
 * @package top-car-delivery
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function top_car_delivery_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'top_car_delivery_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'top_car_delivery_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'top_car_delivery_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function top_car_delivery_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function top_car_delivery_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function top_car_delivery_customize_preview_js() {
	wp_enqueue_script( 'top-car-delivery-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'top_car_delivery_customize_preview_js' );

function custom_theme_customizer( $wp_customize ) {
    // Add a section for logo options
    $wp_customize->add_section( 'logo_section', array(
        'title'       => __( 'Logo', 'your-theme-textdomain' ),
        'description' => __( 'Customize your theme logo', 'your-theme-textdomain' ),
    ) );

    // Add a setting for the primary logo
    $wp_customize->add_setting( 'primary_logo', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    // Add a control for the primary logo
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'primary_logo', array(
        'label'    => __( 'Primary Logo', 'your-theme-textdomain' ),
        'section'  => 'logo_section',
        'settings' => 'primary_logo',
    ) ) );

    // Add a setting for the secondary logo
    $wp_customize->add_setting( 'secondary_logo', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    // Add a control for the secondary logo
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'secondary_logo', array(
        'label'    => __( 'Secondary Logo', 'your-theme-textdomain' ),
        'section'  => 'logo_section',
        'settings' => 'secondary_logo',
    ) ) );

    // Add more logo variations if needed

}
add_action( 'customize_register', 'custom_theme_customizer' );
