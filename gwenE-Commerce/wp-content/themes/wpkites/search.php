<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wpkites
 */
get_header();

wpkites_breadcrumbs();
?> 
<section class="page-section-space blog bg-default" id="content">
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
            
            if ( is_active_sidebar( 'sidebar-1' ) ):        
                echo '<div class="col-lg-8 col-md-7 col-sm-12 standard-view">';
            else:
                echo '<div class="col-lg-12 col-md-12 col-sm-12 standard-view">';   
            endif; 

            if (have_posts()): 
                    while (have_posts()): the_post();
                        if(! function_exists( 'wpkites_plus_activate' ) ){
                            get_template_part( 'template-parts/content','search');
                        }
                        else{
                            include(WPKITESP_PLUGIN_DIR.'/inc/template-parts/content-search.php' );
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
            <?php get_sidebar();?>
        </div>
    </div>
</section>   
<?php get_footer(); ?>