<?php defined( 'ABSPATH' ) or die( __('No script kiddies please!', 'wp-header-images') );
/*
	Plugin Name: WP Header Images
	Plugin URI: http://androidbubble.com/blog/wordpress/plugins/wp-header-images
	Description: WP Header Images is a great plugin to implement custom header images for each page. You can set images easily and later can manage CSS from your theme.
	Version: 2.0.7
	Author: Fahad Mahmood 
	Text Domain: wp-header-images
	Domain Path: /languages
	Author URI: https://www.androidbubbles.com
	License: GPL2
	This WordPress Plugin is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or any later version. This free software is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this software. If not, see http://www.gnu.org/licenses/gpl-2.0.html.
*/ 


        
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        

	global $wphi_premium_link, $wphi_dir, $wphi_pro, $wphi_data, $wphi_link, $wphi_template, $wphi_header_images, $wphi_set_str, $is_gluri_slider, $gsp_option_name, $gluri_slider_results, $wpdb, $gulri_priority, $wphi_on_off_options;

	$gsp_option_name = "gsp-item-";
    $plugins_activated = apply_filters( 'active_plugins', get_option( 'active_plugins' ));
    $is_gluri_slider = in_array('gulri-slider/index.php', $plugins_activated);
	$wphi_on_off_options = get_option('wphi_on_off_options');
	$wphi_on_off_options = (is_array($wphi_on_off_options)?$wphi_on_off_options:array());
    if($is_gluri_slider){

        $gluri_slider_results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}options WHERE option_name LIKE '" . $gsp_option_name . "%'", OBJECT);
        $gulri_priority = true;

    }else{

        $gluri_slider_results = array();
        $gulri_priority = false;

    }



    $wphi_template = get_option('wphi_template', 'centered');
	$wphi_dir = plugin_dir_path( __FILE__ );
	$rendered = FALSE;
	$wphi_data = get_plugin_data(__FILE__);
	$wphi_premium_link = 'https://shop.androidbubbles.com/product/wp-header-images-pro';//https://shop.androidbubble.com/products/wordpress-plugin?variant=36439508484251';//
	$wphi_link = plugin_dir_url( __FILE__ );

	
	$wphi_premium_scripts = $wphi_dir.'pro/wphi-premium.php';

	$wphi_pro = file_exists($wphi_premium_scripts);

	if($wphi_pro){
		
		include($wphi_premium_scripts);

	}

    $wphi_set_str = $is_gluri_slider || $wphi_pro ? __('Header Image','wp-header-images') : __('Header Image','wp-header-images');


    include('inc/functions.php');
        
	

	add_action( 'admin_enqueue_scripts', 'register_hi_scripts' );
	add_action( 'wp_enqueue_scripts', 'register_hi_scripts' );
	

		

		
	function wphi_activate() {	
	}
	register_activation_hook( __FILE__, 'wphi_activate' );
	
		
	if(is_admin()){
		add_action( 'admin_menu', 'wphi_menu' );
		$plugin = plugin_basename(__FILE__); 
		add_filter("plugin_action_links_$plugin", 'wphi_plugin_links' );	
		
		
	}else{


        add_action( 'wp_footer', 'wp_header_images' );
		add_action('apply_header_images', 'wphi_get_header_images', 10, 1);	
		
		
		add_shortcode('WP_HEADER_IMAGES', 'wphi_get_header_images');		
		
	}


	