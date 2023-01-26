<?php
/**
 * Template part for displaying posts
 *
 * @package Physiologix
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title mb-4" data-aos="fade-right">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		$date_string   = get_the_date( 'j M Y' );
		$original_time = get_the_time( 'U' );
		$modified_time = get_the_modified_time( 'U' );
		if ( $modified_time >= $original_time + 86400 ) {
			$date_string .= ' (Updated ' . get_the_modified_date( 'j M Y' ) . ')';
		}

		?>
		
		<div class="post-meta mb-3" data-aos="fade-left">

			<span class="date"><i class="fas fa-calendar-alt me-2"></i><?php echo esc_html( $date_string ); ?></span>

			<span class="tags"><i class="fas fa-tags ms-1 me-2"></i><?php the_tags(); ?></span>

		</div>

	</header><!-- .entry-header -->

	<div class="entry-content" data-aos="fade-up">

		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'physiologix' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'physiologix' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
