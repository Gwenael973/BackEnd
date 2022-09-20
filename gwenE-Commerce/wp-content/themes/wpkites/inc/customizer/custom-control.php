<?php

if (!function_exists('wpkites_register_custom_controls')) :

    /**
     * Register Custom Controls
     */
    function wpkites_register_custom_controls($wp_customize) {

        require_once get_template_directory() . '/inc/customizer/toggle/class-toggle-control.php';
        require_once get_template_directory() . '/inc/customizer/sortable/class-sortable-control.php';
        $wp_customize->register_control_type('WPKites_Toggle_Control');
        $wp_customize->register_control_type('WPKites_Control_Sortable');


    }

endif;
add_action('customize_register', 'wpkites_register_custom_controls');