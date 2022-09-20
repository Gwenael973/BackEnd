<?php
/* Notifications in customizer */
 if ( ! function_exists( 'wpkites_plus_activate' ) ):
require WPKITES_TEMPLATE_DIR . '/inc/customizer-notify/wpkites-customizer-notify.php';
$wpkites_config_customizer = array(
	'recommended_plugins'       => array(
		'spicebox' => array(
			'recommended' => true,
			/* translators: %s: plugin name */
			'description' => sprintf( esc_html__( 'Install and activate the %s plugin to take full advantage of all the features this theme has to offer.', 'wpkites'  ), sprintf( '<strong>%s</strong>', 'Spice Box' ) ),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'wpkites'  ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'wpkites'  ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'wpkites'  ),
	'activate_button_label'     => esc_html__( 'Activate', 'wpkites'  ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'wpkites'  ),
);
WPKites_Customizer_Notify::init( apply_filters( 'WPKites_Customizer_Notify_array', $wpkites_config_customizer ) );
endif;