<?php
/**
 * Custom Shortcodes for the theme.
 *
 * @package Physiologix
 */

/**
 * The Physiologix range slider graphic with embedded links.
 */
add_shortcode( 'px_range_slider' , function( $attributes ) {
    // Initialize the output.
	$output = '';

    // Initialize the attributes and their default values.
    $atts = shortcode_atts(
        array(
            'url_essential'  => '#',
            'url_advanced'   => '#',
            'url_ultimate'   => '#',
            'url_custom'     => '#',
            'text_essential' => '...',
            'text_advanced'  => '...',
            'text_ultimate'  => '...',
            'text_custom'    => '...',
        ),
        $attributes
    );
    
    $output = '
        <div data-aos="fade-up" class="px-range-slider text-center">

            <div class="row position-relative">

                <div class="bg-range position-absolute d-none d-lg-block"></div>
        
                <div data-aos="flip-left" class="col-12 col-sm-6 col-lg-3 p-4">
                    
                    <a class="text-decoration-none" href="' . esc_attr( $atts['url_essential'] ) . '">
                        
                        <img src="' . get_template_directory_uri() . '/assets/icon-essential-range.svg" alt="Physiologix Essentials Range">

                        <h3 class="px-red mt-2 text-uppercase fw-bold">Essential</h3>

                        <h4 class="px-red">Light Support</h4>

                        <p class="text-body">' . esc_attr( $atts['text_essential'] ) . '</p>

                        <img src="' . get_template_directory_uri() . '/assets/icon-essential-callout.svg" alt="Physiologix Essentials Callout" class="mt-2" style="width: 110px">
                        
                    </a>
                    
                </div><!-- .column -->

                <div data-aos="flip-left" data-aos-delay="300" class="col-12 col-sm-6 col-lg-3 p-4">
                    
                    <a class="text-decoration-none" href="' . esc_attr( $atts['url_advanced'] ) . '">
                        
                        <img src="' . get_template_directory_uri() . '/assets/icon-advanced-range.svg" alt="Physiologix Advanced Range">

                        <h3 class="px-blue mt-2 text-uppercase fw-bold">Advanced</h3>

                        <h4 class="px-blue">Moderate Support</h4>

                        <p class="text-body">' . esc_attr( $atts['text_advanced'] ) . '</p>

                        <img src="' . get_template_directory_uri() . '/assets/icon-advanced-callout.svg" alt="Physiologix Advanced Callout" class="mt-4" style="width: 160px">
                    
                    </a>
                    
                </div><!-- .column -->

                <div data-aos="flip-left" data-aos-delay="600" class="col-12 col-sm-6 col-lg-3 p-4">
                    
                    <a class="text-decoration-none" href="' . esc_attr( $atts['url_ultimate'] ) . '">
                        
                        <img src="' . get_template_directory_uri() . '/assets/icon-ultimate-range.svg" alt="Physiologix Ultimate Range">

                        <h3 class="px-black mt-2 text-uppercase fw-bold">Ultimate</h3>

                        <h4 class="px-black">Firm Support</h4>

                        <p class="text-body">' . esc_attr( $atts['text_ultimate'] ) . '</p>

                        <img src="' . get_template_directory_uri() . '/assets/icon-ultimate-callout.svg" alt="Physiologix Ultimate Callout" class="mt-2" style="width: 160px">
                        
                    </a>
                    
                </div><!-- .column -->

                <div data-aos="flip-left" data-aos-delay="900" class="col-12 col-sm-6 col-lg-3 p-4">
                    
                    <a class="text-decoration-none" href="' . esc_attr( $atts['url_custom'] ) . '">
                        
                        <img src="' . get_template_directory_uri() . '/assets/icon-custom-range.svg" alt="Physiologix Custom Range">

                        <h3 class="px-dark mt-2 text-uppercase fw-bold">Custom</h3>

                        <h4 class="px-dark">Firm Support</h4>

                        <p class="text-body">' . esc_attr( $atts['text_custom'] ) . '</p>

                        <img src="' . get_template_directory_uri() . '/assets/icon-custom-callout.svg" alt="Physiologix Custom Callout" class="mt-4" style="width: 175px">
                        
                    </a>
                    
                </div><!-- .column -->
            
            </div><!-- .row -->
            
        </div><!-- .px-range-slider -->
    ';
    
    return $output;
} );

/**
 * The injury type links with animated pain points.
 */
add_shortcode( 'px_injury' , function( $attributes ) {
    // Initialize the output.
	$output = '';

    // Initialize the attributes and their default values.
    $atts = shortcode_atts(
        array(
            'type'     => 'ankle',
            'url'      => '#',
            'pain_loc' => 'bottom: 37%; left: 45%;'
        ),
        $attributes
    );
    
    $output = '
        <a href="' . esc_attr( $atts['url'] ) . '" class="injury-link text-decoration-none">

            <div class="position-relative d-flex align-items-center justify-content-center rounded-top bg-light p-3" style="height: 350px;">

                <div class="injury-location position-absolute bg-px-red" style="' . esc_attr( $atts['pain_loc'] ) . '"></div>

                <img class="img-fluid" src="' . get_template_directory_uri() . '/assets/' . esc_attr( $atts['type'] ) . '-pain.svg" alt="' . esc_attr( $atts['type'] ) . ' pain">

            </div>

            <h3 class="text-white bg-px-red p-2 rounded-bottom">' . ucfirst(esc_attr( $atts['type'] )) . ' Pain</h3>

        </a>
    ';
    
    return $output;
} );

