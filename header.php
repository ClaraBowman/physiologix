<?php
/**
 * The head section.
 *
 * @package Physiologix
 */

?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php wp_head(); ?>

</head>

<body <?php body_class('p-0 m-0'); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site min-vh-100 d-flex flex-column">

    <?php get_template_part('template-parts/navbar');
