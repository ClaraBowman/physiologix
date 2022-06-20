<?php
/**
 * Physiologix functions and definitions
 *
 * @package Physiologix
 */

/**
 * Load our main stylesheet and our custom parcel-built styles and scripts.
 */
add_action( 'wp_enqueue_scripts', function() {
    // Required by theme.
	wp_enqueue_style( 'physiologix', get_stylesheet_uri() );

	// Load our custom CSS.
    wp_enqueue_style( 'parcel', get_stylesheet_directory_uri() . '/dist/index.css', array(), '1.0' );

	// Load our custom scripts.
    wp_enqueue_script( 'parcel', get_stylesheet_directory_uri() . '/dist/index.js', array(), '1.0', true );
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );

/**
 * Disable the admin bar unless you are an administrator.
 */
add_action( 'after_setup_theme', function() {
    if ( ! current_user_can('administrator') && !is_admin() ) {
        show_admin_bar( false );
    } 
} );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
add_action( 'after_setup_theme', function() {

	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

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

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 60,
			'width'       => 200,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	/**
	 * Register our main navigation area
	 */
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'fleming-lms' ),
		)
	);

} );


/**
 * Register widget area.
 */
add_action( 'widgets_init', function() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'physiologix' ),
			'id'            => 'primary-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'physiologix' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
} );
