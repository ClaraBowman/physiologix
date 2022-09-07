<?php
/**
 * Physiologix functions and definitions
 *
 * @package Physiologix
 */


/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', function() {

    // Load our Google font.
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css2?family=Raleway:wght@400;500,700&display=swap', array(), '1.0' );

    // Load our custom CSS.
    wp_enqueue_style( 'parcel', get_stylesheet_directory_uri() . '/dist/index.css', array(), '1.0' );

    // Load our custom scripts.
    wp_enqueue_script( 'parcel', get_stylesheet_directory_uri() . '/dist/index.js', array(), '1.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
} );

/**
 * Theme feature setup.
 */
add_action( 'after_setup_theme', function() {
    
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    // WooCommerce support.
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

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

    register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary', 'physiologix' ),
            'footer' => esc_html__( 'Footer', 'physiologix' ),
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
            'id'            => 'sidebar-main',
            'description'   => esc_html__( 'Add widgets here.', 'physiologix' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
} );

/**
 * Filter to add a 'li_class' argument to the wp_nav_menu function.
 */
add_filter('nav_menu_css_class', function( $classes, $item, $args ) {
    if ( isset( $args->li_class ) ) {
        $classes[] = $args->li_class;
    }
    return $classes;
}, 1, 3);

/**
 * Completely hide the admin bar from the front-end.
 */
add_filter('show_admin_bar', '__return_false');

/** 
 * Add our theme shortcodes.
 */
require 'shortcodes.php';

/**
 * Remove the injected WooCommerce sidebar and add it later ourselves.
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10); 

/** 
 * Remove the default WooCommerce content wrappers.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/** 
 * Replace the above with our own wrappers.
 */
add_action('woocommerce_before_main_content', function() {
    ?>
    <div class="container d-flex py-5">
        <?php if (!is_product()) get_sidebar(); ?>
        <main class="site-main" data-aos="fade-up">
    <?php
}, 10);

add_action('woocommerce_after_main_content', function() {
    ?>
        </main><!-- .site-main -->
    </div><!-- .container -->
    <?php
}, 10);
