<?php
/**
 * The template for displaying the footer
 *
 * @package Physiologix
 */

?>

    <footer class="site-footer mt-auto bg-px-dark py-5">

        <div class="site-info container text-white">

            <div class="row">

                <div class="col-12 col-sm-6 col-lg-4 mb-4">

                    <h3 class="fs-5 mb-3"><?php _e( 'Site Links' , 'physiologix' ); ?></h3>

                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'menu_class'     => 'list-unstyled'
                        )
                    );
                    ?>

                </div><!-- .col -->

                <div class="col-12 col-sm-6 col-lg-4 col-xl-5 mb-4">

                    <h3 class="fs-5 mb-3"><?php _e( 'Proud Partners With' , 'physiologix' ); ?></h3>

                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <a href="<?php echo esc_url( get_theme_mod( 'partner_link_1' ) ); ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri() . '/assets/munster-rugby-logo.svg'; ?>" style="width: 85px" alt="<?php _e( 'Munster Rugby' , 'physiologix' ); ?>">
                                <?php _e( 'Munster Rugby' , 'physiologix' ); ?>
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="<?php echo esc_url( get_theme_mod( 'partner_link_2' ) ); ?>" target="_blank">
                                <img src="<?php echo get_template_directory_uri() . '/assets/iscp-logo.svg'; ?>" class="me-3" style="width: 69px" alt="<?php _e( 'Irish Society of Chartered Physiotherapists' , 'physiologix' ); ?>">
                                <span class="d-xl-none"><?php _e( 'ISCP' , 'physiologix' ); ?></span>
                                <span class="d-none d-xl-inline"><?php _e( 'Irish Society of Chartered Physiotherapists' , 'physiologix' ); ?></span>
                            </a>
                        </li>
                    </ul>

                </div><!-- .col -->

                <div class="col-12 col-lg-4 col-xl-3 mb-4">

                    <h3 class="fs-5 mb-3"><?php _e( 'Follow Us' , 'physiologix' ); ?></h3>

                    <ul class="list-unstyled">
                        <li>
                            <a href="<?php echo esc_url( 'https://www.instagram.com/' . get_theme_mod( 'instagram_user' ) ); ?>" target="_blank">
                                <i class="fa-brands fa-instagram me-2"></i><?php echo 'instagram.com/' . get_theme_mod( 'instagram_user' ); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( 'https://www.facebook.com/' . get_theme_mod( 'facebook_user' ) ); ?>" target="_blank">
                                <i class="fa-brands fa-facebook me-2"></i><?php echo 'facebook.com/' . get_theme_mod( 'facebook_user' ); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url( 'https://twitter.com/' . get_theme_mod( 'twitter_user' ) ); ?>" target="_blank">
                                <i class="fa-brands fa-twitter me-2"></i><?php echo 'twitter.com/' . get_theme_mod( 'twitter_user' ); ?>
                            </a>
                        </li>
                    </ul>

                </div><!-- .col -->

            </div><!-- .row -->

            <hr>
            
            <p class="text-center mt-4">&copy; <?php _e( 'Fleming Medical' , 'physiologix' ); ?> <?php echo esc_html( date( 'Y' ) ); ?>. <?php _e( 'All rights reserved. Physiologix is a trading name of Fleming Medical Ltd.', 'physiologix' )?></p>

            <a class="d-block text-center mt-4" href="<?php echo esc_url('https://www.flemingmedical.ie'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/assets/fleming-favicon-logo-white.svg'; ?>" style="width: 200px" alt="Fleming Medical"></a>

        </div><!-- .site-info -->

    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
