<?php

// Global variables define
define('WPKITES_TEMPLATE_DIR_URI', get_template_directory_uri());
define('WPKITES_TEMPLATE_DIR', get_template_directory());
if ( ! function_exists( 'wp_body_open' ) ) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}

require( WPKITES_TEMPLATE_DIR . '/inc/scripts/script.php');
require( WPKITES_TEMPLATE_DIR . '/inc/menu/default_menu_walker.php');
require( WPKITES_TEMPLATE_DIR . '/inc/menu/wpkites_nav_walker.php');
require( WPKITES_TEMPLATE_DIR . '/inc/widgets/sidebars.php');
// Meta boxes.
require WPKITES_TEMPLATE_DIR . '/inc/meta-boxes/meta-box.php'; 
// Adding customizer files
require ( WPKITES_TEMPLATE_DIR . '/inc/customizer/customizer.php' );
require ( WPKITES_TEMPLATE_DIR . '/inc/customizer/custom-control.php' );
require ( WPKITES_TEMPLATE_DIR . '/inc/customizer/helper-function.php');
require ( WPKITES_TEMPLATE_DIR . '/inc/customizer/customizer_sections_settings.php' );
require ( WPKITES_TEMPLATE_DIR . '/inc/customizer/single-blog-options.php' );
require ( WPKITES_TEMPLATE_DIR . '/inc/customizer/blog-options.php' );
require_once WPKITES_TEMPLATE_DIR . '/inc/customizer/customizer-slider/customizer-slider.php';
require_once WPKITES_TEMPLATE_DIR . '/inc/customizer/customizer-image-radio/customizer-image-radio.php';
require_once WPKITES_TEMPLATE_DIR . '/inc/class-tgm-plugin-activation.php';
    
if ( ! function_exists( 'wpkites_plus_activate' ) ){
    require( WPKITES_TEMPLATE_DIR . '/inc/breadcrumbs/breadcrumbs.php');
    require ( WPKITES_TEMPLATE_DIR . '/inc/customizer/customizer-pro-feature.php' );    
    require ( WPKITES_TEMPLATE_DIR . '/inc/customizer/customizer_theme_style.php' );    
    require( WPKITES_TEMPLATE_DIR . '/inc/customizer/general-settings.php');
    require ( WPKITES_TEMPLATE_DIR . '/inc/customizer/customizer-recommended-plugin.php');
    require ( WPKITES_TEMPLATE_DIR . '/inc/customizer/blog-page-options.php' );
    require( WPKITES_TEMPLATE_DIR . '/inc/custom-style/custom-css.php');
    require( WPKITES_TEMPLATE_DIR . '/inc/customizer/customizer_color_back_settings.php');
    require( WPKITES_TEMPLATE_DIR . '/inc/customizer/customizer_typography.php');
    require( WPKITES_TEMPLATE_DIR . '/inc/customizer/active-callback.php');
}

if (!function_exists('wpkites_theme_setup')) :

    function wpkites_theme_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */

        load_theme_textdomain('wpkites' , WPKITES_TEMPLATE_DIR . '/languages');

        // Add default posts and comments RSS feed links to head.

        add_theme_support('automatic-feed-links');


        //Add selective refresh for sidebar widget
        add_theme_support('customize-selective-refresh-widgets');

        /*
         * Let WordPress manage the document title.
         */
        add_theme_support('title-tag');


        // supports featured image
        add_theme_support('post-thumbnails');



        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'wpkites-primary' => esc_html__('Primary', 'wpkites' ),
        ));

        //Custom background support
        add_theme_support('custom-background');
        
        // woocommerce support
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        //Custom logo
        add_theme_support('custom-logo', array(
            'height' => 61,
            'width' => 154,
            'flex-width' => true,
            'flex-height' => true,
            'header-text' => array('site-title', 'site-description'),
        ));

        // set default content width
        if (!isset($content_width)) {
            $content_width = 696;
        }
        
        //About Theme
        if(!function_exists( 'wpkites_plus_activate' )) :        
            $wpkites_theme = wp_get_theme(); // gets the current theme
            if ('WPKites' == $wpkites_theme->name) {
                if (is_admin()) {
                    require WPKITES_TEMPLATE_DIR . '/admin/admin-init.php';
                }
            }
        endif;
    }

endif;
add_action('after_setup_theme', 'wpkites_theme_setup');

