<?php defined( 'ABSPATH' ) or die( __('No script kiddies please!', 'wp-header-images') );
	if ( !current_user_can( 'administrator' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'wp-header-images' ) );
	}
// Save the field values
	global $wphi_on_off_options;

    if ( isset( $_POST['wphi_post_type_selection_submit'] )) {


        if (
            ! isset( $_POST['wphi_post_type_field'] )
            || ! wp_verify_nonce( $_POST['wphi_post_type_field'], 'wphi_post_type_action' )
        ) {

            _e('Sorry, your nonce did not verify.', 'wp-header-images');
            exit;

        } else {


            // process form data
//            pree($_POST);
            $wphi_post_type_selection = isset($_POST['wphi_post_type_selection']) ? sanitize_wphi_data($_POST['wphi_post_type_selection']) : array();
            update_option( 'wphi_post_type_selection', $wphi_post_type_selection);

            $wphi_on_off_options = isset($_POST['wphi_on_off_options']) ? sanitize_wphi_data($_POST['wphi_on_off_options']) : array();			
			
			//pree($wphi_on_off_options_updated);
			//pree($wphi_on_off_options);
			//$wphi_on_off_options = array_merge($wphi_on_off_options_updated, $wphi_on_off_options);
			//pree($wphi_on_off_options);
			
	        update_option( 'wphi_on_off_options', $wphi_on_off_options);			
			
			
        }
    }



	if ( isset( $_POST['wphi_styling'] )) {
		
		
			if ( 
				! isset( $_POST['wphi_styling_action_field'] ) 
				|| ! wp_verify_nonce( $_POST['wphi_styling_action_field'], 'wphi_styling_action' ) 
			) {
			
			   _e('Sorry, your nonce did not verify.');
			   exit;
			
			} else {
			
			   // process form data
			   update_option( 'wphi_styling', sanitize_wphi_data($_POST['wphi_styling']));
			}					
	}
	if ( isset( $_POST['hi_fields_submitted'] ) && $_POST['hi_fields_submitted'] == 'submitted' ) {
		/*foreach ( $_POST as $key => $value ) {		
			if ( get_option( $key ) != $value ) {
				update_option( $key, $value );
			} else {
				add_option( $key, $value, '', 'no' );
			}}*/
			
			if ( 
				! isset( $_POST['wphi_nonce_action_field'] ) 
				|| ! wp_verify_nonce( $_POST['wphi_nonce_action_field'], 'wphi_nonce_action' ) 
			) {
			
			   _e('Sorry, your nonce did not verify.');
			   exit;
			
			} else {
			
			   // process form data
			   //pree($_POST['header_images']);exit;
			   update_option( 'wp_header_images', sanitize_wphi_data($_POST['header_images']));
			}			
			
			
		
		
		
	}
	$wphi_header_images = get_option( 'wp_header_images', array());
	//pree($wphi_header_images);
	
	$wphi_theme = wp_get_theme();
	$current_theme = $wphi_theme->get('TextDomain');
	
	
	//pree($wphi_get_templates);
	//pree($wphi_on_off_options);

?>	
<div class="wrap wphi">
	
<?php if(!$wphi_pro): ?>
<a title="<?php _e('Click here to download pro version','wp-header-images'); ?>" class="pro" href="https://shop.androidbubbles.com/download/" target="_blank"><?php _e('Already a Pro Member?','wp-header-images'); ?></a>
<?php endif; ?>
    
  <div class="head_area">
	<h2><span class="dashicons dashicons-welcome-widgets-menus"></span><?php echo esc_html($wphi_data['Name'].' '.'('.$wphi_data['Version'].($wphi_pro?') '.__('Pro','wp-header-images').'':')')); ?> - <?php _e('Settings','wp-header-images'); ?></h2>
    
    
    <h2 class="nav-tab-wrapper">
    <a class="nav-tab nav-tab-active"><?php _e("Header Images","wp-header-images"); ?> <i class="fas fa-photo-video"></i></a>
    <a class="nav-tab" data-tab="help" data-type="free"><i class="far fa-question-circle"></i>&nbsp;<?php _e("Help", 'wp-header-images'); ?></a>
    <a class="nav-tab"><?php _e("Styling","wp-header-images"); ?> <i class="fas fa-paint-brush"></i></a>
    <a class="nav-tab"><?php _e("Developers","wp-header-images"); ?> <i class="fas fa-code"></i></a>
    <a class="nav-tab"><?php _e("How it works?","wp-header-images"); ?> <i class="fas fa-cogs"></i></a>
    <a class="nav-tab"><?php _e("On/Off","wp-header-images"); ?> <i class="fas fa-eye-slash"></i></a>
    
    </h2>
    
 
    
    
    
    </div>
    
    
