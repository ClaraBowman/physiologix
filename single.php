<?php
/**
 * The template for displaying all single posts
 *
 * @package Physiologix
 */

get_header();
?>

<div class="container py-5">

	<?php 
	
	if ( class_exists( 'woocommerce' ) ) {
		woocommerce_breadcrumb();
	}
	
	?>

	<div class="row">

		<main id="primary" class="site-main col-12 col-md-9 col-lg-8 py-5">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?>

		</main>

		<aside class="col-12 col-md-3 col-lg-4 py-5" data-aos="fade-up">

			<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
			
		</aside>

	</div><!-- /.row -->

</div><!-- /.container -->

<?php
get_footer();
