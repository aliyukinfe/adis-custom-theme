<?php
/**
 * The header for Adis Custom Theme.
 *
 * @package Adis_Custom_Theme
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'adis-custom-theme' ); ?></a>

<header class="site-header">
	<div class="site-container header-inner">
		<div class="site-branding">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			}
			?>

			<div>
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>

				<?php
				$adis_description = get_bloginfo( 'description', 'display' );
				if ( $adis_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo esc_html( $adis_description ); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
			<span aria-hidden="true"></span>
			<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'adis-custom-theme' ); ?></span>
		</button>

		<nav class="main-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'adis-custom-theme' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
	</div>
</header>