add_action( 'admin_init', 'wpkites_customizer_css' );
    function wpkites_customizer_css() 
        {
            wp_enqueue_style( 'wpkites-pro-info', WPKITES_TEMPLATE_DIR_URI . '/assets/css/pro-details.css' );
        }

function wpkites_logo_class($html) {
    $html = str_replace('custom-logo-link', 'navbar-brand custom-logo', $html);
    return $html;
}

add_filter('get_custom_logo', 'wpkites_logo_class');

function wpkites_new_content_more($more) {
    global $post;
    return '<p><a href="' . esc_url(get_permalink()) . "#more-{$post->ID}\" class=\"more-link btn-ex-small btn-border\">" . esc_html__('Read More', 'wpkites' ) . "</a></p>";
}

add_filter('the_content_more_link', 'wpkites_new_content_more');

if ( ! function_exists( 'wpkites_plus_activate' ) ){
    add_action( 'tgmpa_register', 'wpkites_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
    function wpkites_register_required_plugins() {
        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(
             // This is an example of how to include a plugin from the WordPress Plugin Repository.
            array(
                'name'      => 'Spice Box',
                'slug'      => 'spicebox',
                'required'  => false,
            )

        );

        /*
         * Array of configuration settings. Amend each line as needed.
         *
         * TGMPA will start providing localized text strings soon. If you already have translations of our standard
         * strings available, please help us make TGMPA even better by giving us access to these translations or by
         * sending in a pull-request with .po file(s) with the translations.
         *
         * Only uncomment the strings in the config array if you want to customize the strings.
         */
        $config = array(
            'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu'         => 'tgmpa-install-plugins', // Menu slug.
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
        );

        tgmpa( $plugins, $config );
    }
}

function wpkites_modify_read_more_link() {
     $blog_button = get_theme_mod('wpkites_blog_button_title', 'READ MORE');

            if (empty($blog_button)) {
                return;
            }
            return '<p><a href = "' . esc_url(get_the_permalink()) . '" class="btn-small">' . esc_html($blog_button) . ' <i class="fa fa-angle-double-right"></i></a></p>';

}
add_filter( 'the_content_more_link', 'wpkites_modify_read_more_link' );

//wpkites sanitize checkbox
function wpkites_sanitize_checkbox($checked) {
        // Boolean check.
        return ( ( isset($checked) && true == $checked ) ? true : false );
}

//wpkites sanitize text
function wpkites_sanitize_text($input) {
        return wp_kses_post(force_balance_tags($input));
}

if ( function_exists( 'wpkites_plus_activate' ) ) {
    function wpkites_plus_slider_css() { ?>
        <style>
            @media (max-width: 786px) {
                .video-slider.home-section {
                    height: auto !important;
                }
            }
        </style>
    <?php }
    add_action('wp_head','wpkites_plus_slider_css');
}
/**--------------------------------------------------------------------------------
#This is the freemius region only exectue when the companion plugin is active
---------------------------------------------------------------------------------*/

if ( ! function_exists( 'wpk_fs' ) ) {
	if ( function_exists( 'spiceb_activate' ) && defined( 'SPICEB_PLUGIN_DIR' ) && file_exists(SPICEB_PLUGIN_DIR . 'inc/freemius/start.php') ) { 
    //wp_die( 1);
		if ( ! function_exists( 'wpk_fs' ) ) {
    // Create a helper function for easy SDK access.
    function wpk_fs() {
        global $wpk_fs;

        if ( ! isset( $wpk_fs ) ) { 
            // Include Freemius SDK.
           require_once SPICEB_PLUGIN_DIR . 'inc/freemius/start.php';
//wp_die(SPICEB_PLUGIN_DIR . 'inc/freemius/start.php');
            $wpk_fs = fs_dynamic_init( array(
                'id'                  => '10441',
                'bundle_id'           => '10446',
                'slug'                => 'wpkites',
                'type'                => 'theme',
                'public_key'          => 'pk_b4de8efaf58184141ca72af1fe450',
                'bundle_public_key'   => 'pk_622d6379a7ba6cd0b9f39a469c897',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => true,
                'menu'                => array(
                    'slug'           => 'wpkites-panel',
                    'account'        => true,
                    'support'        => true,
                ),
             'bundle_license_auto_activation' => true,
						 'navigation'                     => 'menu',
						 'is_org_compliant'               => true,
            ) );
        }

        return $wpk_fs;
    }

    // Init Freemius.
    wpk_fs();
    // Signal that SDK was initiated.
    do_action( 'wpk_fs_loaded' );
}
	}
}