<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Physiologix
 */

get_header();
?>

<main id="primary" class="site-main container py-5">

	<?php
	
	if ( class_exists( 'woocommerce' ) ) {
		woocommerce_breadcrumb();
	}
	
	if ( have_posts() ) : ?>

		<header class="page-header py-5">

			<?php the_archive_title( '<h1 class="page-title" data-aos="fade-right">', '</h1>' ); ?>

		</header>

		<div class="row" data-aos="fade-up">

			<?php
			
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'preview' );

			endwhile;

			the_posts_navigation();

			?>

		</div><!-- /.row -->

	<?php else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</main>

<?php
get_footer();
