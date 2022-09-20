<?php

/**
 * Single Blog Options Customizer
 *
 * @package wpkites
 */
function wpkites_single_blog_customizer($wp_customize) {
    $wp_customize->add_section('wpkites_single_blog_section',
            array(
                'title' => esc_html__('Single Post', 'wpkites' ),
                'panel' => 'wpkites_theme_panel',
                'priority' => 5
    ));

/*     * *********************** Meta Hide Show ******************************** */
    
    $wp_customize->add_setting('wpkites_enable_single_post_admin',
            array(
                'default' => true,
                'sanitize_callback' => 'wpkites_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new WPKites_Toggle_Control($wp_customize, 'wpkites_enable_single_post_admin',
                    array(
                'label' => esc_html__('Hide/Show Author', 'wpkites' ),
                'type' => 'toggle',
                'section' => 'wpkites_single_blog_section',
                'priority' => 4,
                    )
    ));

    $wp_customize->add_setting('wpkites_enable_single_post_date',
            array(
                'default' => true,
                'sanitize_callback' => 'wpkites_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new WPKites_Toggle_Control($wp_customize, 'wpkites_enable_single_post_date',
                    array(
                'label' => esc_html__('Hide/Show Date', 'wpkites' ),
                'type' => 'toggle',
                'section' => 'wpkites_single_blog_section',
                'priority' => 5,
                    )
    ));

    $wp_customize->add_setting('wpkites_enable_single_post_category',
            array(
                'default' => true,
                'sanitize_callback' => 'wpkites_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new WPKites_Toggle_Control($wp_customize, 'wpkites_enable_single_post_category',
                    array(
                'label' => esc_html__('Hide/Show Category', 'wpkites' ),
                'type' => 'toggle',
                'section' => 'wpkites_single_blog_section',
                'priority' => 6,
                    )
    ));  


    $wp_customize->add_setting('wpkites_enable_single_post_comnt',
            array(
                'default' => true,
                'sanitize_callback' => 'wpkites_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new WPKites_Toggle_Control($wp_customize, 'wpkites_enable_single_post_comnt',
                    array(
                'label' => esc_html__('Hide/Show Comments', 'wpkites' ),
                'type' => 'toggle',
                'section' => 'wpkites_single_blog_section',
                'priority' => 8,
                    )
    ));
    $wp_customize->add_setting('wpkites_enable_single_post_admin_details',
            array(
                'default' => true,
                'sanitize_callback' => 'wpkites_sanitize_checkbox',
            )
    );
    $wp_customize->add_control(new WPKites_Toggle_Control($wp_customize, 'wpkites_enable_single_post_admin_details',
                    array(
                'label' => esc_html__('Hide/Show Author Details', 'wpkites' ),
                'type' => 'toggle',
                'section' => 'wpkites_single_blog_section',
                'priority' => 9,
                    )
    ));
}

add_action('customize_register', 'wpkites_single_blog_customizer');