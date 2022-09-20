<?php
/**
 * @package wpkites
 */
if ( ! class_exists( 'WPKites_Layout_Meta_Box' ) ) {

  class WPKites_Layout_Meta_Box
  {

    public function __construct()
        {
          add_action( 'admin_enqueue_scripts', array( $this,'wpkites_admin_script'));
          add_action( 'add_meta_boxes', array( $this, 'wpkites_meta_fn'));
          add_action( 'save_post', array( $this, 'wpkites_meta_save'));
        }

    /**
     * Load Admin Script
     *
     */
     public function wpkites_admin_script()
     {   
      wp_enqueue_style('wpkites-meta', WPKITES_TEMPLATE_DIR_URI.'/inc/meta-boxes/assets/css/meta-box.css');
     }


    //Add Meta Box
    function wpkites_meta_fn()
    {
      add_meta_box( 'wpkites_meta_id', esc_html__('Layout Settings (Layout setting will  not work with the custom templates except default template.)','wpkites'), array($this,'wpkites_meta_cb_fn'), '','normal','high' );
    }

    //Callback Meta Function
    function wpkites_meta_cb_fn()
    {
      require_once('meta-box-page-settings.php');
    }


    //Save Meta Values
    function wpkites_meta_save($post_id) 
      {  
        if ((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
              return;
          
        if ( ! current_user_can( 'edit_page', $post_id ) )
        {   return ;  } 
          
        if(isset( $_POST['post_ID']))
        {   
          $post_ID = absint($_POST['post_ID']);
            update_post_meta($post_ID, 'wpkites_site_layout', sanitize_text_field($_POST['wpkites_site_layout']));
            update_post_meta($post_ID, 'wpkites_page_sidebar', sanitize_text_field($_POST['wpkites_page_sidebar']));
        }       
      }

  }

}


new WPKites_Layout_Meta_Box();