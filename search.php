<?php
/**
 * The template for displaying search results pages
 *
 * @package Physiologix
 */

get_header();
?>

	<main id="primary" class="site-main container pt-5">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'physiologix' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header>

			<?php
		
			while ( have_posts() ) :

				the_post();
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main>

<?php
get_sidebar();
get_footer();
