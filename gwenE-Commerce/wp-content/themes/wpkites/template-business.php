<?php 
/**
 * Template Name: Business Template
 */
get_header();

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// For Free Version
if ( ! function_exists( 'wpkites_plus_activate' ) ):

	if ( function_exists( 'spiceb_activate' ) ):

		do_action( 'spiceb_wpkites_slider_action' , false);
		do_action( 'spiceb_wpkites_services_action', false);
		do_action( 'spiceb_wpkites_team_action' ,false);		
		do_action( 'spiceb_wpkites_news_action' ,false);
		do_action( 'spiceb_wpkites_testimonial_action' ,false);
	else:
	?>
	<p class="wpkites alert alert-warning text-center" role="alert">
	<?php echo esc_html__('This template shows the homepage sections, and to show these sections you have to activate the companion plugin.','wpkites' );?>
	</p>
	<?php
	endif;

endif;

// For Pro Version
if ( function_exists( 'wpkites_plus_activate' ) ):
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

endif;
get_footer();