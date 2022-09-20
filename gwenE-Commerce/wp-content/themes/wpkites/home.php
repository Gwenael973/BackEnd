<?php
if( !class_exists('ElementsKit_Lite') && (get_option('show_on_front')=='posts') ) {
	get_header();
}

if('page' == get_option('show_on_front')) { 
	get_template_part('index'); 
}
elseif(is_home()) { 
	get_template_part('index');
}
elseif ( ! function_exists( 'wpkites_plus_activate' ) ) { 
	get_template_part('index');
}
elseif (function_exists( 'wpkites_plus_activate' ) ) {
	$wpkites_front_page = get_theme_mod('front_page_data','cta1,services,portfolio,cta2,about,team,news,fun,wooproduct,testimonial,client');
	do_action( 'wpkites_plus_before_slider_section_hook', false);
	do_action( 'wpkites_plus_slider_action' , false);		
	do_action( 'wpkites_plus_after_slider_section_hook', false);
    
    $wpkites_data =is_array($wpkites_front_page) ? $wpkites_front_page : explode(",",$wpkites_front_page);			
	if($wpkites_data) 
	{
		foreach($wpkites_data as $wpkites_key=>$wpkites_value)
		{	
            do_action( 'wpkites_plus_before_'.$wpkites_value.'_section_hook', false);
			
			do_action( 'wpkites_plus_'.$wpkites_value.'_action', false);
			
			do_action( 'wpkites_plus_after_'.$wpkites_value.'_section_hook', false);

		}
	}
}

if( !class_exists('ElementsKit_Lite') && (get_option('show_on_front')=='posts') ) {
	get_footer();
}