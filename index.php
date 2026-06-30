<?php
/**
 * The main template file.
 *
 * @package Adis_Custom_Theme
 */

get_header();
?>

<main id="primary" class="main-content">
	<div class="site-container content-area">
		<?php if ( have_posts() ) : ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header class="page-header">
					<h1 class="page-title"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
					<header class="entry-header">
						<?php
						if ( is_singular() ) {
							the_title( '<h1 class="entry-title">', '</h1>' );
						} else {
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						}
						?>

						<?php if ( 'post' === get_post_type() ) : ?>
							<div class="entry-meta">
								<?php echo esc_html( get_the_date() ); ?>
							</div>
						<?php endif; ?>
					</header>

					<div class="entry-content">
						<?php
						if ( is_singular() ) {
							the_content();
							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'adis-custom-theme' ),
									'after'  => '</div>',
								)
							);
						} else {
							the_excerpt();
							printf(
								'<p><a class="button" href="%1$s">%2$s</a></p>',
								esc_url( get_permalink() ),
								esc_html__( 'Read more', 'adis-custom-theme' )
							);
						}
						?>
					</div>
				</article>
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>
		<?php else : ?>
			<section class="page-content">
				<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'adis-custom-theme' ); ?></h1>
				<p><?php esc_html_e( 'No content has been published yet.', 'adis-custom-theme' ); ?></p>
			</section>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
