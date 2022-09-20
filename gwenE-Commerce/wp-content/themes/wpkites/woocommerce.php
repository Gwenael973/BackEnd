<?php
get_header();

wpkites_breadcrumbs();

global $woocommerce;

if((get_post_meta(wc_get_page_id('shop'),'wpkites_site_layout', true )=='wpkites_site_layout_stretched') || (get_theme_mod('page_sidebar_layout','right')=='stretched')) {
    $wpkites_page_class='stretched';   
}
else {
    $wpkites_page_class='';
}
if(get_post_meta(wc_get_page_id('shop'),'wpkites_site_layout', true ) =='') {
    if((get_theme_mod('page_sidebar_layout','right')=='right') || get_theme_mod('page_sidebar_layout','right')=='left')
    {
        $page_column = '<div class="col-lg-8 col-md-7 col-sm-12">';
    }
    else
    {
        $page_column = '<div class="col-lg-12 col-md-12 col-sm-12">';
    }
}
else if(get_post_meta(wc_get_page_id('shop'),'wpkites_site_layout', true ) == 'wpkites_site_layout_left') {  
    $page_column = '<div class="col-lg-8 col-md-7 col-sm-12">';
}
else if(get_post_meta(wc_get_page_id('shop'),'wpkites_site_layout', true ) == 'wpkites_site_layout_right') {
    $page_column = '<div class="col-lg-8 col-md-7 col-sm-12">';
}
else if(get_post_meta(wc_get_page_id('shop'),'wpkites_site_layout', true ) == 'wpkites_site_layout_without_sidebar') {
    $page_column = '<div class="col-lg-12 col-md-12 col-sm-12">';
}
else {
    $page_column = '<div class="col-lg-12 col-md-12 col-sm-12">';
}
?>
<div class="clearfix"></div>
<section class="section-space shop woocommerce bg-default shop-bg <?php echo esc_attr($wpkites_page_class);?>" id="content">
    <div class="container<?php echo esc_html(wpkites_container());?>">
        <div class="row"> 
            <?php 
            if(get_theme_mod('breadcrumb_position','page_header')=='content_area'):
                echo '<div class="col-lg-12 col-md-12 col-sm-12">';
                if(!function_exists( 'wpkites_plus_activate' ) ):
                    do_action('wpkites_breadcrumbs_page_title_hook');
                else:
                    do_action('wpkites_plus_breadcrumbs_page_title_hook');
                endif;
                echo '</div>';
            endif;
            
            if(((get_theme_mod('page_sidebar_layout','right')=='left') && get_post_meta(wc_get_page_id('shop'),'wpkites_site_layout', true )== '') || get_post_meta(wc_get_page_id('shop'),'wpkites_site_layout', true )=='wpkites_site_layout_left') {
                if (is_active_sidebar('woocommerce')) {
                    get_sidebar('woocommerce');
                }
            }
            echo  $page_column;
                woocommerce_content(); ?>
            </div>  
            <?php
            if(((get_theme_mod('page_sidebar_layout','right')=='right') && get_post_meta(wc_get_page_id('shop'),'wpkites_site_layout', true )=='') || get_post_meta(wc_get_page_id('shop'),'wpkites_site_layout', true )=='wpkites_site_layout_right') {
                if (is_active_sidebar('woocommerce')) {
                    get_sidebar('woocommerce');
                }
            }
            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>