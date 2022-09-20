<?php
add_action('wphi_before_menu_list', 'wphi_before_menu_list_callback', 10, 1);

function wphi_before_menu_list_callback($wphi_header_images)
{
	global $wphi_set_str;
	
	
	
	$img_url = '';	
	$img_id = '';
	if(array_key_exists('default', $wphi_header_images)){
		$img_id = $wphi_header_images['default'];
		$img_url = wp_get_attachment_url( $img_id );
	}
	
	
?>
    <h3 data-id="wphi-default"><span class="dashicons dashicons-format-aside"></span><?php _e('Menu', 'wp-header-images'); ?> - <?php _e('Default / Home', 'wp-header-images'); ?></h3>

    <ul class="menu-class wphi_banners pages_wphi-default hide">

		<li data-uid="wphi-default" data-type="default">
		<?php //pree($items); ?>
		<h4><a><?php _e('Default Header Image', 'wp-header-images'); ?></a></h4>
<!--            <span class="dashicons dashicons-yes hide"></span>-->

        <div title="<?php echo esc_attr($wphi_set_str); ?>" class="banner_wrapper" style="background:url('<?php echo esc_url($img_url); ?>'); background-repeat:no-repeat;"><?php do_action('wphi_inside_banner_wrapper', $img_url) ?><input type="number" value="<?php echo ($img_id>0?esc_attr($img_id):0); ?>" class="hide hi_vals" name="header_images[default]" /><?php if($img_id==0 || true): ?><label><?php echo esc_html($wphi_set_str); ?></label><?php endif; ?></div>
        <?php do_action('gluri_slider_banner', 'default'); ?>
        <a class="wphi_submit_btn" title="<?php _e('Click here to submit changes','wp-header-images'); ?>"><?php _e('Save Changes','wp-header-images'); ?></a>
        <a class="wphi_clear_btn" title="<?php _e('Click here to remove this header image','wp-header-images'); ?>"><?php _e('Clear','wp-header-images'); ?></a>
    </li>
		
    </ul>


<?php
}

