<?php
/**
 * The template part for displaying post previews.
 *
 * @package Physiologix
 */


/**
 * Get the published and modified dates.
 */
$date_string   = get_the_date( 'j M Y' );
$original_time = get_the_time( 'U' );
$modified_time = get_the_modified_time( 'U' );
if ( $modified_time >= $original_time + 86400 ) {
	$date_string .= ' (Updated ' . get_the_modified_date( 'j M Y' ) . ')';
}

/**
 * Retrieve a shortened excerpt.
 */
$article_excerpt = substr( get_the_excerpt(), 0, 90 );

?>

<div class="col-12 col-lg-6 mb-5">

	<a href="<?php the_permalink(); ?>" class="text-decoration-none">

		<article id="post-<?php the_ID(); ?>" class="content-preview mx-3">

				<?php the_title( '<h3 class="px-dark fs-5" style="min-height: 3rem">', '</h3>' ); ?>

				<small class="text-muted" style="letter-spacing: 0"><i class="fas fa-calendar-alt me-1"></i><?php echo esc_html( $date_string ); ?></small>

				<div class="wrap rounded-1 my-3" style="height: 350px">

					<div class="overlay"></div>

					<div class="bg-img" style="background-image: url('<?php the_post_thumbnail_url( 'large' ); ?>')"></div>

					<button class="btn btn-px-red d-block top-50 text-white position-relative" style="z-index: 100"><i class="fa-solid fa-book-open me-2"></i><?php _e( 'Read More', 'physiologix' ); ?></button>

				</div>

				<p class="text-secondary"><?php echo strip_tags( $article_excerpt ) . '... <strong>read more</strong>'; ?></p>

		</article>

	</a>

</div><!-- /.col -->