<form id="wphi-headers-section" class="nav-tab-content" action="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>" method="post">
<input type="hidden" name="wphi_tab" value="<?php echo isset($_GET['t'])?esc_attr($_GET['t']):'0'; ?>" />
<?php wp_nonce_field( 'wphi_nonce_action', 'wphi_nonce_action_field' ); ?>
<input type="hidden" name="hi_fields_submitted" value="submitted" />
<input type="hidden" name="hi_fields_focus" value="" />
    <div id="main">

        <button class="button button-secondary wphi_open_btn wphi-settings-button " onclick="wphi_open_nav()"><span class="dashicons dashicons-menu-alt2"></span> <?php _e('Settings', 'wp-header-images'); ?></button>

    </div>


    <div id="wphi_sidebar_wrapper" class="wphi_sidebar">


        <?php

                $wphi_sidebar_settings = get_option('wphi_sidebar_settings', array());
                $width_type = array_key_exists('width_type', $wphi_sidebar_settings) ? $wphi_sidebar_settings['width_type'] : 'px';
                $height_type = array_key_exists('height_type', $wphi_sidebar_settings) ? $wphi_sidebar_settings['height_type'] : 'px';




        ?>



        <a href="javascript:void(0)" class="wphi_close_btn" onclick="wphi_close_nav()"><i class="fas fa-times-circle"></i></a>

        <div class="input_wrapper">

            <div class="wphi_form_group">
                <label for=""><?php _e('Default Image', 'wp-header-images'); ?> (<?php _e('ON/OFF', 'wp-header-images'); ?>):</label>

                
                <label for="default_home"><input class="wphi_input" id="default_home" type="checkbox" value="home" name="default_home" checked="checked" onclick="return false;" /> <?php _e('Home', 'wp-header-images'); ?></label>
                <label for="default_page"><input class="wphi_input" id="default_page" type="checkbox" value="page" name="default_page" <?php checked(array_key_exists('default_page', $wphi_sidebar_settings)); ?> /> <?php _e('Page', 'wp-header-images'); ?></label>
                <label for="default_post"><input class="wphi_input" id="default_post" type="checkbox" value="post" name="default_post" <?php checked(array_key_exists('default_post', $wphi_sidebar_settings)); ?> /> <?php _e('Post', 'wp-header-images'); ?></label>

            </div>


<hr />
            <div class="wphi_form_group">
                <h4><?php _e('Image Styles', 'wp-header-images'); ?> (<?php _e('Optional', 'wp-header-images'); ?>)</h4>
            </div>
            <div class="wphi_form_group">
                <label for=""><?php _e('Width', 'wp-header-images'); ?>: </label>
                <input type="range" min="1" max="100" value="<?php echo array_key_exists('width', $wphi_sidebar_settings) ? esc_attr($wphi_sidebar_settings['width']) : ''?>" class="wphi_range <?php echo esc_attr($width_type == 'px' ?  'hide' : ''); ?>" />
                <input type="number" max="<?php echo esc_attr($width_type == 'px' ?  '' : '100'); ?>" value="<?php echo array_key_exists('width', $wphi_sidebar_settings) ? esc_attr($wphi_sidebar_settings['width']) : ''?>" name="width" class="wphi_input" />
                <a class="button button-secondary suffix" data-value="<?php echo esc_attr($width_type); ?>"><?php echo esc_html($width_type); ?></a>
            </div>


            <div class="wphi_form_group">
                <label for=""><?php _e('Height', 'wp-header-images'); ?>: </label>
                <input type="range" min="1" max="100" value="<?php echo array_key_exists('height', $wphi_sidebar_settings) ? esc_attr($wphi_sidebar_settings['height']) : ''?>" class="wphi_range <?php echo esc_attr($height_type == 'px' ?  'hide' : ''); ?>" />
                <input type="number" max="<?php echo esc_attr($height_type == 'px' ?  '' : '100'); ?>" value="<?php echo array_key_exists('height', $wphi_sidebar_settings) ? esc_attr($wphi_sidebar_settings['height']) : ''?>" name="height" class="wphi_input" />
                <a class="button button-secondary suffix" data-value="<?php echo esc_attr($height_type); ?>"><?php echo esc_html($height_type); ?></a>

            </div>


            <div class="wphi_form_group">
                <button class="button button-secondary wphi_sidebar_update"><?php _e('Save Changes','wp-header-images'); ?></button>
                <span class="wphi_spinner"></span>
                <span class="dashicons dashicons-yes wphi_done"></span>
            </div>



        </div>

    </div>
<div class="wphi-settings">



