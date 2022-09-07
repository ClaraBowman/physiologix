<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Physiologix
 */

if ( ! is_active_sidebar( 'sidebar-main' ) ) {
	return;
}
?>

<aside class="widget-area me-4 d-none d-md-block" data-aos="fade-right">
	
	<?php dynamic_sidebar( 'sidebar-main' ); ?>

</aside>
