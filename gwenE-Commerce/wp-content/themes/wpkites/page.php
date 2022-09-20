<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpkites
 */
get_header();

wpkites_breadcrumbs();

if((get_post_meta(get_the_ID(),'wpkites_site_layout', true )=='wpkites_site_layout_stretched') || (get_theme_mod('page_sidebar_layout','right')=='stretched')) {
    $wpkites_page_class='stretched';   
}
else {
    $wpkites_page_class='';
}

$wpkites_page_sidebar = get_post_meta(get_the_ID(),'wpkites_page_sidebar', true );
if($wpkites_page_sidebar == '') { 
    $wpkites_page_sidebar = 'sidebar-1';
}
if(get_post_meta(get_the_ID(),'wpkites_site_layout', true ) =='') {
    if(get_theme_mod('page_sidebar_layout','right')=='right'|| get_theme_mod('page_sidebar_layout','right')=='left'):        
        $page_column = '<div class="col-lg-8 col-md-7 col-sm-12">';
    else:
        $page_column = '<div class="col-lg-12 col-md-12 col-sm-12">';   
    endif;
}
else if(get_post_meta(get_the_ID(),'wpkites_site_layout', true ) == 'wpkites_site_layout_left')
{
    $page_column = '<div class="col-lg-8 col-md-7 col-sm-12">';
}
else if(get_post_meta(get_the_ID(),'wpkites_site_layout', true ) == 'wpkites_site_layout_right')
{
    $page_column = '<div class="col-lg-8 col-md-7 col-sm-12">';
}
else if(get_post_meta(get_the_ID(),'wpkites_site_layout', true ) == 'wpkites_site_layout_without_sidebar') {
    $page_column = '<div class="col-lg-12 col-md-12 col-sm-12">'; 
}
else
{
    $page_column = '<div class="col-lg-12 col-md-12 col-sm-12">';
}
?>
<section class="page-section-space page bg-default <?php echo esc_attr($wpkites_page_class);?>" id="content">
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

            if(((get_theme_mod('page_sidebar_layout','right')=='left') && get_post_meta(get_the_ID(),'wpkites_site_layout', true )== '') || get_post_meta(get_the_ID(),'wpkites_site_layout', true )=='wpkites_site_layout_left'):
                echo '<div class="col-lg-4 col-md-5 col-sm-12"><div class="sidebar left-sidebar">';
                    dynamic_sidebar($wpkites_page_sidebar); 
                echo '</div></div>';
            endif;
            if (class_exists('WooCommerce')) {

                if (is_account_page() || is_cart() || is_checkout()) {
                    echo $page_column;
                } else {
                    echo $page_column;
                }
            } else {
                echo $page_column;
            }
            ?>
            <?php
            if (class_exists('WooCommerce')) {

                if (is_account_page() || is_cart() || is_checkout()) {

                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'page');
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                    endwhile;
                } else {
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'page');
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                    endwhile;
                }
            } else {
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'page');
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                endwhile;
            }
            ?>
        </div>	
        <?php
        if (class_exists('WooCommerce')) {

            if (is_account_page() || is_cart() || is_checkout()) {
                if(((get_theme_mod('page_sidebar_layout','right')=='right') && get_post_meta(get_the_ID(),'wpkites_site_layout', true )=='') || get_post_meta(get_the_ID(),'wpkites_site_layout', true )=='wpkites_site_layout_right') {
                    echo '<div class="col-lg-4 col-md-5 col-sm-12"><div class="sidebar s-l-space">';
                        dynamic_sidebar($wpkites_page_sidebar); 
                    echo '</div></div>';
                } 
            }
            else {
                if(((get_theme_mod('page_sidebar_layout','right')=='right') && get_post_meta(get_the_ID(),'wpkites_site_layout', true )=='') || get_post_meta(get_the_ID(),'wpkites_site_layout', true )=='wpkites_site_layout_right') {
                    echo '<div class="col-lg-4 col-md-5 col-sm-12"><div class="sidebar s-l-space">';
                        dynamic_sidebar($wpkites_page_sidebar); 
                    echo '</div></div>';
                }
            }
        } 
        else {
            if(((get_theme_mod('page_sidebar_layout','right')=='right') && get_post_meta(get_the_ID(),'wpkites_site_layout', true )=='') || get_post_meta(get_the_ID(),'wpkites_site_layout', true )=='wpkites_site_layout_right') {
                echo '<div class="col-lg-4 col-md-5 col-sm-12"><div class="sidebar s-l-space">';
                    dynamic_sidebar($wpkites_page_sidebar); 
                echo '</div></div>';
            }
        }
        ?>
    </div>
</section>
<?php get_footer(); ?>