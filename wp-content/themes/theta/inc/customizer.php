<?php
/**
 * Functions executed in customizer.
 * =================================
 */
/**
 * Register panels for Customizer.
 *
 * @since theta 1.0
 */
function theta_customize_register( $wp_customize ) {

/*
	$wp_customize->get_section( 'header_image' )->panel        = 'theta_appearance_settings';
	$wp_customize->get_section( 'background_image' )->panel    = 'theta_appearance_settings';
	
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'custom_logo' )->transport     = 'postMessage';
*/
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'custom_logo', array(
				'selector'        => '.theta-logo-img',
				'settings'        => 'custom_logo',
				'render_callback' => 'theta_custom_logo_callback',
			)
		);
		
		$wp_customize->selective_refresh->add_partial(
			'blogname', array(
				'selector'        => '.blog-name',
				'render_callback' => 'theta_blogname_callback',
			)
		);		
		
		/* Selective refresh for tagline. Just on latest posts page */
		if ( 'posts' === get_option( 'show_on_front' ) ) {
			$wp_customize->selective_refresh->add_partial(
				'blogdescription', array(
					'selector'        => '.blog-description',
					'render_callback' => 'theta_blogdescription_callback',
				)
			);
		}
		
		
		$wp_customize->selective_refresh->add_partial(
			'enable_search', array(
				'selector'        => '.theta-search',
				'render_callback' => 'theta_sanitize_checkbox',
			)
		);				
		
		
		$wp_customize->selective_refresh->add_partial(
			'enable_return_top', array(
				'selector'        => '#gotoTop',
				'render_callback' => 'theta_sanitize_checkbox',
			)
		);	
		
		
		$wp_customize->selective_refresh->add_partial(
			'enable_breadcrumb_check', array(
				'selector'        => '.breadcrumbs',
				'render_callback' => 'theta_sanitize_checkbox',
			)
		);			
		
		
		$wp_customize->selective_refresh->add_partial(
			'footer_code', array(
				'selector'        => '.copyright',
				'render_callback' => false,
			)
		);			
						
		$wp_customize->selective_refresh->add_partial(
			'enable_article_info', array(
				'selector'        => '.author-share',
				'render_callback' => false,
			)
		);			
	}




}
add_action( 'customize_register', 'theta_customize_register' );


/**
 * Blog description callback function
 *
 * @return void
 */
function theta_blogname_callback() {
	bloginfo( 'name' );
}
/**
 * Blog description callback function
 *
 * @return void
 */
function theta_blogdescription_callback() {
	bloginfo( 'description' );
}

/**
 * Utils functions needed for controls.
 * ====================================
 */
/**
 * Custom logo callback function.
 *
 * @return string
 */
function theta_custom_logo_callback() {
	if ( get_theme_mod( 'custom_logo' ) ) {
		$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
		$logo = '<img src="' . esc_url( $logo[0] ) . '">';
	} else {
		$logo = '<p>' . get_bloginfo( 'name' ) . '</p>';
	}
	return $logo;
}

function theta_sanitize_checkbox( $input ){
	return ( isset( $input ) && true == $input ? true : false );
}