<?php
	$args = array( 'taxonomy'=>'nav_menu', 'hide_empty' => true );
	$menus = wp_get_nav_menus();//get_terms($args);
	$m = 0;
	do_action('wphi_before_menu_list', $wphi_header_images);
	if(!empty($menus)){
?>
<p class="submit" style="display:none"><input type="submit" name="Submit" class="button-primary" value="<?php _e( 'Save Changes','wp-header-images'); ?>" /></p>
<?php		
	
	foreach ( $menus as $menu ):
	$menu_items = wp_get_nav_menu_items($menu->name);
	//pree($menu);
?>
 
   <h3 data-id="<?php echo esc_attr($menu->term_id); ?>"><span class="dashicons dashicons-format-aside"></span><?php _e('Menu', 'wp-header-images'); ?> - <?php echo esc_html($menu->name); ?> (<?php echo count($menu_items); ?>)</h3>
<ul class="menu-class wphi_banners pages_<?php echo esc_attr($menu->term_id); ?> <?php echo ($m==0?'hide':'hide'); $m++; ?>"> 
<?php 
	
	if(!empty($menu_items)){
		
		foreach($menu_items as $items){	
		
		
		
		$img_id = (array_key_exists($items->ID, $wphi_header_images)?$wphi_header_images[$items->ID]:0);
		$img_url = ($img_id?wp_get_attachment_url( $img_id ):'');	
		
			
?>
	<li data-uid="<?php echo $uid = esc_attr($menu->term_id.'-'.$items->ID); ?>" data-type="<?php echo esc_attr($items->ID); ?>">
		<?php //pree($items); ?>
		<h4><a target="_blank" href="<?php echo esc_url($items->type='custom'?$items->url:get_permalink($items->object_id)); ?>"><?php echo esc_html($items->title); ?></a></h4>
<!--        <span class="dashicons dashicons-yes hide"></span>-->
        <div title="<?php echo esc_attr($wphi_set_str); ?>" class="banner_wrapper" <?php echo ($img_url?'style="background:url('.esc_url($img_url).'); background-repeat:no-repeat;"':''); ?>><?php do_action('wphi_inside_banner_wrapper', $img_url) ?><input type="number" value="<?php echo ($img_id>0?esc_attr($img_id):0); ?>" class="hide hi_vals" name="header_images[<?php echo esc_attr($items->ID); ?>]" /><?php if($img_id==0 || true): ?><label><?php echo esc_html($wphi_set_str); ?></label><?php endif; ?></div>
        <?php do_action('gluri_slider_banner', $items->ID) ?>
        <a class="wphi_submit_btn" title="<?php _e('Click here to submit changes','wp-header-images'); ?>"><?php _e('Save Changes','wp-header-images'); ?></a>
        <a class="wphi_clear_btn" title="<?php _e('Click here to remove this header image','wp-header-images'); ?>"><?php _e('Clear','wp-header-images'); ?></a>
    </li>
<?php			
		}
	}else{
?>
	
<?php		
	}
?>
</ul>
<?php endforeach; ?>
<hr />
<?php
	$get_taxonomies = get_taxonomies();
	//pree($get_taxonomies);
	//pree($wphi_header_images);
	if(!empty($get_taxonomies)){
		foreach($get_taxonomies as $taxonomies){
			if(!in_array($taxonomies, array('product_cat', 'category'))){ continue; }
			$terms = get_terms( array( 'taxonomy' => $taxonomies ) );

?>
<h3 data-premium="true" data-id="<?php echo esc_attr($taxonomies); ?>" class="premium" title="<?php echo __('Premium Feature', 'wp-header-images'); ?>"><span class="dashicons dashicons-category"></span>Taxonomy - <?php echo esc_html($taxonomies); ?> (<?php echo count($terms); ?>)</h3>
<ul class="menu-class wphi_banners pages_<?php echo esc_attr($taxonomies); ?> hide"> 
<?php			
		if(!empty($terms)){
			foreach($terms as $term){
				$img_url = '';
				if(array_key_exists($taxonomies, $wphi_header_images) && array_key_exists($term->term_id, $wphi_header_images[$taxonomies])){
					$img_id = $wphi_header_images[$taxonomies][$term->term_id];
					$img_url = wp_get_attachment_url( $img_id );				
				}
?>
<li data-uid="<?php echo $uid = esc_attr($taxonomies.'-'.$term->term_id); ?>">
		<?php //pree($items); ?>
		<h4><a target="_blank" href="<?php echo esc_url(get_term_link($term->slug, $taxonomies)); ?>"><?php echo esc_html($term->name); ?></a></h4>

        <div title="<?php echo esc_attr($wphi_set_str); ?>" class="banner_wrapper" style="background:url('<?php echo esc_url($img_url); ?>'); background-repeat:no-repeat;"><?php do_action('wphi_inside_banner_wrapper', $img_url) ?><input type="number" value="<?php echo ($img_id>0?esc_attr($img_id):0); ?>" class="hide hi_vals" name="header_images[<?php echo esc_attr($taxonomies); ?>][<?php echo esc_attr($term->term_id); ?>]" /><?php if($img_id==0 || true): ?><label><?php echo esc_html($wphi_set_str); ?></label><?php endif; ?></div>
        <?php do_action('gluri_slider_banner', $taxonomies.'|'.$term->term_id) ?>
        <a class="wphi_submit_btn" title="<?php _e('Click here to submit changes','wp-header-images'); ?>"><?php _e('Save Changes','wp-header-images'); ?></a>
        <a class="wphi_clear_btn" title="<?php _e('Click here to remove this header image','wp-header-images'); ?>"><?php _e('Clear','wp-header-images'); ?></a>
    </li>
<?php				
			}
		}
?>
</ul>
<?php	
		}	
	}
?>
<p class="submit<?php echo ($wphi_pro?' hides':''); ?>"><input type="submit" name="Submit" class="button-primary" value="<?php _e( 'Save Changes','wp-header-images' ); ?>" /></p>
<?php }else{ ?>
<ul class="menu-class wphi_cm"><li><?php _e('You need to','wp-header-images'); ?> <a class="" href="nav-menus.php" target="_blank"><?php _e('Create a Menu','wp-header-images'); ?></a> <?php _e('first','wp-header-images'); ?>.</li></ul>
<?php } ?>

