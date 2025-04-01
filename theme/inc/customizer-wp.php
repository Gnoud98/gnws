<?php

/**
 * Functions which customizer into WordPress
 *
 * @package mbs
 */

/**
 * Function help upload SVG
 */
function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

/**
 * Remove Crop Image Wordpress Size: Large + Medium_large + Medium
 */
add_filter('intermediate_image_sizes', function ($sizes) {
    return array_diff($sizes, ['medium_large']);  // Medium Large (768 x 0)
});
//
add_action('init', 'remove_extra_image_sizes');
function remove_extra_image_sizes()
{
    $sizes = array();
    foreach (get_intermediate_image_sizes() as $size) {
        if (!in_array($size, $sizes)) {
            remove_image_size($size);
        }
    }
}

/**
 * Remove Editor Gutenberg, make Edior Classic
 */
// Post
add_filter('use_block_editor_for_post', '__return_false', 10);
// Post type
add_filter('use_block_editor_for_post_type', '__return_false', 10);

/**
 * Setup Plugin ACF
 */
// 1. customize ACF path
add_filter('acf/settings/path', 'willgroup_acf_settings_path');
function willgroup_acf_settings_path($path)
{
    $path = get_stylesheet_directory() . '/inc/acf/';
    return $path;
}

// 2. customize ACF dir
add_filter('acf/settings/dir', 'willgroup_acf_settings_dir');
function willgroup_acf_settings_dir($dir)
{
    $dir = get_stylesheet_directory_uri() . '/inc/acf/';
    return $dir;
}

// 3. Include ACF
include_once(get_stylesheet_directory() . '/inc/acf/acf.php');


// Add save and load points for ACF JSON
add_filter( 'acf/settings/save_json', 'cysp_acf_json_save_point' );
function cysp_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

add_filter( 'acf/settings/load_json', 'cysp_acf_json_load_point' );
function cysp_acf_json_load_point( $paths ) {
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

/**
 * Style Dashboard
 */
//Css Admin
if (!function_exists('mbs_css_admin')) :
    add_action('admin_head', 'mbs_css_admin');
    add_action('admin_enqueue_scripts', 'mbs_css_admin');
    function mbs_css_admin()
    {
        wp_enqueue_style('admin_css', get_template_directory_uri() . '/admin/admin.css');
    }
endif;
//CSS Login
if (!function_exists('mbs_css_admin_login')) :
    add_action('login_enqueue_scripts', 'mbs_css_admin_login');
    function mbs_css_admin_login()
    {
        wp_enqueue_style('admin_login_css', get_template_directory_uri() . '/admin/login.css');
    }
endif;

/**
 * Get home url Author
 */
add_filter('login_headerurl', 'my_custom_login_url');
function my_custom_login_url($url)
{
    $theme_data = wp_get_theme();
    $theme_uri = $theme_data->get('ThemeURI');
    return $theme_uri;
}

/**
 * Automatically set the image Title, Alt-Text, Caption & Description upload (image tab)
 */
add_action('add_attachment', 'hazo_set_image_meta_image_upload');
function hazo_set_image_meta_image_upload($post_ID)
{
    if (wp_attachment_is_image($post_ID)) {
        $hazo_image_title = get_post($post_ID)->post_title;
        $hazo_image_title = preg_replace(
            '%\s*[-_\s]+\s*%',
            ' ',
            $hazo_image_title
        );
        $hazo_image_title = ucwords(strtolower($hazo_image_title));
        $hazo_my_image_meta = array(
            'ID' => $post_ID,
            'post_title' => $hazo_image_title,
            'post_excerpt' => '',
            'post_content' => '',
        );
        update_post_meta($post_ID, '_wp_attachment_image_alt',    $hazo_image_title);
        wp_update_post($hazo_my_image_meta);
    }
}


/**
 * Disable XMLRPC
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Remove Logo / Version / Help
 */
function mbs_remove_version()
{
    return '';
}
add_filter('the_generator', 'mbs_remove_version');
function change_footer_admin()
{
    return ' ';
}
add_filter('admin_footer_text', 'change_footer_admin', 9999);
function change_footer_version()
{
    return ' ';
}
add_filter('update_footer', 'change_footer_version', 9999);
remove_action('wp_head', 'wp_generator');
// Remove version from rss
add_filter('the_generator', '__return_empty_string');

add_filter('contextual_help', 'mbs_remove_help_tabs', 999, 3);
function mbs_remove_help_tabs($mbs_old_help, $screen_id, $screen)
{
    $screen->remove_help_tabs();
    return $mbs_old_help;
}
add_action('admin_bar_menu', 'remove_wp_logo', 999);
function remove_wp_logo($wp_admin_bar)
{
    $wp_admin_bar->remove_node('wp-logo');
}

/**
 * Disabled Template
 */
function my_remove_page_template()
{
    if (!class_exists('WooCommerce')) {
        global $pagenow;
        if (in_array($pagenow, array('post-new.php', 'post.php')) && get_post_type() == 'page') { ?>
            <script>
                (function($) {
                    $(document).ready(function() {
                        $('#page_template option[value="template-page/content-woocommerce.php"]').remove();
                    })
                })(jQuery)
            </script>
<?php
        }
    }
}
add_action('admin_footer', 'my_remove_page_template', 10);


/**
 * Remove Tag, Category from archive title
 */
add_filter('get_the_archive_title', 'my_theme_archive_title');
function my_theme_archive_title($title)
{
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }

    return $title;
}

/**
 * Classic Widget
 */
function example_theme_support()
{
    remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'example_theme_support');


/*
* Fix check child-parent taxonomy in admin
*/
add_filter('wp_terms_checklist_args', function ($args, $idPost) {
    $args['checked_ontop'] = false;

    return $args;
}, 10, 2);


/**
 * Disable Remove HTML ACF 6.2.5
 */
add_filter( 'acf/admin/prevent_escaped_html_notice', '__return_true' );
add_filter( 'wp_kses_allowed_html', 'acf_add_allowed_iframe_tag', 10, 2 );
function acf_add_allowed_iframe_tag( $tags, $context ) {
	if ( $context === 'acf' )
	{
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
 * Disable Rest  API
 */

add_filter( 'rest_authentication_errors', function ($result) {
	// If a previous authentication check was applied,
	// pass that result along without modification.
	if ( true === $result || is_wp_error( $result ) ) {
		return $result;
	}

	// No authentication has been performed yet.
	// Return an error if user is not logged in.
	if ( ! is_user_logged_in() && empty( $_POST['_wpcf7'] ) ) {
		return new WP_Error(
			'rest_not_logged_in',
			__( 'You are not currently logged in.' ),
			array( 'status' => 401 )
		);
	}

	// Our custom authentication check should have no effect
	// on logged-in requests
	return $result;
} );

/**
 * Remove Version Number
 */
// Remove version number from WordPress
// Pick out the version number from scripts and styles
function remove_version_from_style_js( $src ) {
if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
$src = remove_query_arg( 'ver', $src );
return $src;
}
add_filter( 'style_loader_src', 'remove_version_from_style_js');
add_filter( 'script_loader_src', 'remove_version_from_style_js');