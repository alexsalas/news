<?php
/**
 * So Simple Theme Customizer
 *
 * @package sosimple
 */

/**
 * Register customizer options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sosimple_customize_register( $wp_customize ) {
	/*
	 * Create theme seciton to hold our options.
	 */
	$wp_customize->add_section( 'theme', array(
		'title'    => __( 'Theme Options', 'sosimple' ),
		'priority' => 120,
	) );

	/**
	 * Admin
	 */

	$wp_customize->add_setting( 'disable_admin_teaks', array(
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'disable_admin_teaks', array(
		'label'    => __( 'Disable So Simple admin tweaks', 'sosimple' ),
		'section'  => 'theme',
		'settings' => 'disable_admin_teaks',
		'type'     => 'checkbox',
		'priority' => 10,
	) );


	/**
	 * Intro
	 */

	$wp_customize->add_setting( 'intro_page', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'intro_page', array(
		'label'    => __( 'Page for Intro', 'sosimple' ),
		'section'  => 'theme',
		'settings' => 'intro_page',
		'type'     => 'dropdown-pages',
		'priority' => 15,
	) );


	/**
	 * Colors
	 */

	$wp_customize->add_setting( 'intro_background_color', array( 
		'default'           => "#58cb8e", 
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'intro_background_color', array(
		'label'    => 'Intro Background Color',
		'section'  => 'theme',
		'settings' => 'intro_background_color',
		'priority' => 20,
	) )	);

	$wp_customize->get_setting( 'intro_background_color' )->transport = 'postMessage';

	$wp_customize->add_setting( 'intro_text_color', array(
		'default'           => 'text-dark',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'intro_text_color', array(
		'label'    => __( 'Intro Text Color', 'sosimple' ),
		'section'  => 'theme',
		'settings' => 'intro_text_color',
		'type'     => 'select',
		'choices'  => array(
			'text-dark'  => __( 'Dark Text', 'sosimple' ),
			'text-light' => __( 'Light Text', 'sosimple' ),
		),
		'priority' => 25,
	) );
}
add_action( 'customize_register', 'sosimple_customize_register' );