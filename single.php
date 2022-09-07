<?php
/**
 * The template for displaying all single posts
 *
 * @package Physiologix
 */

get_header();
?>

	<main id="primary" class="site-main container py-5">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
