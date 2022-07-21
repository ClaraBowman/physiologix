<?php
/**
 * Template Name: Full Width
 * 
 * @package Physiologix
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

            ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
                <?php the_content(); ?>

            </article><!-- #post-<?php the_ID(); ?> -->

		<?php endwhile; ?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
