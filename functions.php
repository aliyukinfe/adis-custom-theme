<?php
/**
 * Adis Custom Theme functions and definitions.
 *
 * @package Adis_Custom_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ADIS_CUSTOM_THEME_VERSION', '1.1.1' );

if ( ! function_exists( 'adis_custom_theme_setup' ) ) {
	/**
	 * Sets up theme defaults and registers WordPress feature support.
	 */
	function adis_custom_theme_setup() {
		load_theme_textdomain( 'adis-custom-theme', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 96,
				'width'       => 320,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'adis-custom-theme' ),
				'footer'  => esc_html__( 'Footer Menu', 'adis-custom-theme' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'adis_custom_theme_setup' );

/**
 * Sets a readable default content width.
 */
function adis_custom_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adis_custom_theme_content_width', 850 );
}
add_action( 'after_setup_theme', 'adis_custom_theme_content_width', 0 );

/**
 * Enqueues theme assets.
 */
function adis_custom_theme_scripts() {
	wp_enqueue_style(
		'adis-custom-theme-style',
		get_stylesheet_uri(),
		array(),
		ADIS_CUSTOM_THEME_VERSION
	);

	wp_enqueue_script(
		'adis-custom-theme-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		ADIS_CUSTOM_THEME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'adis_custom_theme_scripts' );

/**
 * Adds useful SEO-friendly meta output without replacing dedicated SEO plugins.
 */
function adis_custom_theme_meta_description() {
	if ( is_admin() || is_feed() ) {
		return;
	}

	$description = get_bloginfo( 'description', 'display' );

	if ( is_singular() ) {
		$post = get_post();

		if ( $post instanceof WP_Post ) {
			$description = has_excerpt( $post )
				? get_the_excerpt( $post )
				: wp_trim_words( wp_strip_all_tags( $post->post_content ), 28 );
		}
	}

	if ( $description ) {
		printf(
			'<meta name="description" content="%s">' . "\n",
			esc_attr( wp_strip_all_tags( $description ) )
		);
	}
}
add_action( 'wp_head', 'adis_custom_theme_meta_description', 1 );

/**
 * Adds a tiny async/defer affordance for theme scripts.
 *
 * @param string $tag    Script HTML tag.
 * @param string $handle Script handle.
 * @return string
 */
function adis_custom_theme_script_attributes( $tag, $handle ) {
	if ( 'adis-custom-theme-navigation' === $handle ) {
		return str_replace( ' src', ' defer src', $tag );
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'adis_custom_theme_script_attributes', 10, 2 );
