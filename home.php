<?php
/**
 * Blog/home fallback template.
 *
 * @package Adis_Custom_Theme
 */

if ( is_front_page() ) {
	get_header();
	?>
	<main id="primary">
		<?php get_template_part( 'template-parts/travel-home' ); ?>
	</main>
	<?php
	get_footer();
	return;
}

require get_template_directory() . '/index.php';
