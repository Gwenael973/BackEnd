<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpkites
 */
get_header();

wpkites_breadcrumbs();

$wpkites_page_sidebar = get_post_meta(get_option('page_for_posts', true),'wpkites_page_sidebar', true );
if($wpkites_page_sidebar =='') { 
    $wpkites_page_sidebar = 'sidebar-1';
}
?>
<section class="page-section-space blog bg-default" id="content">
    <div class="container<?php echo esc_html(wpkites_blog_post_container());?>">
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

            if(get_theme_mod('blog_sidebar_layout','right')=='left'):
                echo '<div class="col-lg-4 col-md-5 col-sm-12"><div class="sidebar left-sidebar">';
                    dynamic_sidebar($wpkites_page_sidebar); 
                echo '</div></div>';
                endif;
            if(get_theme_mod('blog_sidebar_layout','right')=='right'|| get_theme_mod('blog_sidebar_layout','right')=='left'):        
                echo '<div class="col-lg-8 col-md-7 col-sm-12">';
            else:
                echo '<div class="col-lg-12 col-md-12 col-sm-12">';   
            endif; 

            if (have_posts()): 
                    while (have_posts()): the_post();
                        if(! function_exists( 'wpkites_plus_activate' ) ){
                            get_template_part( 'template-parts/content');
                        }
                        else{
                            include(WPKITESP_PLUGIN_DIR.'/inc/template-parts/content.php');
                        }
                    endwhile;
                else:
                    get_template_part('template-parts/content', 'none');
                endif;
                // pagination
                    do_action('wpkites_post_navigation');
                // pagination
                ?>
            </div>	
            <?php 
            if(get_theme_mod('blog_sidebar_layout','right')=='right'):
                echo '<div class="col-lg-4 col-md-5 col-sm-12"><div class="sidebar s-l-space">';
                   dynamic_sidebar($wpkites_page_sidebar); 
                echo '</div></div>';
            endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>