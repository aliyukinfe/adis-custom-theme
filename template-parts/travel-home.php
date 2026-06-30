<?php
/**
 * Shared travel homepage section.
 *
 * @package Adis_Custom_Theme
 */

?>
<?php if ( shortcode_exists( 'adis_travel_home' ) ) : ?>
	<?php echo do_shortcode( '[adis_travel_home]' ); ?>
<?php else : ?>
	<section class="travel-fallback-hero">
		<div class="site-container travel-fallback-grid">
			<div>
				<p class="travel-eyebrow"><?php esc_html_e( 'East Africa stays and curated experiences', 'adis-custom-theme' ); ?></p>
				<h1><?php esc_html_e( 'Premium accommodation and tours across East Africa.', 'adis-custom-theme' ); ?></h1>
				<p><?php esc_html_e( 'Install and activate the Adis Travel Site Toolkit plugin to manage destinations, listings, booking paths, and handover notes from WordPress admin.', 'adis-custom-theme' ); ?></p>
				<div class="travel-actions">
					<a class="button" href="<?php echo esc_url( home_url( '/accommodation/' ) ); ?>"><?php esc_html_e( 'Book Accommodation', 'adis-custom-theme' ); ?></a>
					<a class="button" href="<?php echo esc_url( home_url( '/tours/' ) ); ?>"><?php esc_html_e( 'Explore Tours', 'adis-custom-theme' ); ?></a>
				</div>
			</div>

			<div class="hero-panel">
				<h2><?php esc_html_e( 'Ready for Traveler', 'adis-custom-theme' ); ?></h2>
				<p><?php esc_html_e( 'Use this theme with Traveler by ShineTheme and the Adis Travel Site Toolkit plugin for separate accommodation and tour booking journeys.', 'adis-custom-theme' ); ?></p>
			</div>
		</div>
	</section>

	<section class="site-container travel-card-grid">
		<article class="travel-card">
			<h2><?php esc_html_e( 'Accommodation', 'adis-custom-theme' ); ?></h2>
			<p><?php esc_html_e( 'Property listings, room types, seasonal pricing, availability, galleries, and destination filters.', 'adis-custom-theme' ); ?></p>
		</article>
		<article class="travel-card">
			<h2><?php esc_html_e( 'Tours', 'adis-custom-theme' ); ?></h2>
			<p><?php esc_html_e( 'Tour listings, date availability, guest count, extras, itineraries, inclusions, and exclusions.', 'adis-custom-theme' ); ?></p>
		</article>
		<article class="travel-card">
			<h2><?php esc_html_e( 'Direct booking', 'adis-custom-theme' ); ?></h2>
			<p><?php esc_html_e( 'Simple mobile-first paths for guests, without mixing accommodation and tour booking flows.', 'adis-custom-theme' ); ?></p>
		</article>
	</section>
<?php endif; ?>
