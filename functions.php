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

    // Load our custom CSS.
    wp_enqueue_style( 'parcel', get_stylesheet_directory_uri() . '/dist/index.css', array(), wp_get_theme()->get( 'Version' ) );

    // Load our custom scripts.
    wp_enqueue_script( 'parcel', get_stylesheet_directory_uri() . '/dist/index.js', array(), wp_get_theme()->get( 'Version' ), true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
} );

/**
 * Theme feature setup.
 */
add_action( 'after_setup_theme', function() {
    
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'responsive-embeds' );
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

    register_sidebar(
        array(
            'name'          => esc_html__( 'Blog Sidebar', 'physiologix' ),
            'id'            => 'sidebar-blog',
            'description'   => esc_html__( 'Add widgets here.', 'physiologix' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
} );

/** 
 * Add our theme shortcodes.
 */
require 'shortcodes.php';

/** 
 * Add our custom theme options to the customizer.
 */
require 'customizer.php';

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
 * Remove the injected WooCommerce sidebar and add it later ourselves.
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 ); 

/** 
 * Remove the default WooCommerce content wrappers.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/** 
 * Replace the above with our own wrappers.
 */
add_action('woocommerce_before_main_content', function() {
    ?>
    <div class="container d-flex py-5">
        
        <?php if ( ! is_product() ) get_sidebar(); ?>
        
        <main class="site-main" data-aos="fade-up">

    <?php
}, 10 );

add_action('woocommerce_after_main_content', function() {
    ?>
        </main><!-- .site-main -->
    
    </div><!-- .container -->
    
    <?php
}, 10 );

/**
 * Add a link to the relevant product page(s) on the main Fleming site.
 */
add_action( 'woocommerce_after_add_to_cart_form', function( ) {

    // Get the global product object.
    global $product;
    
    // Get the array of variation IDs.
    $variations = $product->get_children();

    // Construct the base url.
    $fm_url = 'https://www.flemingmedical.ie/';

    // If there are no variations, add the main SKU. Otherwise fetch the SKUs from the variations.
    if ( empty( $variations ) ) {

        // Set the URL path to the SKU, which will find it on the main fleming site.
        $fm_url .= $product->get_sku();

        // Add tracking analytics parameters to the end of the URL.
        $fm_url .= '?utm_source=physiologix&utm_medium=backlink&utm_campaign=new-px-site';

    } else {

        $fm_url .= 'search?q=';

        foreach ( $variations as $variation ) {
            
            // Get the product by the variation id.
            $p = wc_get_product( $variation );

            // Add the variation SKU to the search query.
            $fm_url .= $p->get_sku() . '+';

        }

        // Append tracking analytics with & instead of ?.
        $fm_url .= '&utm_source=physiologix&utm_medium=backlink&utm_campaign=new-px-site';
    }

    ?>
    
    <div class="mb-4">

        <p><?php _e( 'Are you a <span class="fw-bold">business or other retailer</span>?', 'physiologix' ); ?></p>

        <a href="<?php echo esc_url( $fm_url ); ?>" target="_blank" class="btn btn-light border">

            <i class="fa-solid fa-cart-plus me-1"></i>

            <?php _e( 'Buy here at trade price', 'physiologix' ); ?>
            
            <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>

        </a>  

    </div>

    <?php
});

/**
 * Modify the archive title (removing 'Category' prefix)
 */
add_filter( 'get_the_archive_title', function ( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});