<?php if(function_exists('wphi_posts_headers')){ wphi_posts_headers(); }else{ echo '<span class="wphi_posts_headers"></span>'; } ?>

<?php if(!$wphi_pro): ?>
<a class="wphi-premium-features" href="<?php echo esc_url($wphi_premium_link); ?>" target="_blank"><img src="<?php echo esc_url($wphi_link); ?>img/screenshot-12.png" /></a>
<?php endif; ?>

</div>



</form>

<div class="nav-tab-content container-fluid hide" data-content="help">

    <div class="row mt-3 si_help_section">
    
                        
        

        <ul class="position-relative">
            <li><a class="btn btn-sm btn-info" href="https://wordpress.org/support/plugin/wp-header-images/" target="_blank"><?php _e('Open a Ticket on Support Forums', 'wp-header-images'); ?> &nbsp;<i class="fas fa-tag"></i></a></li>
            <li><a class="btn btn-sm btn-warning" href="http://demo.androidbubble.com/contact/" target="_blank"><?php _e('Contact Developer', 'wp-header-images'); ?> &nbsp;<i class="fas fa-headset"></i></a></li>
            <li><a class="btn btn-sm btn-secondary" href="<?php echo $wphi_premium_link; ?>/?help" target="_blank"><?php _e('Need Urgent Help?', 'wp-header-images'); ?> &nbsp;<i class="fas fa-phone"></i></i></a></li>
            <li><iframe width="560" height="315" src="https://www.youtube.com/embed/4zJpBtWP2mw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></li>
        </ul>              
    </div>

</div>

<form class="nav-tab-content hide styling" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post">
<input type="hidden" name="wphi_tab" value="<?php echo isset($_GET['t'])?esc_attr($_GET['t']):'0'; ?>" />
<?php wp_nonce_field( 'wphi_styling_action', 'wphi_styling_action_field' ); ?>
<textarea name="wphi_styling"><?php echo esc_textarea(get_option( 'wphi_styling', '/* Your CSS Styles */' )); ?></textarea>
<iframe style="float:right;" src="https://www.youtube.com/embed/JfkAk5DARCI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<p class="submit"><input type="submit" name="Submit" class="button-primary" value="<?php _e( 'Save Changes','wp-header-images' ); ?>" /></p>
</form>


