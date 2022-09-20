<?php

/* * *********************** Theme Customizer with Sanitize function ******************************** */

function wpkites_theme_option($wp_customize) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh'; 

    function wpkites_copyright_sanitize_text($input) {
        return wp_kses_post(force_balance_tags($input));
    }

    function wpkites_sanitize_array($value) {
        if (is_array($value)) {
            foreach ($value as $key => $subvalue) {
                $value[$key] = esc_attr($subvalue);
            }
            return $value;
        }
        return esc_attr($value);
    }

    function wpkites_sanitize_select($input, $setting) {

        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);

        //get the list of possible radio box options 
        $choices = $setting->manager->get_control($setting->id)->choices;

        //return input if valid or return default option
        return ( array_key_exists($input, $choices) ? $input : $setting->default );
    }

    function wpkites_column_callback($control) {
        if ($control->manager->get_setting('home_news_design_layout')->value() == '2' || $control->manager->get_setting('home_news_design_layout')->value() == '5' ) {
            return false;
        }
        return true;
    }

    $wp_customize->add_panel('wpkites_theme_panel',
            array(
                'priority' => 2,
                'capability' => 'edit_theme_options',
                'title' => esc_html__('Blog Options', 'wpkites' )
            )
    );

     /******************** Logo Length *******************************/
    $wp_customize->add_setting( 'wpkites_logo_length',
            array(
                'default' => 154,
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control( new WPKites_Slider_Custom_Control( $wp_customize, 'wpkites_logo_length',
            array(
                'label' => esc_html__( 'Logo Width', 'wpkites'  ),
                'priority' => 50,
                'section' => 'title_tagline',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                ),
            )
        ) );
}

add_action('customize_register', 'wpkites_theme_option');