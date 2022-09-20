<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//if uninstall not called from WordPress exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
    exit();

$option_names = array('wp_header_images', 'wphi_template_custom', 'wphi_template', 'wphi_styling');

if(!empty($option_names)){
	foreach($option_names as $option_name){
		delete_option( $option_name );	
		delete_site_option( $option_name );  
	}
}