<div class="hide nav-tab-content templates_wrapper">
<div class="templates_area">



	<?php
	if(!$wphi_pro){
	?>
	<a class="button wphi_premium" href="<?php echo esc_url($wphi_premium_link); ?>" target="_blank"><?php _e('Click here to go premium','wp-header-images'); ?></a>
    <?php
	}
	?>
    <div class="accordion_wrapper">
        <button class="accordion first btn btn-danger"><?php _e('Auto Implementation','wp-header-images'); ?> <i class="fas fa-caret-square-right"></i></button>

        <div class="panel first">

    <h5><?php _e('Auto Implementation','wp-header-images'); ?> <span class="wphi-ww-ss">(<?php _e('Without Shortcodes','wp-header-images'); ?>)</span></h5>


            <div class="wphi_dom_area">

                <form action="" method="post">

                    <?php wp_nonce_field( 'wphi_dom_action', 'wphi_dom_field' ); ?>

                    <?php

                    $wphi_dom = get_option('wphi_dom', array());
                    $wphi_dom_type =  array_key_exists('type', $wphi_dom) ? $wphi_dom['type'] : 'img';
                    $wphi_dom_p_type =  array_key_exists('placement_type', $wphi_dom) ? $wphi_dom['placement_type'] : 'replace';


                    ?>


                    <table class="form-table">

                    <tbody>

                        <tr valign="top">
                            <th>
                                <h3><a href="theme-editor.php?file=header.php&theme=<?php echo esc_attr($current_theme); ?>" style="text-decoration:none;" target="_blank">header.php</a></h3>
                            </th>

                            <td>

                                <?php if(is_writeable(get_stylesheet_directory().'/header.php')): ?>
                                       <span class="dashicons dashicons-yes-alt writeable"></span> <?php _e('is writeable.', 'wp-header-images'); ?>
                                <?php else: ?>
                                        <span class="dashicons dashicons-dismiss not_writeable"></span> <?php _e('is not writeable.', 'wp-header-images'); ?>
                                <?php endif; ?>

                             </td>

                        </tr>

                     <?php if(!is_writeable(get_stylesheet_directory().'/header.php')): ?>

                        <tr valign="top">

                            <th colspan="2" style="padding-top: 0;">
                                <?php _e('Your header.php is not writable, you may use DOM position feature for alternative implementation.', 'wp-header-images'); ?>
                            </th>

                        </tr>

                    <?php endif; ?>

                        <tr valign="top">

                            <th scope="row">

                                <label for="wphi_dom_switch"><?php _e('Use DOM:', 'wp-header-images'); ?></label>
                                

                            </th>

                            <td>

                                <label class="wphi_switch">
                                    <input type="checkbox" name="wphi_dom[switch]" <?php checked(array_key_exists('switch', $wphi_dom)); ?>  value="1" id="wphi_dom_switch">
                                    <span class="wphi_slider wphi_round"></span>
                                </label>
                                
                                <a href="https://www.youtube.com/embed/4zJpBtWP2mw" target="_blank" class="wphi-vt"><?php _e('Video Tutorial', 'wp-header-images'); ?></a>

                            </td>

                        </tr>

                        <tr valign="top" class="input_row ">
                            <th scope="row">
                                <label for="wphi_dom_selector"><?php _e('DOM CSS Selector:', 'wp-header-images'); ?></label>
                            </th>
                            <td class="forminp forminp-text">
                                <input name="wphi_dom[selector]" id="wphi_dom_selector" type="text" class="" placeholder="body p#content_1, body div.content" value="<?php echo array_key_exists('selector', $wphi_dom) ? esc_attr($wphi_dom['selector']): ''?>" required="required" /> / <?php _e('Delay:', 'wp-header-images'); ?> (<?php _e('Optional', 'wp-header-images'); ?>) <input style="width:60px" name="wphi_dom[delay]" id="wphi_dom_delay" type="text" class="" placeholder="1000" value="<?php echo array_key_exists('delay', $wphi_dom) ? esc_attr($wphi_dom['delay']): ''?>" /> <?php _e('milliseconds', 'wp-header-images'); ?>
                                <p class="help_text">
                                    <span class="dashicons dashicons-editor-help"></span>  <?php _e('CSV for multiple DOM', 'wp-header-images'); ?>
                                </p>
                            </td>
                        </tr>

                        <tr valign="top" class="input_row ">
                            <th scope="row">
                                <label><?php _e('Header Image Type:', 'wp-header-images'); ?></label>
                            </th>
                            <td class="forminp forminp-text">
                                
                                <input name="wphi_dom[type]" value="bg" id="wphi_type_bg" type="radio" class="" <?php checked($wphi_dom_type == 'bg'); ?>>
                                <label for="wphi_type_bg"><?php _e('Background Image', 'wp-header-images'); ?> </label>

                                <span class="help_text">
                                    <span class="dashicons dashicons-editor-help"></span> <?php _e('This option will use your inserted HTML DOM selector to show Header Image as Background Image.', 'wp-header-images'); ?>
                                </span>

                            </td>
                        </tr>

                        <tr valign="top" class="input_row ">
                            <th scope="row">
                            </th>
                            <td class="forminp forminp-text">

                                <input name="wphi_dom[type]" value="img" id="wphi_type_img" type="radio" class="" <?php checked($wphi_dom_type == 'img'); ?>>
                                <label for="wphi_type_img"><?php _e('HTML Image Tag', 'wp-header-images'); ?></label>
                                <span class="help_text">
                                    <span class="dashicons dashicons-editor-help"></span> <?php _e('This option will use your provided HTML DOM selector to insert Image tag inside it.', 'wp-header-images'); ?>
                                </span>
                            </td>
                        </tr>

                        <tr valign="top" class="input_row ">
                            <th scope="row">
                                <label for="wphi_placement_type"><?php _e('Select Placement Style:', 'wp-header-images'); ?></label>
                            </th>
                            <td class="forminp-text">

                                <select name="wphi_dom[placement_type]" id="wphi_placement_type">

                                    <option value="replace" <?php selected($wphi_dom_p_type == 'replace'); ?>><?php _e('Fill In / Replace Everything', 'wp-header-images'); ?></option>
                                    <option value="before" <?php selected($wphi_dom_p_type == 'before'); ?>><?php _e('Before / Above Content', 'wp-header-images'); ?></option>
                                    <option value="after" <?php selected($wphi_dom_p_type == 'after'); ?>><?php _e('After / Below Content', 'wp-header-images'); ?></option>

                                </select>
                                

                            </td>
                        </tr>


                        <tr valign="top">
                            <th scope="row">

                                <input type="submit" name="wphi_dom_submit" class="button button-primary" value="<?php _e('Save Changes', 'wp-header-images') ?>">

                            </th>
                            <td class="forminp-text">

                                


                            </td>
                        </tr>

                    </tbody>

                </table>


                </form>
            </div>

        </div>


        <button class="accordion btn btn-info"><?php _e('Manual Implementation','wp-header-images'); ?> <i class="fas fa-caret-square-right"></i></button>

        <div class="panel">

    <?php
    if($wphi_pro){
    ?>



        <h5><?php _e('Manual Implementation','wp-header-images'); ?> <span class="wphi-ww-ss">(<?php _e('With Shortcodes','wp-header-images'); ?>)</span></h5>


        <div class="inner_area">


    <?php 
	
	$wphi_get_templates = wphi_get_templates();
	if(!empty($wphi_get_templates)){ ?>

    
	<?php _e('Select any template','wp-header-images'); ?>: <br /><br />


    <form action="options-general.php?page=wp_hi" class="templates" method="post">
    <input type="hidden" name="wphi_tab" value="<?php echo isset($_GET['t'])?esc_attr($_GET['t']):'0'; ?>" />
    <input type="submit" value="<?php _e('Save Changes'); ?>" class="button button-secondary"  />
        <div class="hides">
            <label for="wphi_template_text"><input id="wphi_template_text" type="checkbox" name="wphi_template_text" value="yes" /><?php _e('Display Page Title on Image'); ?></label>
        </div>        
    	<?php wp_nonce_field( 'wphi_template_action', 'wphi_template_field' ); ?>
    	<input style="display:none" type="text" name="wphi_template" value="<?php echo esc_attr($wphi_template); ?>" />
    	<ul>
        <?php foreach($wphi_get_templates as $key=>$templates){ if(!in_array($key, array('selected'))){ 
		?>
	        <li data-id="<?php echo esc_attr($key); ?>" <?php echo ($wphi_template==$key?'class="selected"':''); ?>><img src="<?php echo esc_url($templates['url']); ?>" alt="<?php echo esc_attr($templates['title']); ?>" title="<?php echo esc_attr($templates['title']); ?>" /><strong><?php echo esc_html($templates['title']); ?></strong>
            
            <?php if($key=='custom'){ ?>
            <div class="wphi_template_custom">
            	<label><?php _e('Template HTML','wp-header-images'); ?>:</label>
                <textarea class="template_str" name="wphi_template_custom[template_str]"><?php echo esc_textarea($templates['template_str']); ?></textarea><br />

                <label><?php _e('Template Styles and Scripts','wp-header-images'); ?>:</label>
                <textarea class="template_scripts" name="wphi_template_custom[template_scripts]"><?php echo esc_textarea($templates['template_scripts']); ?></textarea>
            </div>
            <?php }  ?>
            
            </li>
        <?php } } ?>
        </ul>

        
    </form>
    <?php } ?>
    </div>
    <?php }else{ ?>
   
    <div class="inner_area">
    <b class="wphi_pro"><?php _e('Templates feature is a premium feature.','wp-header-images'); ?></b>
    
	<form class="templates" action="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>" method="post"> 
    
    <input type="hidden" name="wphi_tab" value="<?php echo isset($_GET['t'])?esc_attr($_GET['t']):'0'; ?>" />
	
    <br /><br />
	<?php _e('Select any template','wp-header-images'); ?>: <br />

	<?php
	$wphi_get_templates = wphi_get_templates();
	if(!empty($wphi_get_templates)){ ?>    
    <ul>
    <?php foreach($wphi_get_templates as $key=>$templates){ if(!in_array($key, array('selected'))){ 
	?>
    <li data-id="<?php echo esc_attr($key); ?>"><img src="<?php echo esc_url($templates['url']); ?>" alt="<?php echo esc_attr($templates['title']); ?>" title="<?php echo esc_attr($templates['title']); ?>" /><strong><?php echo esc_html($templates['title']); ?></strong>
    
    
            <?php if($key=='custom'){ ?>
            <div class="wphi_template_custom">
            	<label><?php _e('Template HTML','wp-header-images'); ?>:</label>
                <textarea class="template_str" name="wphi_template_custom[template_str]"><?php echo esc_textarea($templates['template_str']); ?></textarea><br />

                <label><?php _e('Template Styles and Scripts','wp-header-images'); ?>:</label>
                <textarea class="template_scripts" name="wphi_template_custom[template_scripts]"><?php echo esc_textarea($templates['template_scripts']); ?></textarea>
            </div>
            <?php }  ?>    
    </li>
    <?php } } ?>
    </ul>
    
    <?php } ?>
    </form>
    </div>
    <?php } ?>
    
    
    <div class="inner_area">
    <a href="https://www.youtube.com/embed/E4kOyBnmt2A" class="wphi_vt" target="_blank"><?php _e('Video Tutorial','wp-header-images'); ?></a>
    <b class="wphi_pro"><?php _e('For Developers','wp-header-images'); ?> (<?php echo ($wphi_pro?__('Advanced','wp-header-images'):__('Advanced/Premium','wp-header-images')); ?>)</b>
    
    <section>
    <strong><?php _e('Use following action hook instead','wp-header-images'); ?>:</strong><br />
    <span class="scode">&lt;?php do_action('apply_header_images',
    '&lt;div class=&quot;header_image&quot;&gt;&lt;h2 style=&quot;background-image: url(%url%);&quot;&gt;%title%&lt;/h2&gt;&lt;/div&gt;'); ?&gt;
    </span>
    <strong>Or the following shortcode instead:</strong>
	<span class="scode">
    &lt;?php do_shortcode('[WP_HEADER_IMAGES
template_str=\'&lt;div class=&quot;header_image&quot;&gt;&lt;h2 style=&quot;background-image: url(%url%);&quot;&gt;%title%&lt;/h2&gt;&lt;/div&gt;\']'); ?&gt;
	</span>
    
    <span class="scode">
    &lt;?php do_action('apply_header_images', '&lt;div class=&quot;header_image&quot;&gt;&lt;img src=&quot;%url%&quot; /&gt;&lt;/div&gt;'); ?&gt; 
	</span>
    
    
	</section>
    
    <section>
    <strong><?php _e('Expected Output'); ?>:</strong><br />
    <img src="<?php echo esc_url($wphi_link); ?>img/banner-style-c.jpg" />
    </section>
    
    <section>
    <strong><?php _e('Sample CSS'); ?>:</strong><br /><br />
