<?php
/**
 * The header for our theme
 *
 * @package wpkites
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
        <?php if (is_singular() && pings_open(get_queried_object())) : 
            echo '<link rel="pingback" href=" '.esc_url(get_bloginfo( 'pingback_url' )).' ">';
        endif;
        wp_head(); ?>   
    </head>
<?php
if(get_theme_mod('banner_enable',true)==true) { $wpkites_banner='banner'; } else { $wpkites_banner='remove-banner'; }
if(get_theme_mod('wpkites_layout_style', 'wide') == "boxed") { $wpkites_class = "boxed"; } else { $wpkites_class = "wide"; } ?>
<body <?php body_class($wpkites_class." ". $wpkites_banner." ".get_theme_mod('wpkites_color_skin','dark')); ?> >
    <?php wp_body_open(); ?>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wpkites'  ); ?></a>
               <div id="wrapper"> 
                <?php 
                global $template;
                global $woocommerce;
                        
                if ( ! function_exists( 'wpkites_plus_activate' ) ):
                    do_action('wpkites_preloader_feature_section_hook');         
                    get_template_part('inc/header/header-nav');
                else:   
                    do_action('wpkites_plus_preloader_feaure_section_hook');                     
                    do_action('wpkites_plus_header_feature_section_hook');
                endif;

                if(basename($template) == 'template-business.php'): ?>
                    <div id="content">
                <?php endif; ?>