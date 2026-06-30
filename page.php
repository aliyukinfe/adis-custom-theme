<?php
/**
 * Template for displaying pages.
 *
 * @package Adis_Custom_Theme
 */

get_header();
?>

<main id="primary" class="main-content">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( is_front_page() ) : ?>
				<section class="hero">
					<div class="site-container hero-grid">
						<div>
							<?php the_title( '<h1>', '</h1>' ); ?>
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
						</div>

						<div class="hero-panel">
							<h2><?php esc_html_e( 'Built for growth', 'adis-custom-theme' ); ?></h2>
							<p><?php esc_html_e( 'A fast, mobile-friendly WordPress experience with clean structure, readable content, and room for your business to scale.', 'adis-custom-theme' ); ?></p>
						</div>
					</div>
				</section>
			<?php else : ?>
				<div class="site-container content-area">
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header>

					<div class="entry-content">
						<?php
						the_content();
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'adis-custom-theme' ),
								'after'  => '</div>',
							)
						);
						?>
					</div>
				</div>
			<?php endif; ?>
		</article>
	<?php endwhile; ?>
</main>

<?php
get_footer();
