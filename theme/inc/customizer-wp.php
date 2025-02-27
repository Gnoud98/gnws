<?php

/**
 * Functions which customizer into WordPress
 *
 * @package gnws
 */

/**
 * Function help upload SVG
 */
/**
 * Allow SVG uploads for administrator users.
 *
 * @param array $upload_mimes Allowed mime types.
 *
 * @return mixed
 */
add_filter(
	'upload_mimes',
	function ($upload_mimes) {
		// By default, only administrator users are allowed to add SVGs.
		// To enable more user types edit or comment the lines below but beware of
		// the security risks if you allow any user to upload SVG files.
		if ( ! current_user_can( 'administrator' ) ) {
			return $upload_mimes;
		}

		$upload_mimes['svg'] = 'image/svg+xml';
		$upload_mimes['svgz'] = 'image/svg+xml';

		return $upload_mimes;
	}
);

/**
 * Add SVG files mime check.
 *
 * @param array        $wp_check_filetype_and_ext Values for the extension, mime type, and corrected filename.
 * @param string       $file Full path to the file.
 * @param string       $filename The name of the file (may differ from $file due to $file being in a tmp directory).
 * @param string[]     $mimes Array of mime types keyed by their file extension regex.
 * @param string|false $real_mime The actual mime type or false if the type cannot be determined.
 */
add_filter(
	'wp_check_filetype_and_ext',
	function ($wp_check_filetype_and_ext, $file, $filename, $mimes, $real_mime) {

		if ( ! $wp_check_filetype_and_ext['type'] ) {

			$check_filetype = wp_check_filetype( $filename, $mimes );
			$ext = $check_filetype['ext'];
			$type = $check_filetype['type'];
			$proper_filename = $filename;

			if ( $type && 0 === strpos( $type, 'image/' ) && 'svg' !== $ext ) {
				$ext = false;
				$type = false;
			}

			$wp_check_filetype_and_ext = compact( 'ext', 'type', 'proper_filename' );
		}

		return $wp_check_filetype_and_ext;
	},
	10,
	5
);

/**
 * Setup Plugin ACF
 */
// 1. customize ACF path
add_filter( 'acf/settings/path', 'gnws_acf_settings_path' );
function gnws_acf_settings_path( $path ) {
	$path = get_stylesheet_directory() . '/inc/acf/';
	return $path;
}

// 2. customize ACF dir
add_filter( 'acf/settings/dir', 'gnws_acf_settings_dir' );
function gnws_acf_settings_dir( $dir ) {
	$dir = get_stylesheet_directory_uri() . '/inc/acf/';
	return $dir;
}

// 3. Include ACF
include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );

/**
 * Style Dashboard
 */
//Css Admin
if ( ! function_exists( 'gnws_css_admin' ) ) :
	add_action( 'admin_head', 'gnws_css_admin' );
	add_action( 'admin_enqueue_scripts', 'gnws_css_admin' );
	function gnws_css_admin() {
		wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/admin/admin.css' );
	}
endif;
//CSS Login
if ( ! function_exists( 'gnws_css_admin_login' ) ) :
	add_action( 'login_enqueue_scripts', 'gnws_css_admin_login' );
	function gnws_css_admin_login() {
		wp_enqueue_style( 'admin_login_css', get_template_directory_uri() . '/admin/login.css' );
	}
endif;

/**
 * Get home url Author
 */
add_filter( 'login_headerurl', 'my_custom_login_url' );
function my_custom_login_url( $url ) {
	$theme_data = wp_get_theme();
	$theme_uri = $theme_data->get( 'ThemeURI' );
	return $theme_uri;
}

/**
 * Disable XMLRPC
 */
add_filter( 'xmlrpc_enabled', '__return_false' );
// Disable X-Pingback to header
add_filter( 'wp_headers', 'disable_x_pingback' );
function disable_x_pingback( $headers ) {
	unset( $headers['X-Pingback'] );
	return $headers;
}
function remove_xmlrpc_methods( $methods ) {
	return array();
}
add_filter( 'xmlrpc_methods', 'remove_xmlrpc_methods' );
remove_action( 'wp_head', 'rsd_link' );

/**
 * Remove Logo / Version / Help
 */
function gnws_remove_version() {
	return '';
}
add_filter( 'the_generator', 'gnws_remove_version' );
function change_footer_admin() {
	return ' ';
}
add_filter( 'admin_footer_text', 'change_footer_admin', 9999 );
function change_footer_version() {
	return ' ';
}
add_filter( 'update_footer', 'change_footer_version', 9999 );
remove_action( 'wp_head', 'wp_generator' );
// Remove version from rss
add_filter( 'the_generator', '__return_empty_string' );

add_filter( 'contextual_help', 'gnws_remove_help_tabs', 999, 3 );
function gnws_remove_help_tabs( $gnws_old_help, $screen_id, $screen ) {
	$screen->remove_help_tabs();
	return $gnws_old_help;
}
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}

/**
 * Remove Tag, Category from archive title
 */
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );
function my_theme_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}

	return $title;
}

/**
 * Classic Widget
 */
function example_theme_support() {
	remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'example_theme_support' );


/*
 * Fix check child-parent taxonomy in admin
 */
add_filter( 'wp_terms_checklist_args', function ($args, $idPost) {
	$args['checked_ontop'] = false;

	return $args;
}, 10, 2 );


/**
 * Disable Remove HTML ACF 6.2.5
 */
add_filter( 'acf/admin/prevent_escaped_html_notice', '__return_true' );
add_filter( 'wp_kses_allowed_html', 'acf_add_allowed_iframe_tag', 10, 2 );
function acf_add_allowed_iframe_tag( $tags, $context ) {
	if ( $context === 'acf' ) {
		$tags['iframe'] = array(
			'src' => true,
			'height' => true,
			'width' => true,
			'frameborder' => true,
			'allowfullscreen' => true,
		);
	}

	return $tags;
}

add_filter( 'wpcf7_autop_or_not', '__return_false' );