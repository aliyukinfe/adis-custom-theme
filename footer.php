<?php
/**
 * The footer for Adis Custom Theme.
 *
 * @package Adis_Custom_Theme
 */

?>
	<footer class="site-footer">
		<div class="site-container footer-inner">
			<p>
				&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.
				<?php esc_html_e( 'All rights reserved.', 'adis-custom-theme' ); ?>
			</p>

			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_class'     => 'footer-menu',
					'container'      => false,
					'fallback_cb'    => false,
					'depth'          => 1,
				)
			);
			?>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
