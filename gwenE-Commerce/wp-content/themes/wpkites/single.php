<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wpkites
 */
get_header();

wpkites_breadcrumbs();

if((get_post_meta(get_the_ID(),'wpkites_site_layout', true ) == 'wpkites_site_layout_stretched') || (get_theme_mod('single_post_sidebar_layout','right')=='stretched')) {
    $wpkites_page_class='stretched';   
}
else {
    $wpkites_page_class='';
}

$wpkites_page_sidebar = get_post_meta(get_the_ID(),'wpkites_page_sidebar', true );
if($wpkites_page_sidebar =='') { 
    $wpkites_page_sidebar = 'sidebar-1'; 
}  
?>
<section class="page-section-space blog bg-default <?php echo esc_attr($wpkites_page_class);?>" id="content">
    <div class="container<?php echo esc_html(wpkites_single_post_container());?>">
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
            if(get_post_meta(get_the_ID(),'wpkites_site_layout', true ) == '' )
            {
                if(get_theme_mod('single_post_sidebar_layout','right')=='left'):
                    echo '<div class="col-lg-4 col-md-5 col-sm-12"><div class="sidebar left-sidebar">';
                        dynamic_sidebar($wpkites_page_sidebar); 
                    echo '</div></div>';
                    endif;
                if(get_theme_mod('single_post_sidebar_layout','right')=='right'|| get_theme_mod('single_post_sidebar_layout','right')=='left'):        
                    echo '<div class="col-lg-8 col-md-7 col-sm-12">';
                else:
                    echo '<div class="col-lg-12 col-md-12 col-sm-12">';   
                endif;
            }
            else if(get_post_meta(get_the_ID(),'wpkites_site_layout', true ) == 'wpkites_site_layout_left')
            {
                echo '<div class="col-lg-4 col-md-5 col-sm-12"><div class="sidebar left-sidebar">';
                    dynamic_sidebar($wpkites_page_sidebar); 
                echo '</div></div>';
                echo '<div class="col-lg-8 col-md-7 col-sm-12">';
            }
            else if(get_post_meta(get_the_ID(),'wpkites_site_layout', true ) == 'wpkites_site_layout_right')
            {
                echo '<div class="col-lg-8 col-md-7 col-sm-12">';
            }
            else if(get_post_meta(get_the_ID(),'wpkites_site_layout', true ) == 'wpkites_site_layout_without_sidebar')
            {
                echo '<div class="col-lg-12 col-md-12 col-sm-12">'; 
            }
            else
            {
                echo '<div class="col-lg-12 col-md-12 col-sm-12">';
            }

            while (have_posts()): the_post();
                if ( ! function_exists( 'wpkites_plus_activate' ) ){
                    get_template_part('template-parts/content', 'single');
                }
                else{
                    include(WPKITESP_PLUGIN_DIR.'/inc/template-parts/content-single.php');
                }
            endwhile;
            if(function_exists( 'wpkites_plus_activate' )):
                if(get_theme_mod('wpkites_enable_related_post',true ) ===true ):
                    include(WPKITESP_PLUGIN_DIR.'/inc/template-parts/related-posts.php');
                endif;
            endif;
            if (get_theme_mod('wpkites_enable_single_post_admin_details', true) === true):
                get_template_part('template-parts/auth-details');
            endif;

            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) : comments_template();
            endif;
                
            echo '</div>';             
            if(((get_theme_mod('single_post_sidebar_layout','right')=='right') && get_post_meta(get_the_ID(),'wpkites_site_layout', true )=='') ||  get_post_meta(get_the_ID(),'wpkites_site_layout', true )=='wpkites_site_layout_right'):
                echo '<div class="col-lg-4 col-md-5 col-sm-12"><div class="sidebar s-l-space">';
                   dynamic_sidebar($wpkites_page_sidebar); 
                echo '</div></div>';
            endif;?>
        </div>
    </div>
</section>
<?php get_footer(); ?>