.header_image h2{<br />    <span class="css">background-repeat: no-repeat; <br />    background-attachment: scroll;<br />    background-size: cover;<br />    width: 100%; <br />    height: 250px; <br />    line-height: 250px;     <br />    text-align: center; <br />    text-transform: uppercase;<br />    color: #ffffff;<br />    font-weight: bold;<br />    font-size: 40px;</span><br />}
	</section>
    
	</div>

        </div>
</div>
</div>
    

</div>

<div class="hide nav-tab-content how_work">

    <div class="accordion_wrapper">

        <button class="accordion first"><?php _e('Get Started','wp-header-images'); ?> <span class="dashicons dashicons-plus plus"></span><span class="dashicons dashicons-minus minus"></span></button>
        <div class="panel first">
            <div>
                <p>
                    <?php _e('Click here to open theme','wp-header-images'); ?> <a href="theme-editor.php?file=header.php&theme=<?php echo esc_attr($current_theme); ?>" target="_blank">header.php</a><br />
                </p>

                <p>
                    <?php _e('Insert this code snippet inside &lt;body&gt; tag wherever you want these header images to appear.','wp-header-images'); ?>
                </p>

                <p>
                    <span class="light_blue">&lt;?php do_shortcode('[WP_HEADER_IMAGES]'); ?&gt;</span><br />
                </p>
                <?php _e("That's it."); ?><br /><br /><br />

            </div>
        </div>

        <button class="accordion">the_custom_header_markup(); <span class="dashicons dashicons-plus plus"></span><span class="dashicons dashicons-minus minus"></span></button>
        <div class="panel">
            <p>
                <?php _e("This plugin is compatible with WordPress default theme function", 'wp-header-images'); ?> <a href="https://developer.wordpress.org/reference/functions/the_custom_header_markup/" target="_blank">the_custom_header_markup()</a>.<br /><br />
                &lt;?php the_custom_header_markup(); ?&gt;<br /><br />
                <small><?php _e('If your theme is using this function so no shortcode is required. You can simply use this plugin alternative of the default header image.', 'wp-header-images'); ?></small><br /><br />
                <small><a href="customize.php?autofocus[control]=header_image" target="_blank"><?php _e('Click here'); ?> <?php _e('to check if this theme is using default header image functionality?', 'wp-header-images'); ?></a></small>
            </p>
        </div>

        <button class="accordion"><?php _e('Shortcodes','wp-header-images'); ?> [WP_HEADER_IMAGES] <span class="dashicons dashicons-plus plus"></span><span class="dashicons dashicons-minus minus"></span></button>
        <div class="panel">
            <p>
                <?php _e('Insert any of these code snippets inside &lt;body&gt; tag wherever you want these header images to appear.','wp-header-images'); ?>

                <br />
                <br />


                <span class="light_blue">&lt;?php echo do_shortcode('[WP_HEADER_IMAGES type="url"]'); ?&gt;</span>
                <br />
                <span class="light_blue">&lt;?php do_shortcode('[WP_HEADER_IMAGES type="url" echo="true"]'); ?&gt;</span>
                <br />
                <span class="light_blue">&lt;?php echo do_shortcode('[WP_HEADER_IMAGES type="url" echo="false"]'); ?&gt;</span>

            </p>
        </div>

        <button class="accordion">get_header_image(); <span class="dashicons dashicons-plus plus"></span><span class="dashicons dashicons-minus minus"></span></button>
        <div class="panel">
            <p>

                <?php _e('If you are using the following function in your custom made theme?','wp-header-images'); ?><br />
<strong>get_header_image();</strong>
                <span class="light_blue"><br /><br />
                        &emsp;$custom_made_header_image = get_header_image();<br />
                        &emsp;if(function_exists('get_header_images_inner')){<br />
                            &emsp;&emsp;$header_image = get_header_images_inner();<br />
                            &emsp;&emsp;if(!empty($header_image) &amp;&amp; isset($header_image['url']) &amp;&amp; $header_image['url']!=''){<br />
                                 &emsp;&emsp;&emsp;$custom_made_header_image = $header_image['url'];<br />
                            &emsp;&emsp;}<br />
                         &emsp;}
                        </span>

                <?php if(!$wphi_pro): ?>
                    <a href="<?php echo esc_url($wphi_premium_link); ?>" target="_blank"><?php _e('Click here to Go Premium','wp-header-images'); ?></a>
                <?php endif; ?>

            </p>
        </div>

    </div>
    
	</div>
<?php

	$disable_devices_on = (array_key_exists('disable_devices', $wphi_on_off_options) && $wphi_on_off_options['disable_devices']=='on');
?>
<form class="nav-tab-content hide post_types_wrapper" action="<?php echo esc_attr($_SERVER['REQUEST_URI']); ?>" method="post">
<input type="hidden" name="wphi_tab" value="<?php echo isset($_GET['t'])?esc_attr($_GET['t']):'0'; ?>" />
    <?php wp_nonce_field( 'wphi_post_type_action', 'wphi_post_type_field' ); ?>

<div class="wphi-on-off-wrapper">
<?php //pree($wphi_on_off_options); ?>    
<h5><?php _e('General Options:','wp-header-images'); ?></h5>     
<ul class="wphi_on_off_options">
    <li class="mobile-version">
        
        <i class="fas fa-mobile-alt"></i>
        <i class="fas fa-tablet-alt"></i>
        <i class="fas fa-laptop"></i>
        
        <strong><?php echo __('Responsiveness for Mobile Devices', 'wp-header-images'); ?></strong>
        
        <div class="form-group form-check">
        
        
          <label class="form-check-label" for="disable_devices_on">
          	
            <input value="on" class="form-check-input" type="radio" name="wphi_on_off_options[disable_devices]" id="disable_devices_on" <?php checked($disable_devices_on); ?> /><?php echo __('Enable', 'wp-header-images'); ?>
            
            
          </label>
		</div>          
		<div class="form-group form-check">   

          <label class="form-check-label" for="disable_devices_off">
          	
            <input value="off" class="form-check-input" type="radio" name="wphi_on_off_options[disable_devices]" id="disable_devices_off" <?php checked(!$disable_devices_on); ?> /><?php echo __('Disable', 'wp-header-images'); ?>
            
          </label>
    
        </div>

    </li>
</ul>

    

    <h5><?php _e('Select post types for header images:','wp-header-images'); ?> <a title="<?php _e('Click here to Go Premium','wp-header-images'); ?>" href="<?php echo esc_url($wphi_premium_link); ?>" target="_blank"><small>(<?php _e('Premium Feature','wp-header-images'); ?>)</small></a></h5> 

    <?php

        $post_types = get_post_types();
        ksort($post_types);

		
		
		
		
        if(!empty($post_types)){

            $wphi_post_type_selection = get_option('wphi_post_type_selection');

            if($wphi_post_type_selection === false){

                $wphi_post_type_selection = array('post', 'page', 'product');

            }
?>

<ul class="wphi_single_post_type">
<?php
            foreach ($post_types as $post_type_key => $post_type_value){



                ?>
                <li title="<?php echo $wphi_pro?'':__('This is a premium feature', 'wp-header-images'); ?>">
                    <label for="<?php echo esc_attr($post_type_key); ?>">
                    <input type="checkbox" name="wphi_post_type_selection[]" value="<?php echo esc_attr($post_type_key); ?>" id="<?php echo esc_attr($post_type_key); ?>" <?php checked(in_array($post_type_key, $wphi_post_type_selection)) ?> <?php disabled(!$wphi_pro); ?>>
                        <?php echo esc_html($post_type_key); ?>
                    </label>
                </li>


                <?php

            }
?>
</ul>
</div>
<?php		
	
        }



    ?>
    <iframe src="https://www.youtube.com/embed/vgqQ6yYZY0I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    

    <p class="submit-wrapper">
        <input type="submit" name="wphi_post_type_selection_submit" class="button-primary" value="<?php _e( 'Save Changes','wp-header-images' ); ?>" />
    </p>


</form>






</div>

<script type="text/javascript" language="javascript">

jQuery(document).ready(function($) {

	

	<?php if(isset($_POST['wphi_tab'])): 
	
		$wphi_tab = sanitize_wphi_data($_POST['wphi_tab']);
	?>

	setTimeout(function(){

		$('.nav-tab-wrapper .nav-tab:nth-child(<?php echo esc_html($wphi_tab+1); ?>)').click();
		
	}, 1000);
	

	<?php endif; ?>



	

});	

</script>
<style type="text/css">
#message{
	display:none;
}
</style>