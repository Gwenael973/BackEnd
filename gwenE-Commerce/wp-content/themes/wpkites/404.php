<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wpkites
 */
get_header();
wpkites_breadcrumbs();
?>
<section class="section-space error-page bg-default" id="content">
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
            ?>
            <div class="col-lg-12 col-sm-12">
                <div class="text-center justify-content-center">
                    <h2 class="title"><?php esc_html_e('4', 'wpkites' ); ?><img src="<?php echo esc_url(WPKITES_TEMPLATE_DIR_URI.'/assets/images/crack-bulb.png');?>" class="img-fluid" alt="<?php esc_attr_e('cup-tea', 'wpkites'); ?>"><?php esc_html_e('4', 'wpkites' ); ?></h2>
                    <h2 class="contact-title"><?php echo wp_kses_post("The page you were looking for<br> couldn't be found.","wpkites");?></h2>
                    <div class="not-found-btn">
                         <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-small btn-default"><?php esc_html_e('Back to Homepage', 'wpkites' ); ?></a>
                    </div>                
                </div>
            </div>
        </div>          
    </div>
</section>
<?php get_footer();?>