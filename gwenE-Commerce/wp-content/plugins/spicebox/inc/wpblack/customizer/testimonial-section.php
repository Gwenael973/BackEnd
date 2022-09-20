<?php
/* Testimonial Section */
$wp_customize->add_section('testimonial_section', array(
    'title' => esc_html__('Testimonials Settings', 'spicebox'),
    'panel' => 'section_settings',
    'priority' =>4,
));

// Enable testimonial section
$wp_customize->add_setting('testimonial_section_enable', array(
    'default' => true,
    'sanitize_callback' => 'spiceb_wpblack_sanitize_checkbox'
    ));

$wp_customize->add_control(new WPBlack_Toggle_Control($wp_customize, 'testimonial_section_enable',
                array(
            'label' => esc_html__('Enable/Disable Testimonial Section', 'spicebox'),
            'type' => 'toggle',
            'section' => 'testimonial_section',
                )
));

// testimonial section Description
$wp_customize->add_setting('home_testimonial_section_discription', array(
    'capability' => 'edit_theme_options',
    'default' => esc_html__('Nam Viverra Iaculis Finibus', 'spicebox'),
    'sanitize_callback' => 'spiceb_wpblack_home_page_sanitize_text',
));
$wp_customize->add_control('home_testimonial_section_discription', array(
    'label' => esc_html__('Sub Title', 'spicebox'),
    'section' => 'testimonial_section',
    'type' => 'text',
    'active_callback' => 'spiceb_wpblack_testimonial_callback'
));

// testimonial section title
$wp_customize->add_setting('home_testimonial_section_title', array(
    'capability' => 'edit_theme_options',
    'default' => esc_html__('Proin Egestas', 'spicebox'),
    'sanitize_callback' => 'spiceb_wpblack_home_page_sanitize_text',
));
$wp_customize->add_control('home_testimonial_section_title', array(
    'label' => esc_html__('Title', 'spicebox'),
    'section' => 'testimonial_section',
    'type' => 'text',
    'active_callback' => 'spiceb_wpblack_testimonial_callback'
));


if (class_exists('Spicebox_Repeater')) {
$wp_customize->add_setting('wpblack_testimonial_content', array(
));
$wp_customize->add_control(new Spicebox_Repeater($wp_customize, 'wpblack_testimonial_content', array(
            'label' => esc_html__('Testimonial content', 'spicebox'),
            'section' => 'testimonial_section',
            'add_field_label' => esc_html__('Add new Testimonial', 'spicebox'),
            'item_name' => esc_html__('Testimonial', 'spicebox'),
             'customizer_repeater_text_control' => true,
            'customizer_repeater_link_control' => true,
            'customizer_repeater_checkbox_control' => true,
            'customizer_repeater_image_control' => true,
            'customizer_repeater_user_name_control' => true,
            'customizer_repeater_designation_control' => true,
            'active_callback' => 'spiceb_wpblack_testimonial_callback'
        ))); 
}

//Testimonial Background Image
$wp_customize->add_setting('testimonial_callout_background', array(
    'default' => SPICEB_PLUGIN_URL . '/inc/busicare/images/testimonial/testimonial-bg.jpg',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'testimonial_callout_background', array(
    'label' => esc_html__('Background Image', 'spicebox'),
    'section' => 'testimonial_section',
    'settings' => 'testimonial_callout_background',
    'active_callback' => 'spiceb_wpblack_testimonial_callback'
)));

// Image overlay
$wp_customize->add_setting('testimonial_image_overlay', array(
    'default' => true,
    'sanitize_callback' => 'spiceb_wpblack_sanitize_checkbox',
));

$wp_customize->add_control('testimonial_image_overlay', array(
    'label' => esc_html__('Enable/Disable testimonial image overlay', 'spicebox'),
    'section' => 'testimonial_section',
    'type' => 'checkbox',
    'active_callback' => 'spiceb_wpblack_testimonial_callback'
));

//Testimonial Background Overlay Color
$wp_customize->add_setting('testimonial_overlay_section_color', array(
    'sanitize_callback' => 'spiceb_wpblack_home_page_sanitize_text',
    'default' => 'rgba(6, 14, 36, 0.8)',
));

$wp_customize->add_control(new SpiceBox_Customize_Alpha_Color_Control($wp_customize, 'testimonial_overlay_section_color', array(
            'label' => esc_html__('Testimonial image overlay color', 'spicebox'),
            'palette' => true,
            'section' => 'testimonial_section',
            'active_callback' => 'spiceb_wpblack_testimonial_callback'
        )
));
//Navigation Type
$wp_customize->add_setting('testimonial_nav_style', array('default' => 'bullets'));
$wp_customize->add_control('testimonial_nav_style', array(
    'label' => esc_html__('Navigation Style', 'spicebox'),
    'section' => 'testimonial_section',
    'type' => 'radio',
    'priority' => 17,
    'choices' => array(
        'bullets' => esc_html__('Bullets', 'spicebox'),
        'navigation' => esc_html__('Navigation', 'spicebox'),
        'both' => esc_html__('Both', 'spicebox'),
    ),
    'active_callback' => 'spiceb_wpblack_testimonial_callback'
));

// animation speed
$wp_customize->add_setting('testimonial_animation_speed', array('default' => 3000));
$wp_customize->add_control('testimonial_animation_speed',
        array(
            'label' => esc_html__('Animation speed', 'spicebox'),
            'section' => 'testimonial_section',
            'type' => 'select',
            'choices' => array(
                '2000' => '2.0',
                '3000' => '3.0',
                '4000' => '4.0',
                '5000' => '5.0',
                '6000' => '6.0',
            ),
            'active_callback' => 'spiceb_wpblack_testimonial_callback'
));

// smooth speed
$wp_customize->add_setting('testimonial_smooth_speed', array('default' => 1000));
$wp_customize->add_control('testimonial_smooth_speed',
        array(
            'label' => esc_html__('Smooth speed', 'spicebox'),
            'section' => 'testimonial_section',
            'type' => 'select',
            'choices' => array('500' => '0.5',
                '1000' => '1.0',
                '1500' => '1.5',
                '2000' => '2.0',
                '2500' => '2.5',
                '3000' => '3.0'),
            'active_callback' => 'spiceb_wpblack_testimonial_callback'
));

    
$wp_customize->selective_refresh->add_partial('home_testimonial_section_title', array(
    'selector' => '.testimonial h2',
    'settings' => 'home_testimonial_section_title',
    'render_callback' => 'home_testimonial_section_title_render_callback',
));
$wp_customize->selective_refresh->add_partial('home_testimonial_section_discription', array(
    'selector' => '.testimonial p.section-subtitle',
    'settings' => 'home_testimonial_section_discription',
    'render_callback' => 'home_testimonial_section_discription_render_callback',
));

function home_testimonial_section_title_render_callback() {
    return get_theme_mod('home_testimonial_section_title');
}
function home_testimonial_section_discription_render_callback() {
    return get_theme_mod('home_testimonial_section_discription');
}