<?php
/**
 * The template part for displaying the main menu navigation.
 *
 * @package Physiologix
 */

?>

<nav id="navbar" class="navbar fixed-top m-0 px-0 navbar-expand-xl navbar-dark shadow">

    <div class="container-fluid px-lg-5" <?php if ( is_front_page() ) echo 'data-aos="fade-down"'; ?>>

        <button id="btn-search-mobile" type="button" class="d-xl-none btn text-white fs-1" data-bs-toggle="modal" data-bs-target="#search-modal"><i class="fa-solid fa-magnifying-glass me-2"></i></button>

        <div class="navbar-brand">
            <a href="<?php echo get_home_url(); ?>">
                <img class="d-none d-lg-flex img-fluid" src="<?php echo get_template_directory_uri() . '/assets/logo-full-white.svg'; ?>" alt="Physiologix Logo">
                <img class="d-lg-none img-fluid" src="<?php echo get_template_directory_uri() . '/assets/logo-secondary-white.svg'; ?>" alt="Physiologix Logo">
            </a>
        </div>

        <div class="navbar-toggler collapsed" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="toggler-icon bg-white"></div>
            <div class="toggler-icon bg-white w-75"></div>
            <div class="toggler-icon bg-white"></div>
        </div>

        <div class="navbar-collapse justify-content-end collapse" id="navbarSupportedContent">

            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'navbar-nav mt-4 mt-xl-0',
                    'li_class'       => 'nav-item text-white position-relative text-uppercase d-block d-xl-flex my-2 my-xl-0 justify-content-center align-items-center'
                )
            );

            ?>

            <button id="btn-search-desktop" type="button" class="d-none d-xl-block btn btn-px-red ms-1 text-white text-uppercase" data-bs-toggle="modal" data-bs-target="#search-modal"><i class="fa-solid fa-magnifying-glass me-2"></i>Search</button>

        </div><!-- end #navbarSupportedContent -->

    </div><!-- end container -->

</nav>

<div class="modal fade" id="search-modal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    
    <div class="modal-dialog modal-xl">
        
        <div class="modal-content">      
            
            <div class="modal-body">
                
                <?php get_search_form(); ?>  
            
            </div>    
        
        </div><!-- .modal-content -->
    
    </div><!-- .modal-dialog -->

</div><!-- .modal -->
