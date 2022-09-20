<?php

add_action('widgets_init', 'wpkites_widgets_init');

function wpkites_widgets_init() {

    /* sidebar */

    register_sidebar(array(
        'name' => esc_html__('Sidebar widget area', 'wpkites' ),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets in sidebar widget area', 'wpkites' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer widget 1', 'wpkites' ),
        'id' => 'footer-sidebar-1',
        'description' => esc_html__('Add widgets in footer widget area 1', 'wpkites' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer widget 2', 'wpkites' ),
        'id' => 'footer-sidebar-2',
        'description' => esc_html__('Add widgets in footer widget area 2', 'wpkites' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer widget 3', 'wpkites' ),
        'id' => 'footer-sidebar-3',
        'description' => esc_html__('Add widgets in footer widget area 3', 'wpkites' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer widget 4', 'wpkites' ),
        'id' => 'footer-sidebar-4',
        'description' => esc_html__('Add widgets in footer widget area 4', 'wpkites' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('WooCommerce sidebar widget area', 'wpkites' ),
        'id' => 'woocommerce',
        'description' => esc_html__('Add widgets in WooCommerce sidebar widget area', 'wpkites' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}