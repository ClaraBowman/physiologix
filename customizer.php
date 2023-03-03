<?php
/**
 * The theme customizer file.
 *
 * @package physiologix
 */

/**
 * Register the customizer panels and settings.
 *
 * @param object $wp_customize The customizer object.
 */
add_action( 'customize_register', function( $wp_customize ) {
    
    // Custom theme options panel.
	$wp_customize->add_panel(
		'physiologix_theme_panel',
		array(
			'capability'  => 'edit_theme_options',
			'title'       => __( 'Custom Theme Options', 'physiologix' ),
			'description' => __( 'Extra customization options', 'physiologix' ),
		)
	);

    // Footer section.
	$wp_customize->add_section(
		'footer_options',
		array(
			'capability' => 'edit_theme_options',
			'title'      => __( 'Footer', 'physiologix' ),
			'panel'      => 'physiologix_theme_panel',
		)
	);

    // Footer partner link 1.
	$wp_customize->add_setting( 'partner_link_1' );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'partner_link_1_ctl',
			array(
				'type'	   => 'url',
				'label'    => __( 'Partner URL 1', 'physiologix' ),
				'section'  => 'footer_options',
				'settings' => 'partner_link_1',
			)
		)
	);

    // Footer partner link 2.
	$wp_customize->add_setting( 'partner_link_2' );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'partner_link_2_ctl',
			array(
				'type'	   => 'url',
				'label'    => __( 'Partner URL 2', 'physiologix' ),
				'section'  => 'footer_options',
				'settings' => 'partner_link_2',
			)
		)
	);

    // Instagram username.
	$wp_customize->add_setting( 'instagram_user' );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'instagram_user_ctl',
			array(
				'type'	   => 'text',
				'label'    => __( 'Instagram Username', 'physiologix' ),
				'section'  => 'footer_options',
				'settings' => 'instagram_user',
			)
		)
	);

    // Facebook username.
	$wp_customize->add_setting( 'facebook_user' );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'facebook_user_ctl',
			array(
				'type'	   => 'text',
				'label'    => __( 'Facebook Username', 'physiologix' ),
				'section'  => 'footer_options',
				'settings' => 'facebook_user',
			)
		)
	);

    // Twitter username.
	$wp_customize->add_setting( 'twitter_user' );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'twitter_user_ctl',
			array(
				'type'	   => 'text',
				'label'    => __( 'Twitter Username', 'physiologix' ),
				'section'  => 'footer_options',
				'settings' => 'twitter_user',
			)
		)
	);

} );
