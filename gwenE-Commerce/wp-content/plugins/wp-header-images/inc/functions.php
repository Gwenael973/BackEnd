<?php defined( 'ABSPATH' ) or die( __('No script kiddies please!', 'wp-header-images') );
	
	include_once('functions-inner.php');

	function sanitize_wphi_data( $input ) {
		if(is_array($input)){		
			$new_input = array();	
			foreach ( $input as $key => $val ) {
				$new_input[ $key ] = (is_array($val)?sanitize_wphi_data($val):stripslashes(sanitize_text_field( $val )));
			}			
		}else{
			$new_input = stripslashes(sanitize_text_field($input));			
			if(stripos($new_input, '@') && is_email($new_input)){
				$new_input = sanitize_email($new_input);
			}
			if(stripos($new_input, 'http') || wp_http_validate_url($new_input)){
				$new_input = esc_url($new_input);
			}			
		}	
		return $new_input;
	}	


	if(!function_exists('pre')){
		function pre($data){
			if(isset($_GET['debug'])){
				pree($data);
			}
		}	 
	} 
		
	if(!function_exists('pree')){
	function pree($data){
				echo '<pre>';
				print_r($data);
				echo '</pre>';	
		
		}	 
	} 




	function wphi_menu()
	{

		global $wphi_data;

		 add_options_page($wphi_data['Name'], $wphi_data['Name'], 'activate_plugins', 'wp_hi', 'wp_hi');



	}

	function wp_hi(){ 



		if ( !current_user_can( 'administrator' ) )  {



			wp_die( __( 'You do not have sufficient permissions to access this page.','wp-header-images' ) );



		}



		global $wpdb, $wphi_dir, $wphi_pro, $wphi_data, $wphi_link, $wphi_template, $wphi_premium_link, $wphi_header_images, $wphi_set_str; 


		include($wphi_dir.'inc/wphi-settings.php');
		

	}	



	
	

	function wphi_plugin_links($links) { 
		global $wphi_premium_link, $wphi_pro;
		
		$settings_link = '<a href="options-general.php?page=wp_hi">'.__('Settings','wp-header-images').'</a>';
		
		if($wphi_pro){
			array_unshift($links, $settings_link); 
		}else{
			 
			$wphi_premium_link = '<a href="'.esc_url($wphi_premium_link).'" title="'.__('Go Premium','wp-header-images').'" target=_blank>'.__('Go Premium','wp-header-images').'</a>'; 
			array_unshift($links, $settings_link, $wphi_premium_link); 
		
		}
		
		
		return $links; 
	}
	
	function register_hi_scripts() {
		
		global $wphi_pro, $wphi_on_off_options;
		
		$video_extensions = 'mp4, m4a, m4v, f4v, f4a, m4b, m4r, f4b, mov, 3gp, 3gp2, 3g2, 3gpp, 3gpp2, ogg, oga, ogv, ogx, wmv, wma, asf, webm, flv, avi, hdv, mxf, mpeg, wav, lxf, gxf, vob';
		$video_extensions = str_replace(' ', '', $video_extensions);
		$video_extensions = explode(',', $video_extensions);
		
		
		
		$translation_array = array(	

			'this_url' => admin_url( 'options-general.php?page=wp_hi' ),
			'wphi_tab' => (isset($_GET['t'])?sanitize_wphi_data($_GET['t']):'0'),
			'wphi_pro' => $wphi_pro?'yes':'false',
			'wphi_tempalte_reset' => __('This tempalte will reset the settings and you can continue as default.', 'wp-header-images'),
			'wphi_html_styles' => __('You can implement your own HTML, Styles and Scripts with this option.', 'wp-header-images'),
			'wphi_premium_alert' => __('This is a premium feature. Please Go Premium.', 'wp-header-images'),
			'hi_fields_focus' => (isset($_POST['hi_fields_focus'])?sanitize_wphi_data($_POST['hi_fields_focus']):''),
			'video_extensions' => $video_extensions,
            'nonce' => wp_create_nonce('wphi_nonce_action'),
			'value_required' => __('Please fill all the required fields.', 'wp-header-images'),			
		);
			
		if (is_admin ()){
			
			global $pagenow;
			
			$allowed_pages = array(
				'wp_hi'
			);
		

			if(isset($_GET['page']) && in_array($_GET['page'], $allowed_pages)){
					
					
				wp_enqueue_media();
	
	
				wp_enqueue_script(
					'wphi-scripts',
					plugins_url('js/scripts.js', dirname(__FILE__)),
					array('jquery'),
					time()
				);	
				
				
			
				wp_enqueue_style( 'wphi-style',
					plugins_url('css/admin-styles.css', dirname(__FILE__)),
					array(),
					time()
				);
								
				wp_enqueue_style('wphi-fontawesome', plugins_url('css/fontawesome.min.css', dirname(__FILE__)));
				wp_enqueue_script('wphi-fontawesome', plugin_dir_url(dirname(__FILE__)) . 'js/fontawesome.min.js', array('jquery'));
				wp_enqueue_script('wphi-bootstrap', plugin_dir_url(dirname(__FILE__)) . 'js/bootstrap.min.js', array('jquery'));
				wp_enqueue_style('wphi-bootstrap', plugins_url('css/bootstrap.min.css', dirname(__FILE__)));
				
				wp_localize_script( 'wphi-scripts', 'wphi_obj', $translation_array );
			}
			
					
		
		}else{
					
			wp_enqueue_style('wphi-style', plugins_url('css/front-styles.css', dirname(__FILE__)), array(), time(), 'all');
			
			
			$disable_devices_on = (array_key_exists('disable_devices', $wphi_on_off_options) && $wphi_on_off_options['disable_devices']=='on');
			
			if($disable_devices_on){
				wp_enqueue_style('wphi-mobile-style', plugins_url('css/mobile-styles.css', dirname(__FILE__)), array(), time(), 'all');
			}
			
		}
		
		
		
	
	} 
		
	if(!function_exists('wp_header_images')){
	function wp_header_images(){

		
		}
	}
	
	
		
		
	function get_parent_hmenu_id($id, $arr){
		if($arr[$id]==0)
		return $id;
		else
		return get_parent_hmenu_id($arr[$id], $arr);
	}
	

	function get_header_images_inner(){
		//return;
		global $wphi_dir, $wphi_pro, $post, $wp, $wpdb;
		
		
		$args = array( 'taxonomy'=>'nav_menu', 'hide_empty' => true );
		$menus = wp_get_nav_menus();//get_terms($args);
		$wp_header_images = get_option( 'wp_header_images');
        $wphi_gluri_slider = get_option( 'wphi_gluri_slider', array());
		$wphi_header_videos = get_option('wphi_header_videos', array());
		$wphi_gluri_slider = is_array($wphi_gluri_slider)?$wphi_gluri_slider:array();

//		pree($post);
//		pree($wp_header_images);
//		pree($wphi_header_videos);exit;
//		pree($menus);exit;
		
		$page_id = 0;
		$arr = array();
		$arr_obj = array();
		$arr_urls = array();
		
		//pre(is_front_page());
		//pre(is_home());
		//pree(is_single());
		$possible_page_uri = basename(home_url( $wp->request ));
		
		if($possible_page_uri){
			$possible_page_obj = $wpdb->get_row("SELECT ID FROM ".$wpdb->prefix."posts WHERE post_name='".esc_sql($possible_page_uri)."'");

			if(is_object($possible_page_obj) && !empty($possible_page_obj) && isset($possible_page_obj->ID) && $possible_page_obj->ID>0){
				$page_id = $possible_page_obj->ID;
			}
		}
		
		if(!$page_id){
			if(is_front_page() || is_home()){
				$page_id = get_the_ID();
			}elseif(is_single()){
				$page_id = get_the_ID();
				if(function_exists('is_product') && is_product()){
					$page_id = get_the_ID();
				}else{
					
				}
			}elseif(function_exists('is_product_category') && is_product_category()){
				$cate = get_queried_object();
				$page_id = $cate->term_id;
				//pre($cate);pre($page_id);
			}
			elseif(is_archive()){
				$page_id = get_cat_id( single_cat_title("",false) ); 		
			}else{
				$page_id = get_the_ID();
			}
		}
		//pre(is_product_category());
		//pre($page_id);//exit;
		//pre(get_the_ID());
		//pre($post);
		
		
		foreach ( $menus as $menu ):
			$menu_items = wp_get_nav_menu_items($menu->name);
			if(!empty($menu_items)){
				foreach($menu_items as $items){
					$parent = $items->menu_item_parent;
					
					$arr[$items->ID] = $parent;
					//pre($arr_obj);
					$key = $items->object_id;
					$arr_obj[$key][$items->ID] = $items->ID;
					$arr_urls[$key][$items->ID] = $items->url;
					
				}
			}
		endforeach;
//		pree($arr);
//		pree($arr_urls);
//		pree($arr_obj);
//		pre(get_the_ID());
//		pre($page_id);
//		pre($cur_cat_id);
//		pre(is_single());
//		pre(is_page());
//		pre(is_archive());
//		pre(is_shop());
//		pre($_SERVER);
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if(array_key_exists('HTTPS', $_SERVER) && $_SERVER['HTTPS']=='on'){
			$actual_link = str_replace('http://', 'https://', $actual_link);			
		}
		$actual_link = str_replace('?debug', '', $actual_link);
//		pree($actual_link);
		$obj_ids = array();
		if($page_id!=0 && array_key_exists($page_id, $arr_urls)){
			//pre($arr_urls);
			if(count($arr_urls[$page_id])>0){
				//pre($actual_link);
				//pre($arr_urls[$page_id]);
				foreach($arr_urls[$page_id] as $pkey => $purl){
					$obj_id = ($actual_link==$purl?$pkey:0);
					if($obj_id){
						//pre($obj_id);
						$obj_ids[] = $obj_id;					
					}
				}
				//pre($obj_id);
				//$arr_obj[$page_id] = array($arr_obj[$page_id][$obj_id]);
			}else{
			}
		}

//		pree($obj_ids);exit;
			
		if($page_id==0 && is_array($arr_urls)){
			foreach($arr_urls as $expected_page_id => $arr_url){
				
				if($page_id==0 && empty($obj_ids)){
					//pre($actual_link);
					//pre($arr_url);
					
					$for_obj_id = array_search($actual_link, $arr_url);
					
					if(!$for_obj_id)
					$for_obj_id = array_search('/', $arr_url);
					//pre($obj_id);
					//pee($expected_page_id);
					if($for_obj_id>0){
						$obj_ids[] = $for_obj_id;
						//pre($arr_url);
						//pre($expected_page_id);
						$page_id = $expected_page_id;
					}
				}
				
				
			}
		}
		
		if($page_id==0){
			$page_id = current(array_keys($arr_obj));
		}

//		pree($page_id);
//		pree($obj_ids);exit;
		$img_id = 0;
		$slider_id = 0;
		$video_id = 0;

		foreach($obj_ids as $obj_id){
			$parent_id = $arr_obj[$page_id][$obj_id];	

			if($img_id==0)
				$img_id = ((is_array($wp_header_images) && array_key_exists($parent_id, $wp_header_images))?$wp_header_images[$parent_id]:$img_id);

            if($slider_id==0)
	            $slider_id = (is_array($wphi_gluri_slider) && array_key_exists($parent_id, $wphi_gluri_slider)?$wphi_gluri_slider[$parent_id]:$slider_id);

            if($video_id==0)
	            $video_id = (is_array($wphi_header_videos) && array_key_exists($parent_id, $wphi_header_videos)?$wphi_header_videos[$parent_id]:$video_id);



		}


//		pree($wphi_gluri_slider);
//        $img_id = current($wphi_gluri_slider);
//
//        pree($img_id);exit;
		//pree($page_id);
		//pree($parent_id);

		if($wphi_pro){
			$post_type = get_post_type($page_id);
			//pree($page_id);
			//pree($wp_header_images);pree($post_type);pree(array_key_exists($post_type, $wp_header_images));pree(array_key_exists($page_id, $wp_header_images[$post_type]));
			if($post_type && is_array($wp_header_images) && array_key_exists($post_type, $wp_header_images)){
				if(array_key_exists($page_id, $wp_header_images[$post_type])){

				    if($img_id == 0)
					    $img_id = $wp_header_images[$post_type][$page_id];

					if($slider_id == 0)
						$slider_id = (array_key_exists($post_type, $wphi_gluri_slider) && array_key_exists($page_id, $wphi_gluri_slider[$post_type])?$wphi_gluri_slider[$post_type][$page_id]:'');

					if($video_id == 0)
					    $video_id = (array_key_exists($post_type, $wphi_header_videos) && array_key_exists($page_id, $wphi_header_videos[$post_type])?$wphi_header_videos[$post_type][$page_id]:'');

				}else{

					if($img_id == 0)
						$img_id = current($wp_header_images);

					if($slider_id == 0)
						$slider_id = current($wphi_gluri_slider);

					if($video_id == 0)
						$video_id = current($wphi_header_videos);
				}
			}else{
				
			}
		}



//        pree($slider_id);
//exit;
        if((is_front_page() || is_home())) {
			//pree($wp_header_images);
			//pree($wphi_gluri_slider);

	        if($img_id == 0)
			    $img_id = isset($wp_header_images['default'])?$wp_header_images['default']:0;

	        if($slider_id == 0)
                $slider_id = isset($wphi_gluri_slider['default'])?$wphi_gluri_slider['default']:0;

	        if($video_id == 0)
	            $video_id = isset($wphi_header_videos['default'])?$wphi_header_videos['default']:0;

		}
		//return $ret;
		//pree($img_id);//exit;

//        pree($page_id);
		//pree($ret);
//        pree($slider_id);exit;

		//return $ret;
		
		
		$ret = wphi_get_image_to_display($img_id, $slider_id, $video_id, $page_id);
		//pree($ret);exit;


		if($wphi_pro && function_exists('wphi_pre_get_header_images_inner') && wphi_pre_get_header_images_inner()){
			//pree($wp_header_images);pree($wphi_gluri_slider);pree($wphi_header_videos);
			$ret = wphi_get_header_images_inner($wp_header_images, $wphi_gluri_slider, $wphi_header_videos);
		}
		$ret = array_filter($ret);
		//return $ret;
		//pre($ret);pre($page_id);
		

		if(empty($ret)){
			$page_id = ($page_id?$page_id:get_the_ID());
			//pre($page_id);
			if($page_id){
				$categories = get_the_category();
				$wp_header_category_images = (isset($wp_header_images['category'])?$wp_header_images['category']:array());
                $wphi_gluri_slider_images = (isset($wphi_gluri_slider['category'])?$wphi_gluri_slider['category']:array());
				$wp_header_category_videos = (isset($wphi_header_videos['category'])?$wphi_header_videos['category']:array());
//				pree($wp_header_images);exit;
				if(!empty($categories)){
					$possible_banners = array();
					foreach($categories as $category){
						$possible_banners[] = $category->term_id;
					}
				}
//				pree($categories);exit;
				//pree($wp_header_category_images);
				if(!empty($possible_banners)){
					foreach($possible_banners as $category_banner){

					    if($img_id>0){  }else{

                            if(array_key_exists($category_banner, $wp_header_category_images)){
                                $img_id = $wp_header_category_images[$category_banner];
                            }

                        }


						if($slider_id > 0){

                        }else{

                            if(array_key_exists($category_banner, $wphi_gluri_slider_images)){
                                $slider_id = $wphi_gluri_slider_images[$category_banner];
                            }

                        }

						if($video_id > 0){

						}else{

							if(array_key_exists($category_banner, $wp_header_category_videos)){
								$video_id = $wp_header_category_videos[$category_banner];
							}

						}
					}
				}
				
				//pree($img_id);exit;	
				$wphi_sidebar_settings = get_option('wphi_sidebar_settings', array());
				//pree($wphi_sidebar_settings);
				//pree(get_post_type());
				//return $img_id;
				if($img_id == 0 ) {
					if(
							(array_key_exists('default_home', $wphi_sidebar_settings) && !in_array(get_post_type(), array('post', 'page')))
						||	
							(array_key_exists('default_page', $wphi_sidebar_settings) && 'page' == get_post_type())
						||
							(array_key_exists('default_post', $wphi_sidebar_settings) && 'post' == get_post_type())
					){
						$img_id = isset($wp_header_images['default'])?$wp_header_images['default']:0;
					}
				}

				if($slider_id == 0 ) {
					$slider_id = isset($wphi_gluri_slider['default'])?$wphi_gluri_slider['default']:0;
				}

				if($video_id == 0 ) {
					$video_id = isset($wphi_header_videos['default'])?$wphi_header_videos['default']:0;
				}

				$ret = wphi_get_image_to_display($img_id, $slider_id, $video_id, $page_id);




			}
		}
		//pre($ret);


        return $ret;
	}
	function wphi_get_image_to_display($img_id, $slider_id, $video_id, $page_id){
		
		global $post;
		//pree($post->ID);
		$ret = array('title'=>'', 'url'=>'');
		if($img_id>0 || $slider_id > 0 || $video_id > 0){
			$img_url = wp_get_attachment_url( $img_id );			
			$video_url = wp_get_attachment_url( $video_id );
			//pre($img_url);
			if(is_object($post) && isset($post->post_type)){
			}else{
	            $post = get_post($page_id);
			}
			
			//pree($post->post_type);



			if($img_url!=''){
				//$post_meta = get_post_meta($img_id);
				$ret['url'] = $img_url;
				$ret['title'] = (is_object($post) && isset($post->post_title)?$post->post_title:'');
				$ret['page_id'] = $page_id;
				$ret['slider_id'] = $slider_id;

			}

			if($video_url!=''){

	            $ret['video_url'] = $video_url;
				$ret['title'] = (isset($post->post_title)?$post->post_title:'');
				$ret['page_id'] = $page_id;
				$ret['slider_id'] = $slider_id;
            }

			if($slider_id != 0){

				$ret['title'] = (isset($post->post_title)?$post->post_title:'');
				$ret['page_id'] = $page_id;
				$ret['slider_id'] = $slider_id;
            }
		}
		//pree($ret);exit;
		return $ret;
	}
	if(!function_exists('wphi_get_header_images')){
	
		function wphi_get_header_images($template_str='', $plain=false, $echo_sc = true){
			//pree('wphi_get_header_images');
			global $wphi_dir, $is_gluri_slider, $gluri_slider_results, $gulri_priority;
			$is_header_image = get_header_image();
			$img_data = get_header_images_inner();

//			pree($img_data);
			extract($img_data);
//			pree($plain);exit;
			
			$url = (array_key_exists('url', $img_data)?$url:$is_header_image);
			$video_url = (array_key_exists('video_url', $img_data)?$video_url:'');




			//pre($url);
			//pre($plain);
            $search = array();
            if($is_gluri_slider && array_key_exists('slider_id', $img_data)) {

                $slider_id = $img_data['slider_id'];

                $search = array_filter($gluri_slider_results, function ($slider) use ($slider_id) {

                    return $slider_id == $slider->option_id;

                });
            }

            if($is_gluri_slider && $video_url){

	            $video_basename = $video_url ? basename($video_url) : '';
	            $video_ext = explode('.', $video_basename);
	            $video_ext = end($video_ext);

	            $video_template_str = '<video class="wphi-video wphi_dom_element" autoplay="autoplay" loop="loop" muted>
                                        <source src="'.$video_url.'">
                                    </video>';
				// type="video/'.$video_ext.'">

	            if($plain || !$echo_sc){

		            return $video_template_str;

	            }else{

                    echo wphi_kses($video_template_str);
                    return;

	            }

            }

            if($is_gluri_slider && $gulri_priority && array_key_exists('slider_id', $img_data) && sizeof($search) == 1){

               $gluri_slider_shortcode = do_shortcode('[GSLIDER id="' . $img_data['slider_id'] . '"]');

				if($echo_sc == true){
					echo wphi_kses($gluri_slider_shortcode);
				}else{					
					return $gluri_slider_shortcode;				
				}				
			   

            }else{

                if($plain){
                    $template_str = ($url?'<img src="'.$url.'" alt="'.$title.'" />':'');
                    //pre($template_str);
                    return $template_str;
                }else{
                    $template_str = (trim($url)?'<div class="header_image wphi_dom_element"><img src="'.$url.'" alt="'.$title.'" /></div>':'');
                    //echo $template_str;
					if($echo_sc){					
						echo wphi_kses($template_str);
					}else{					
						return $template_str;					
					}					
                }

            }
			

		}
	
	}
	
	
		
		
	function get_storefront_header_styles() {
		
		global $wphi_dir;
		$is_header_image = get_header_image();
		$img_data = get_header_images_inner();
		
		extract($img_data);
		$url = ($url?$url:$is_header_image);
		
	
		if ( $url ) {
			$header_bg_image = 'url(' . esc_url( $url ) . ')';
		}

		$styles = array();
	
		if ( '' !== $header_bg_image ) {
			$styles['background-image'] = $header_bg_image;
		}

		$styles = apply_filters( 'get_storefront_header_styles', $styles );
		
		return $styles;
				

		
	}
	if(!function_exists('wphi_allowed_html')){
		function wphi_allowed_html() {
			return array(
				'style' => array(),
				'div' => array(),
				'h2' => array()
			);
		}
	}
	if(!function_exists('wphi_allowed_protocols')){ 
		function wphi_allowed_protocols() {
			return array(
				'data'  => array(),
				'http'  => array(),
				'https' => array(),
			);
		}
	}
	
	if(!function_exists('wphi_header_scripts')){
		function wphi_header_scripts(){
			$wphi_get_templates = wphi_get_templates();
			$wphi_get_template = isset($wphi_get_templates['selected'])?$wphi_get_templates['selected']:'';
			if(is_array($wphi_get_template)){		
					extract($wphi_get_template);
					echo wphi_kses($template_scripts);
			
			}
		}
		add_action('wp_head', 'wphi_header_scripts');
	}
	
	
	if(!function_exists('wphi_get_templates')){
	
		function wphi_get_templates(){
			global $wphi_link, $wphi_template;
			
			$wphi_template_custom = get_option('wphi_template_custom', array('template_str'=>'<div class="header_image"><h2 style="background-image: url(%url%);"><span>%title%</span></h2></div>', 'template_scripts'=>'	<style type="text/css">
						
			@media only screen and (max-device-width: 480px) {
				
				
			}			
		</style>
		<script type="text/javascript" language="javascript">
			jQuery(document).ready(function($){
			});
		</script>'));
			extract($wphi_template_custom);
			
			$wphi_templates = array(
				'reset' => array(
				
					'url' => $wphi_link.'img/banner-style-0.png',
					'title' => 'Default',
					'template_str' => '',
					'template_scripts' => ''
				
				),			
				'centered' => array(
				
					'url' => $wphi_link.'img/banner-style-c.jpg',
					'title' => 'Centered',
					'template_str' => '',
					'template_scripts' => ''
				
				),			
				'classic' => array(
				
					'url' => $wphi_link.'img/banner-style-l.jpg',
					'title' => 'Classic',
					'template_str' => '',
					'template_scripts' => ''
				
				),			
				'custom' => array(
				
					'url' => $wphi_link.'img/banner-style-3.png',
					'title' => 'Custom',
					'template_str' => stripslashes($template_str),
					'template_scripts' => stripslashes($template_scripts)
				
				)			
			);
			
			$wphi_templates['selected'] = (array_key_exists($wphi_template, $wphi_templates)?$wphi_templates[$wphi_template]:array('template_scripts'=>''));
			$wphi_templates['selected']['template_scripts'] .= '<style type="text/css">'.get_option( 'wphi_styling' ).'</style>';
			return $wphi_templates;
		}
		
	}
	if(!function_exists('wphi_get_header_image_tag')){
		function wphi_get_header_image_tag($default = array()){
			//pree($default);
			$defined = wphi_get_header_images('', true, false);
			//pree($default);
			$defined = ($defined!=''?$defined:$default);
			echo wphi_kses($defined);
			
			//echo $attr;
		}
	}
	if(!function_exists('wphi_init')){
		function wphi_init(){
			//echo ':)';
			add_filter('get_header_image_tag', 'wphi_get_header_image_tag', 20);
			add_action('storefront_header_styles', 'get_storefront_header_styles', 10, 1);	
		}
		
	}
	add_action('init', 'wphi_init');
	
	if(!function_exists('wphi_posts_headers')){
		function wphi_posts_headers(){
			global $wphi_premium_link;
			$post_types = get_post_types();
?>
<ul class="menu-class wphi_cmm"><li><?php _e('Do you want to set header images for more post types like','wp-header-images'); ?> <a><?php echo implode('</a>, <a>', $post_types) ?></a>? <br />
<a class="wphi_premium" href="<?php echo esc_url($wphi_premium_link); ?>" target="_blank"><?php _e('Go Premium','wp-header-images'); ?></a></li></ul>
<?php			
		}
	}
	
	


	include_once 'gluri-slider-support.php';


	add_action('init', 'wphi_save_dom_settings');

	if(!function_exists('wphi_save_dom_settings')){
	    function wphi_save_dom_settings(){

	        if(isset($_POST['wphi_dom_submit'])){


	            if(!isset($_POST['wphi_dom_field']) || !wp_verify_nonce($_POST['wphi_dom_field'], 'wphi_dom_action')){

	                wp_die(__('Sorry, Your nonce did not verify.', 'wp-header-images'));

	            }else{


                    if(isset($_POST['wphi_dom'])){

                        $wphi_dom = sanitize_wphi_data($_POST['wphi_dom']);
                        update_option('wphi_dom', $wphi_dom);
						update_option('wphi_template', '');

                    }

                }

            }

        }
    }

	add_action('wp_footer', function(){

        $wphi_dom = get_option('wphi_dom', array());
        $dom_selector = (array_key_exists('selector', $wphi_dom) && $wphi_dom['selector']) ? $wphi_dom['selector'] : '';
		$dom_delay = (array_key_exists('delay', $wphi_dom) && $wphi_dom['delay']) ? $wphi_dom['delay'] : '100';
        $dom_type = (array_key_exists('type', $wphi_dom) && $wphi_dom['type']) ? $wphi_dom['type'] : 'img';
        $placement_type = (array_key_exists('placement_type', $wphi_dom) && $wphi_dom['placement_type']) ? $wphi_dom['placement_type'] : 'replace';
        $bg_image = false;
		//pree($wphi_dom);exit;
        if(empty($wphi_dom) || !array_key_exists('switch', $wphi_dom) || !$dom_selector){

            return;
        }




            switch ($dom_type){

                case 'img':

                    do_action('apply_header_images');

				break;

                case 'bg':

                    ob_start();

                    do_action('apply_header_images', '%url%');

                    $bg_image = ob_get_clean();
                    $bg_image = filter_var($bg_image, FILTER_VALIDATE_URL);
				break;

            }
        ?>



        <style type="text/css">

            <?php if($dom_type == 'bg' && $bg_image): ?>

            <?php echo esc_html($dom_selector); ?>{
                background-image: url(<?php echo esc_url($bg_image) ?>);
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center center;				
            }

            <?php endif; ?>

            .wphi_dom_element,
            .gsp_dom_element{

                display :none;
            }

        </style>

        <?php

            if($dom_type == 'bg'){

                return;
            }

        ?>

        <script type="text/javascript" language="javascript">


					var wphi_selector;
					var wphi_render_content = '';

                    jQuery(document).ready(function($){

                        wphi_selector = $('<?php echo esc_attr($dom_selector); ?>');
                        var header_image_default = $('.header_image.wphi_dom_element');
                        var gsp_slider_default = $('.gsp_slider.gsp_dom_element');
                        var header_video_default = $('.wphi-video.wphi_dom_element');
                        
                        var location = `<?php echo esc_html($placement_type); ?>`;


                        if(header_image_default.length > 0){

                            wphi_render_content = header_image_default.clone();
                            wphi_render_content.removeClass('wphi_dom_element');

                        }else if(gsp_slider_default.length > 0){

                            wphi_render_content = gsp_slider_default.clone();
                            gsp_slider_default.remove();
                            wphi_render_content.removeClass('gsp_dom_element');

                        }else if(header_video_default.length > 0){

                            wphi_render_content = header_video_default;
                            wphi_render_content.removeClass('wphi_dom_element');


                        }
						
						//console.log(wphi_selector.find('.header_image').length);

                        if(wphi_selector.length > 0 && wphi_selector.find('.header_image').length==0){
							
							if(wphi_render_content.length>1){
								wphi_render_content = wphi_render_content.eq(0);
							}


                            switch(location){

                                case 'replace':
									
									setTimeout(function(){ wphi_selector.html(wphi_render_content); }, <?php echo esc_html($dom_delay); ?>);

                                break;

                                case 'before':

                                    setTimeout(function(){ wphi_selector.prepend(wphi_render_content); }, <?php echo esc_html($dom_delay); ?>);

                                break;

                                case 'after':

                                    setTimeout(function(){ wphi_selector.append(wphi_render_content); }, <?php echo esc_html($dom_delay); ?>);

                                break;

                            }



                        }


                    });



        </script>

        <?php


    });
	


	add_action('wp_ajax_wphi_update_sidebar_settings', 'wphi_update_sidebar_settings');

	if(!function_exists('wphi_update_sidebar_settings')){


	    function wphi_update_sidebar_settings(){

	        $result = array(
	                'status' => false,
            );


	        if(!empty($_POST) && isset($_POST['wphi_sidebar_settings'])){


	            if(!isset($_POST['wphi_nonce']) || !wp_verify_nonce($_POST['wphi_nonce'], 'wphi_nonce_action')){

	                wp_die(__('Sorry, your nonce did not verify.', 'wp-header-images'));
                }else{

	                //your code here

                    $wphi_sidebar_settings = sanitize_wphi_data($_POST['wphi_sidebar_settings']);
                    $result['status'] = update_option('wphi_sidebar_settings', $wphi_sidebar_settings);


                }

            }

	        wp_send_json($result);

        }
    }

	add_action('wp_footer', function(){

        $wphi_sidebar_settings = get_option('wphi_sidebar_settings', array());
        $width_type = array_key_exists('width_type', $wphi_sidebar_settings) ? $wphi_sidebar_settings['width_type'] : 'px';
        $height_type = array_key_exists('height_type', $wphi_sidebar_settings) ? $wphi_sidebar_settings['height_type'] : 'px';
        $width = (array_key_exists('width', $wphi_sidebar_settings) && $wphi_sidebar_settings['width']) ? $wphi_sidebar_settings['width'] : '';
        $height = (array_key_exists('height', $wphi_sidebar_settings) && $wphi_sidebar_settings['height']) ? $wphi_sidebar_settings['height'] : '';

//        pree($height);

        ?>

            <style>

                .wphi-video,
                .header_image img
                {
                    <?php if($width): ?>
                    width: <?php echo esc_attr($width.$width_type); ?> !important;
                    <?php endif; ?>
                    <?php if($height): ?>
                    height: <?php echo esc_attr($height.$height_type); ?> !important;
                    <?php endif; ?>
                    margin: 0 auto !important;
                }

            </style>


            <?php


    }, 99);	
	
	if(!function_exists('wphi_kses')){
		function wphi_kses($html_str){
			//$html_str = wp_kses($html_str, wphi_allowed_html(), wphi_allowed_protocols());
			return $html_str;
		}
	}