<?php
/**
 * Chic Lite Theme Customizer
 *
 * @package Chic_Lite
 */

/**
 * Requiring customizer panels & sections
*/
$chic_lite_sections     = array( 'info', 'site', 'color', 'layout', 'appearance', 'general', 'footer' );

foreach( $chic_lite_sections as $chic_lite_section ){
    require get_template_directory() . '/inc/customizer/' . $chic_lite_section . '.php';
}

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Active Callbacks
*/
require get_template_directory() . '/inc/customizer/active-callback.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function chic_lite_customize_preview_js() {
	wp_enqueue_script( 'chic-lite-customizer', get_template_directory_uri() . '/inc/js/customizer.js', array( 'customize-preview' ), CHIC_LITE_THEME_VERSION, true );
}
add_action( 'customize_preview_init', 'chic_lite_customize_preview_js' );

function chic_lite_customize_script(){
    $array = array(
        'home'    => get_permalink( get_option( 'page_on_front' ) ),
        'flushFonts'        => wp_create_nonce( 'chic-lite-local-fonts-flush' ),
    );
    
    wp_enqueue_style( 'chic-lite-customize', get_template_directory_uri() . '/inc/css/customize.css', array(), CHIC_LITE_THEME_VERSION );
    wp_enqueue_script( 'chic-lite-customize', get_template_directory_uri() . '/inc/js/customize.js', array( 'jquery', 'customize-controls' ), CHIC_LITE_THEME_VERSION, true );
    wp_localize_script( 'chic-lite-customize', 'chic_lite_cdata', $array );

    wp_localize_script( 'chic-lite-repeater', 'chic_lite_customize',
        array(
            'nonce' => wp_create_nonce( 'chic_lite_customize_nonce' )
        )
    );
}
add_action( 'customize_controls_enqueue_scripts', 'chic_lite_customize_script' );

/**
 * Reset font folder
 *
 * @access public
 * @return void
 */
function chic_lite_ajax_delete_fonts_folder() {
	// Check request.
	if ( ! check_ajax_referer( 'chic-lite-local-fonts-flush', 'nonce', false ) ) {
		wp_send_json_error( 'invalid_nonce' );
	}
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_send_json_error( 'invalid_permissions' );
	}
	if ( class_exists( '\Chic_Lite_WebFont_Loader' ) ) {
		$font_loader = new \Chic_Lite_WebFont_Loader( '' );
		$removed = $font_loader->delete_fonts_folder();
		if ( ! $removed ) {
			wp_send_json_error( 'failed_to_flush' );
		}
		wp_send_json_success();
	}
	wp_send_json_error( 'no_font_loader' );
}
add_action( 'wp_ajax_chic_lite_flush_fonts_folder', 'chic_lite_ajax_delete_fonts_folder' );

/*
 * Notifications in customizer
 */
require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-install-helper.php';

require get_template_directory() . '/inc/customizer-plugin-recommend/plugin-install/class-plugin-recommend.php';