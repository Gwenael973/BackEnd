<?php

global  $is_gluri_slider, $wphi_set_gluri_str, $gsp_option_name;



$wphi_set_gluri_str = __('Image Slider', 'wp-header-images');

add_action('gluri_slider_banner', 'gluri_slider_banner_callback');
add_action('wphi_before_menu_list', 'wphi_before_menu_list_gluri_callback', 1, 1);
add_action('init', 'wphi_gluri_slider_init');
add_action('wphi_inside_banner_wrapper', 'wphi_inside_banner_wrapper_callback');



if(!function_exists('wphi_gluri_slider_init')){
    function wphi_gluri_slider_init(){

        global  $is_gluri_slider;
        if ( isset( $_POST['hi_fields_submitted'] ) && $_POST['hi_fields_submitted'] == 'submitted' ) {


            if (
                ! isset( $_POST['wphi_nonce_action_field'] )
                || ! wp_verify_nonce( $_POST['wphi_nonce_action_field'], 'wphi_nonce_action' )
            ) {

                _e('Sorry, your nonce did not verify.', 'wp-header-images');
                exit;

            } else {

                // process form data
                //pree($_POST['header_images']);exit;
                if(isset($_POST['wphi_gluri_slider']) && $is_gluri_slider){
                    update_option( 'wphi_gluri_slider', sanitize_wphi_data($_POST['wphi_gluri_slider']));
                }
				
                if(isset($_POST['header_videos']) && $is_gluri_slider){
                    update_option( 'wphi_header_videos', sanitize_wphi_data($_POST['header_videos']));
                }
				
				//pree($_POST['header_videos']);exit;
								
            }

        }
    }
}

if(!function_exists('wphi_before_menu_list_gluri_callback')){
    function wphi_before_menu_list_gluri_callback(){
        ?>

            <script language="javascript" type="text/javascript">
                jQuery(document).ready(function ($) {

                    $('body').on('click', '.banner_wrapper.gluri_banner_wrapper', function(event){
						
						$('.wphi_submit_btn').hide();

                        $(this).find('.wphi_gluri_slider_selection').show();
                        $(this).find('.wphi_gluri_slider_selection').css('top','-15px');
						
						
						 $(this).parent().find('.wphi_submit_btn').show();
                    });


                    $('body').on('click', '.wphi .wphi_clear_btn', function(){

                        var parent_li = $(this).parents('li');
						$('.wphi_submit_btn').hide();

                        parent_li.find('.wphi_header_image_placeholder').prop('src', '').hide();
                        parent_li.find('.wphi_gluri_slider_selection select').val(0);
						parent_li.find('.wphi_submit_btn').show();

                    });

                });


            </script>

            <style type="text/css">
                .wphi .wphi-settings > ul.menu-class > li > div.banner_wrapper:not(.gluri_banner_wrapper){
                    width: 33.33%;
                    min-height: 0;
                    border-top: 160px solid #dddddd;
                    /*border-right: 120px solid transparent;*/
                    margin-bottom: 10px;
                    top: 30px;
                    left: 0;
					position:absolute;
                }

                .wphi .wphi-settings > ul.menu-class > li > div.banner_wrapper.gluri_banner_wrapper,
				.wphi .wphi-settings > ul.menu-class > li > div.banner_wrapper.gluri_video_wrapper{
                    width: 33.33%;
                    min-height: 0;
                    border-bottom: 160px solid #dddddd;
                   /* border-left: 120px solid transparent;
					border-right: 120px solid transparent;*/
                    margin-bottom: 10px;
                    top:30px;
                    left:33.5%;
					position:absolute;
                }
				.wphi .wphi-settings > ul.menu-class > li > div.banner_wrapper.gluri_video_wrapper {
					width: 33.33%;
					left: 67%;
					border:0;
					/*border-left: 120px solid transparent;*/
					border-top: 160px solid #dddddd;
				}

                .wphi .wphi-settings > ul.menu-class > li > div.banner_wrapper{
                    border: none;
                }
/*
                .wphi-settings ul:not(.wphi_cmm) li a.wphi_submit_btn,
				.wphi-settings ul:not(.wphi_cmm) li a.wphi_clear_btn{
                    position: relative;
                    top: -160px;
                }
*/
                .wphi-settings ul:not(.wphi_cmm) li{
                    width: 100%;
                    height: 230px;
					position: relative;
                }

                .wphi .wphi-settings > ul.menu-class > li > div.banner_wrapper:not(.gluri_banner_wrapper) label{
                    z-index: 5;
                    position: absolute;
                    top: -140px;
                    right: 20px;
                    width: auto;
                }
				.wphi .wphi-settings > ul.menu-class > li > div.banner_wrapper.gluri_video_wrapper label {
					padding-right:40px;
					top: -156px;
				}			
				.wphi .wphi-settings > ul.menu-class > li > div.banner_wrapper.gluri_video_wrapper > span {
					position: relative;
					top: -60px;
				}

                .wphi .wphi-settings > ul.menu-class > li > div.banner_wrapper.gluri_video_wrapper > span.wphi_no_slider {
                    top: -159px;
                    right: 0;
                    display: none;
                }

                .wphi .wphi-settings > ul.menu-class > li > div.banner_wrapper span.dashicons{
                    top: -150px;
                }

                .wphi_gluri_slider_selection,
                .wphi_gluri_label{
                    z-index: 5;
                    position: absolute;
                    top:30px;
                    right: 0;
                    width: 100%;
                }

                .wphi_gluri_slider_selection{
                    display: none;
                    width: 100%;
                    z-index: 6;
                    top:-15px;
                }
				
				.wphi_gluri_slider_selection select {
					width: 180px;
					margin: 6% auto;
					border: 0;
					border-bottom-left-radius: 20px;
					border-bottom-right-radius: 20px;
					background-color: rgba(255,255,255,0.3);
				}

                .wphi_no_slider {
                    color: #006799;
                    display: block;
                    font-size: 12px;
                    margin: 6% auto;
                }


                .wphi_header_image_placeholder{
                    width: 160px;
                    height: 135px;
                    position: absolute;
                    top: -151px;
                    left: 8px;
                    border: 1px solid #dee2e6;
                    background-color: #ffffff;
                    padding: 3px;
                    border-radius: 5px;
                    z-index: 5;
                }

                .dashicons.dashicons-yes{
                    display: none;
                }

            </style>

        <?php
    }
}

if(!function_exists('gluri_slider_banner_callback')){
    function gluri_slider_banner_callback($id){
		

        global $wphi_set_gluri_str, $wpdb, $gsp_option_name, $gluri_slider_results, $is_gluri_slider;
		
        $wphi_gluri_slider = get_option('wphi_gluri_slider', array());
		$wphi_header_videos = get_option('wphi_header_videos', array());
		
        $slider_results = $gluri_slider_results;
//        pree($slider_results);
        $id = explode('|', $id);
//        pree($id);
//        pree($wphi_gluri_slider);

        $name = '';
		$name_video = '';
		
        $selected_match = false;
		
        $selected_value = '';
		$selected_video = '';
		
        if(sizeof($id) === 1){

            $name = 'wphi_gluri_slider['.current($id).']';
			$name_video = 'header_videos['.current($id).']';
			
            if(array_key_exists(current($id), $wphi_gluri_slider)){
                $selected_value = $wphi_gluri_slider[current($id)];
            }
			
            if(array_key_exists(current($id), $wphi_header_videos)){
                $selected_video = $wphi_header_videos[current($id)];
            }

        }else{

            $current = current($id);
            $end = end($id);

            $name = 'wphi_gluri_slider['.$current.']['.$end.']';
			$name_video = 'header_videos['.$current.']['.$end.']';

            if(array_key_exists($current, $wphi_gluri_slider)){

               $selected_value = $wphi_gluri_slider[$current];
               $selected_value = $selected_value[$end];
            }

			
			if(array_key_exists($current, $wphi_header_videos)){

               $selected_video = $wphi_header_videos[$current];
               $selected_video = $selected_video[$end];
            }

        }

        $search = array_filter($slider_results, function($slider) use ($selected_value){

            return $selected_value == $slider->option_id;

        });
		
		//pree($selected_video);
		

        $selection = 'none';
        $label = '';
        if(sizeof($search) == 1) {

            $selected_match = true;
            $selection = 'block';
            $label = '';
        }
		
	    $video_url = wp_get_attachment_url( $selected_video );

	    if(array_key_exists(current($id), $wphi_header_videos)){
			$video_id = $wphi_header_videos[current($id)];			
		}

        ?>

        <div title="<?php echo esc_attr($wphi_set_gluri_str); ?>" class="banner_wrapper gluri_banner_wrapper" >
        
        <?php //pree($id); ?>
            <div class="wphi_gluri_slider_selection" style="display: <?php echo esc_attr($selection); ?>">

                <?php if($is_gluri_slider): ?>

                <?php if(!empty($slider_results)): ?>
                <select name="<?php echo esc_attr($name); ?>" id="">
                    <option value="0"><?php _e('Select Slider', 'wp-header-images') ?></option>

<?php 
						foreach($slider_results as $slider_obj){
						
							$selected = $selected_match && $selected_value == $slider_obj->option_id ? 'selected' : '';
						
							$shortcode = "[GSLIDER id=\"$slider_obj->option_id\"]";
						
							echo "<option value='".esc_attr($slider_obj->option_id)."' $selected>".esc_html($shortcode)."</option>";
						
						} 
?>

                </select>

                <?php

//                echo do_shortcode('[GSLIDER id="' . $selected_value. '"]');

                else: ?>

                    <span class="wphi_no_slider"><?php _e('No slider defined,', 'wp-header-images') ?> <a href="<?php echo esc_url(admin_url('/admin.php?page=gsp_slider')); ?>" target="_blank"><?php _e('click here', 'wp-header-images') ?></a> <?php _e('to define a new slider.', 'wp-header-images') ?> - <a href="https://www.youtube.com/embed/1kD3pKCupUc" target="_blank"><?php _e('Video Tutorial', 'wp-header-images'); ?></a></span>


                <?php endif;

                else:

                ?>

                    <span class="wphi_no_slider"><?php _e('Gluri Slider is not installed or activated,', 'wp-header-images') ?> <a href="<?php echo esc_url(admin_url('/plugin-install.php?s=Gulri+Slider&tab=search&type=term')); ?>" target="_blank"><?php _e('click here', 'wp-header-images') ?></a> <?php _e('to Install/Activate Slider Plugin.', 'wp-header-images') ?></span>


<?php

                endif;
				
				

?>
            </div>

            <div class="wphi_gluri_label" <?php echo $label?'style="'.esc_attr($label).'"':''; ?>>
                <label><?php echo esc_html($wphi_set_gluri_str); ?></label>
            </div>
        </div>
        <div data-url="<?php echo esc_url($video_url); ?>" title="<?php _e('Header Video', 'wp-header-images') ?>" class="banner_wrapper gluri_video_wrapper">

            <?php if($is_gluri_slider): ?>
            <span><?php echo esc_url($video_url?basename($video_url):''); ?></span>
            <?php
                else:
            ?>
                    <span class="wphi_no_slider"><?php _e('Gluri Slider is not installed or activated,', 'wp-header-images') ?> <a href="<?php echo esc_url(admin_url('/plugin-install.php?s=Gulri+Slider&tab=search&type=term')); ?>" target="_blank"><?php _e('click here', 'wp-header-images') ?></a> <?php _e('to Install/Activate Slider Plugin.', 'wp-header-images') ?></span>
                <?php endif; ?>


            <div class="wphi_gluri_label" <?php echo esc_attr($label?'style="'.$label.'"':''); ?>>
                <label><?php _e('Header Video', 'wp-header-images') ?></label>
                <input type="number" value="<?php echo esc_attr($selected_video); ?>" class="hide hi_vals" name="<?php echo esc_attr($name_video); ?>" />
            </div>


        </div>

        <?php
    }
}

if(!function_exists('wphi_inside_banner_wrapper_callback')){
    function wphi_inside_banner_wrapper_callback($img_url){

            $display = strlen($img_url) ? 'block' : 'none';
        ?>

            <img class="wphi_header_image_placeholder" src="<?php echo esc_url($img_url); ?>" alt="" style="display: <?php echo esc_attr($display); ?>" />

        <?php


    }
}