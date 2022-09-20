<?php
function wpkites_custom_style(){
// Typography
$wpkites_enable_header_typography = get_theme_mod('enable_header_typography', false);
$wpkites_enable_section_title_typography = get_theme_mod('enable_section_title_typography', false);
$wpkites_enable_slider_title_typography = get_theme_mod('enable_slider_title_typography', false);
$wpkites_enable_content_typography = get_theme_mod('enable_content_typography', false);
$wpkites_enable_post_typography = get_theme_mod('enable_post_typography', false);
$wpkites_enable_shop_page_typography = get_theme_mod('enable_shop_page_typography', false);
$wpkites_enable_sidebar_typography = get_theme_mod('enable_sidebar_typography', false);
$wpkites_enable_footer_widget_typography = get_theme_mod('enable_footer_widget_typography', false);

/* Site title and tagline */
if ($wpkites_enable_header_typography == true) {
    ?>
    <style>
        body .site-title {
            font-size:<?php echo intval(get_theme_mod('site_title_fontsize', '36')) . 'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('site_title_fontfamily', 'Open Sans')); ?>;
            line-height:<?php echo intval(get_theme_mod('site_title_line_height','39')).'px'; ?>;
        }
        body .site-description {
            font-size:<?php echo intval(get_theme_mod('site_tagline_fontsize', '20')) . 'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('site_tagline_fontfamily', 'Open Sans')); ?>;
            line-height:<?php echo intval(get_theme_mod('site_tagline_line_height','30')).'px'; ?>;
        }

        body .navbar.custom .nav > li.nav-item > a {
            font-size:<?php echo intval(get_theme_mod('menu_title_fontsize', '15')) . 'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('menu_title_fontfamily', 'Open Sans')); ?>;
            line-height:<?php echo intval(get_theme_mod('menu_line_height','30')).'px'; ?>;
        }

        body .navbar .nav .nav-item .dropdown-item {
            font-size:<?php echo intval(get_theme_mod('submenu_title_fontsize', '15')) . 'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('submenu_title_fontfamily', 'Open Sans')); ?>;
            line-height:<?php echo intval(get_theme_mod('submenu_line_height','30')).'px'; ?>;
        }
    </style>
    <?php
}

/* Section Title */
if ($wpkites_enable_section_title_typography == true) {
    ?>
    <style>
        body .section-header  h2.section-title, body .contact .section-header h2 {
            font-size:<?php echo intval(get_theme_mod('section_title_fontsize', '36')) . 'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('section_title_fontfamily', 'Open Sans')); ?>;
            line-height:<?php echo intval(get_theme_mod('section_title_line_height','54')).'px'; ?>;
        }

        body .section-header .section-subtitle, body .testimonial .section-header p {
            font-size:<?php echo intval(get_theme_mod('section_subtitle_fontsize', '15')) . 'px'; ?>;           
            font-family:<?php echo esc_attr(get_theme_mod('section_subtitle_fontfamily', 'Open Sans')); ?>;
            line-height:<?php echo intval(get_theme_mod('section_description_line_height','30')).'px'; ?>;
        }
    </style>
    <?php
}


/* Slider Title */
if ($wpkites_enable_slider_title_typography == true) {
    ?>
    <style>
        body .slider-caption h2.title  {
            font-size:<?php echo intval(get_theme_mod('slider_title_fontsize', '50')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('slider_line_height','85')).'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('slider_title_fontfamily', 'Open Sans')); ?>;
            
        }
    </style>
    <?php
}


/* Content */
if ($wpkites_enable_content_typography == true) {
    ?>
    <style>
        /* Heading H1 */
        body:not(.woocommerce-page) .entry-content h1, body .services h1, body .contact h1, body .error-page h1, body .page-stretched-template h1:not(.page-stretched-template .page-title h1) {
            font-size:<?php echo intval(get_theme_mod('h1_typography_fontsize', '36')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('h1_line_height','54')).'px'; ?>;;
            font-family:<?php echo esc_attr(get_theme_mod('h1_typography_fontfamily', 'Open Sans')); ?>;
            
        }

        /* Heading H2 */
        body:not(.woocommerce-page) .entry-content h2, body .contact h2, body .page-stretched-template h2:not(.page-stretched-template .page-title h2) {
            font-size:<?php echo intval(get_theme_mod('h2_typography_fontsize', '30')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('h2_line_height','45')).'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('h2_typography_fontfamily', 'Open Sans')); ?>;
            
        }
    
        body .error-page h2{
            font-size:<?php echo intval(get_theme_mod('h2_typography_fontsize', '30')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('h2_line_height','45')).'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('h2_typography_fontfamily', 'Open Sans')); ?>;
            
        }

        /* Heading H3 */
        body:not(.woocommerce-page) .entry-content h3, body .services h3, body .comment-form .comment-respond h3, body .home-blog .entry-header h3.entry-title a, body .error-page h3, body .page-stretched-template h3:not(.page-stretched-template .page-title h3) {
            font-size:<?php echo intval(get_theme_mod('h3_typography_fontsize', '24')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('h3_line_height','36')).'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('h3_typography_fontfamily', 'Open Sans')); ?>;
            
        }
        body .comment-title h3{
            font-size:<?php echo intval(get_theme_mod('h3_typography_fontsize', '24')) + 4 . 'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('h3_typography_fontfamily', 'Open Sans')); ?>;
            line-height:<?php echo intval(get_theme_mod('h3_line_height','36')).'px'; ?>;
        }

        /* Heading H4 */
        body h4:not(.blog h4.entry-title, .footer-sidebar .widget.widget_block h4, body .sidebar .widget.widget_block h4, body .page-title h4), body .entry-content h4, body .team-grid h4, body .entry-header h4 a:not(.blog h4.entry-title a), body .testimonial .testmonial-block .name, body .services h4, body .blog-author h4.name, body .error-page h4, body .services h4 a, body .home-blog .post-content .entry-title a, body .page-stretched-template h4:not(.page-stretched-template .page-title h4) {

            font-size:<?php echo intval(get_theme_mod('h4_typography_fontsize', '20')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('h4_line_height','30')).'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('h4_typography_fontfamily', 'Open Sans')); ?>;
            
        }

        /* Heading H5 */
        body .blog-author h5, body .comment-detail h5, body .entry-content h5, body .page-stretched-template h5:not(.page-stretched-template .page-title h5) {
            font-size:<?php echo intval(get_theme_mod('h5_typography_fontsize', '18')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('h5_line_height','24')).'px'; ?>;
           font-family:<?php echo esc_attr(get_theme_mod('h5_typography_fontfamily', 'Open Sans')); ?>;
           
        }

        /* Heading H6 */
        body h6:not(body .page-title h6), body .entry-content h6, body .services h6, body .contact h6, body .page-stretched-template h6:not(.page-stretched-template .page-title h6) {
            font-size:<?php echo intval(get_theme_mod('h6_typography_fontsize', '14')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('h6_line_height','21')).'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('h6_typography_fontfamily', 'Open Sans')); ?>;
            
        }

        /* Paragraph */
        body .entry-content p, body .woocommerce-product-details__short-description p, body .wpcf7 .wpcf7-form p label, body .testimonial.testimonial-1 .testimonial-block .inner-box .content-column .author-info .designation, body .services p, body .page-stretched-template p:not(.page-stretched-template .page-title p) {
            font-size:<?php echo intval(get_theme_mod('p_typography_fontsize', '15')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('p_line_height','30')).'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('p_typography_fontfamily', 'Open Sans')); ?>;
           
        }
        body .slider-caption p, body p:not(.footer-sidebar p,.sidebar p, .custom-logo-link-url p,.copyright-section), body .testimonial.testimonial-1 .testimonial-block .inner-box .content-column .entry-content p {
            font-size:<?php echo intval(get_theme_mod('p_typography_fontsize', '15')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('p_line_height','30')).'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('p_typography_fontfamily', 'Open Sans')); ?>;
            
        }


        /* Button Text */
        body .btn-combo a, body .mx-auto a, body .pt-3 a, body .wpcf7-form .wpcf7-submit,  body .woocommerce .button, body .btn-default, body .btn-light, body .sidebar .woocommerce button[type="submit"], body .site-footer .woocommerce button[type="submit"], body .sidebar .widget .search-submit, body #commentform input[type="submit"], body .woocommerce .added_to_cart, body.wpkites_header_btn, body .search-submit, body .wp-block-button__link, body .more-link, body .wp-block-search .wp-block-search__button {
            font-size:<?php echo intval(get_theme_mod('button_text_typography_fontsize', '15')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('button_line_height','30')).'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('button_text_typography_fontfamily', 'Open Sans')); ?>;
           
        }
    </style>
    <?php
}

/* Blog / Archive / Single Post */
if ($wpkites_enable_post_typography == true) {
    ?>
    <style>
        body .blog:not(.home-blog) .post-content .entry-title a, body .entry-header h4.blog-title, body .entry-header h4 a.blog-title, body .entry-header h2 a, body .entry-header h3.entry-title a:not(.home-blog-title){
            font-size:<?php echo intval(get_theme_mod('post-title_fontsize', '36')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('post-title_line_height','54')).'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('post-title_fontfamily', 'Open Sans')); ?>;
        }
    </style>
    <?php
}


/* Shop Page */
if ($wpkites_enable_shop_page_typography == true) {
    ?>
    <style>
        /* Heading H1 */
        body.woocommerce div.product h1.product_title, body.woocommerce h1:not( body .sidebar h2, body .site-footer h1){
            font-size:<?php echo intval(get_theme_mod('shop_h1_typography_fontsize', '36')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('shop_h1_line_height','54')).'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('shop_h1_typography_fontfamily', 'Open Sans')); ?>;
            
        }
        body.woocommerce .page-title-section .breadcrumb-overlay .page-title h1{
            font-size: 32px;
            line-height: 1.3;
            font-family: inherit;
        }
        /* Heading H2 */
        body.woocommerce .products h2, body .woocommerce .cart_totals h2, body .woocommerce-Tabs-panel h2, body.woocommerce .cross-sells h2, body.woocommerce div.product h2.product_title, body.woocommerce h2:not(body .site-title, body .sidebar h2, body .site-footer h2), body .woocommerce ul.products li.product h2.woocommerce-loop-product__title {
            font-size:<?php echo intval(get_theme_mod('shop_h2_typography_fontsize', '18')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('shop_h2_line_height','30')).'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('shop_h2_typography_fontfamily', 'Open Sans')); ?>;
            
        }

        /* Heading H3 */
        body .woocommerce .checkout h3:not(footer h3), body .woocommerce h3:not(footer h3, .sidebar h3, h3.theme-dtl) {
            font-size:<?php echo intval(get_theme_mod('shop_h3_typography_fontsize', '24')) . 'px'; ?>;
            line-height:<?php echo intval(get_theme_mod('shop_h3_line_height','36')).'px'; ?>;
           font-family:<?php echo esc_attr(get_theme_mod('shop_h3_typography_fontfamily', 'Open Sans')); ?>;
          
        }
    </style>
    <?php
}


/* Sidebar widgets */
if ($wpkites_enable_sidebar_typography == true) {
    ?>
    <style>
        body .sidebar .widget-title, body .sidebar .widget.widget_block :is(h1,h2,h3,h4,h5,h6), body .sidebar .wp-block-search__label, body .sidebar .wc-block-product-search__label {
            font-size:<?php echo intval(get_theme_mod('sidebar_fontsize', '24')) . 'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('sidebar_fontfamily', 'Open Sans')); ?>;
            line-height:<?php echo intval(get_theme_mod('sidebar_line_height','36')).'px'; ?>;
        }
        /* Sidebar Widget Content */
        body .sidebar .widget_recent_entries a, body .sidebar a:not(.wp-block-social-link-anchor), body .sidebar p, body .sidebar .wp-block-latest-posts__post-excerpt {
            font-size:<?php echo intval(get_theme_mod('sidebar_widget_content_fontsize', '15')) . 'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('sidebar_widget_content_fontfamily', 'Open Sans')); ?>;
            line-height:<?php echo intval(get_theme_mod('sidebar_widget_content_line_height','30')).'px'; ?>;
        }
    </style>
    <?php
}

/* Footer Widget */
if ($wpkites_enable_footer_widget_typography == true) {
    ?>
    <style>
        /* Footer Widget Title */
        body .site-footer .footer-typo .widget-title, body .footer-sidebar .widget.widget_block :is(h1,h2,h3,h4,h5,h6), body .site-footer .footer-typo .wp-block-search__label, body .site-footer .footer-typo .wc-block-product-search__label{
            font-size:<?php echo intval(get_theme_mod('footer_widget_title_fontsize', '24')) . 'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('footer_widget_title_fontfamily', 'Open Sans')); ?>;
            line-height:<?php echo intval(get_theme_mod('footer_widget_title_line_height','36')).'px'; ?>;
        }
        /* Footer Widget Content */
        body .footer-sidebar .widget_recent_entries a, body .footer-sidebar.footer-typo a:not(.wp-block-social-link-anchor), body .footer-sidebar.footer-typo p, body .footer-sidebar.footer-typo .textwidget, body .footer-sidebar  .head-contact-info li, body .footer-sidebar .head-contact-info li a, body .footer-sidebar em, body .footer-sidebar .wp-block-latest-posts__post-excerpt{
            font-size:<?php echo intval(get_theme_mod('footer_widget_content_fontsize', '15')) . 'px'; ?>;
            font-family:<?php echo esc_attr(get_theme_mod('footer_widget_content_fontfamily', 'Open Sans')); ?>;
            line-height:<?php echo intval(get_theme_mod('footer_widget_content_line_height','30')).'px'; ?>;
        }
    </style>
<?php } ?>

<?php
// -----------------Colors & Background----------------------
?>



<style>
    /* Header */

    <?php if (get_theme_mod('header_clr_enable', false) == true) : ?>
        /* Site Title & Tagline */
        body .site-title a{
            color: <?php echo esc_attr(get_theme_mod('site_title_link_color', '#ffffff')); ?>;
        }
        body .site-title a:hover{
            color: <?php echo esc_attr(get_theme_mod('site_title_link_hover_color', '#926AA6')); ?>;
        }
        body .navbar p.site-description{
            color: <?php echo esc_attr(get_theme_mod('site_tagline_text_color', '#acacac')); ?>;
        }
    <?php endif; ?>

    /* Primary Menu */
    <?php if (get_theme_mod('apply_menu_clr_enable', false) == true) : ?>
        body .navbar.custom .nav .nav-item .nav-link, body .navbar .nav .nav-item .nav-link, body .navbar.navbar1 .nav .nav-item .nav-link {
            color: <?php echo esc_attr(get_theme_mod('menus_link_color', '#ffffff')); ?>;
        }
        body .navbar .nav .nav-item:hover .nav-link, body .navbar .nav .nav-item:hover .nav-link, body .navbar.custom .nav .nav-item .nav-link:hover, body .navbar .nav .nav-item .nav-link:hover {
            color: <?php echo esc_attr(get_theme_mod('menus_link_hover_color', '#926AA6')); ?>;
        }
        body .nav.navbar-nav a.dropdown-item:hover {
            color: <?php echo esc_attr(get_theme_mod('menus_link_hover_color', '#926AA6')); ?>;
        }
        body .navbar ul li.menu-item a .menu-text:hover:after {
            background: <?php echo esc_attr(get_theme_mod('menus_link_hover_color', '#926AA6')); ?>;
        }
        body .navbar .nav li.active .nav-link .menu-text:after {
            background:<?php echo esc_attr(get_theme_mod('menus_link_hover_color', '#926AA6')); ?>; 
            width: 100%;
        }
        /**/

        body .navbar.custom .nav .nav-item.active .nav-link, body .navbar .nav .nav-item.active .nav-link, body .navbar .nav .nav-item.current_page_parent .nav-link, body .navbar .nav.navbar-nav .dropdown-menu > li.active > a{
            color: <?php echo esc_attr(get_theme_mod('menus_link_active_color', '#926AA6')); ?>;
        }
        
        /* Submenus */
        body .nav.navbar-nav .dropdown-item, body .nav.navbar-nav .dropdown-menu {
            background-color: <?php echo esc_attr(get_theme_mod('submenus_background_color', '#ffffff')); ?>;
        }
        body .navbar .nav.navbar-nav a.dropdown-item {
            color: <?php echo esc_attr(get_theme_mod('submenus_link_color', '#000000')); ?>;
        }
        body a.text-dark.bg-light {
            color: <?php echo esc_attr(get_theme_mod('submenus_link_color', '#000000')); ?> !important;
        }
        body .nav.navbar-nav .nav-item a.dropdown-item:hover, body .nav.navbar-nav a.bg-light.dropdown-item {
    
            color: <?php echo esc_attr(get_theme_mod('submenus_link_hover_color', '#926AA6')); ?> ;

        }
        body .navbar-nav:not(.sm-collapsible) .sm-nowrap > li.show > .dropdown-item.text-dark:hover,
        body .navbar-nav:not(.sm-collapsible) .sm-nowrap > li.show > .dropdown-item.text-dark:hover,
        body .navbar-nav .sm-nowrap > li.show > .dropdown-item.text-dark {
          color: <?php echo esc_attr(get_theme_mod('submenus_link_hover_color', '#926AA6')); ?>;
          background-color: transparent;
        }
        body a.text-dark:hover {
         color: <?php echo esc_attr(get_theme_mod('submenus_link_hover_color', '#ffffff')); ?> !important;
        }

        body .navbar ul.dropdown-menu li.menu-item a .menu-text:hover:after{
            background: <?php echo esc_attr(get_theme_mod('submenus_link_hover_color', '#926AA6')); ?>;
        }
        body .navbar .nav .nav-item.active li.active a.dropdown-item .nav-link:hover, body .navbar-nav .current_page_ancestor .nav-link, body .navbar-nav:not(.sm-collapsible) .sm-nowrap > li.current_page_parent > .dropdown-item, body .navbar-nav .sm-nowrap > li.active > .dropdown-item.text-dark, body .navbar-nav .sm-nowrap > li.current_page_parent > .dropdown-item, body .navbar .nav.navbar-nav .sm-nowrap > li.current_page_parent > .dropdown-item, body .navbar-nav .current_page_ancestor .nav-link{
         color: <?php echo esc_attr(get_theme_mod('menus_link_active_color', '#ffffff')); ?>;
        }

        body .nav.navbar-nav .dropdown-item:focus, body .nav.navbar-nav .dropdown-item:hover
        {
            background-color: transparent;
        }

    <?php endif; ?>

    /* Banner */
    body .page-title-section .page-title :is(span,h1,h2,h3,h4,h5,h6,p,div):not(.page-title h3.theme-dtl), body .page-section-space .page-title.content-area-title :is(span,h1,h2,h3,h4,h5,h6,p,div), body .page-stretched-template .page-title.content-area-title :is(span,h1,h2,h3,h4,h5,h6,p,div), body .section-space .page-title.content-area-title :is(span,h1,h2,h3,h4,h5,h6,p,div){
        color: <?php echo esc_attr(get_theme_mod('banner_text_color', '#fff')); ?>;
    }

    /* Breadcrumb */
    <?php
    $enable_brd_link_clr_setting = get_theme_mod('enable_brd_link_clr_setting', false);
    if ($enable_brd_link_clr_setting == true):
        ?>
        body .page-breadcrumb span a
        {
            color: <?php echo esc_attr(get_theme_mod('breadcrumb_title_link_color', '#ffffff')); ?>;
        }
        body .page-breadcrumb span a:hover {
            color: <?php echo esc_attr(get_theme_mod('breadcrumb_title_link_hover_color', '#926AA6')); ?>;
        }
    <?php endif; ?>

    /* Content */
    <?php
    $enable_content_link_clr_setting = get_theme_mod('content_clr_enable', false);
    if ($enable_content_link_clr_setting == true):?>
        body h1:not(.sidebar h1) {
            color: <?php echo esc_attr(get_theme_mod('h1_color', '#ffffff')); ?> ;
        }
        body .section-header h2:not(.testimonial h2, body .funfact h2, h2.widget-title), body h2:not(.bcslider-section h2, .testimonial h2, body .funfact h2, h2.widget-title, body .widget.widget_block h2){
            color: <?php echo esc_attr(get_theme_mod('h2_color', '#ffffff')); ?>;
        }
        body h3:not(.sidebar h3) {
            color: <?php echo esc_attr(get_theme_mod('h3_color', '#ffffff')); ?>;
        }
        body .entry-header h4 > a:not(.blog .entry-header h4.entry-title > a,body .entry-header h4 > a:hover), body h4:not(h4.entry-title.blog-title,.sidebar h4), body .team .team-grid h4.name, body .section-space.contact-detail .contact-area h4, body .services h4.entry-title a, body h4.entry-title a.home-blog-title:not(h4.entry-title a.home-blog-title:hover){
            color: <?php echo esc_attr(get_theme_mod('h4_color', '#ffffff')); ?>;
        }
        body .blog-author h5, body .comment-detail h5, body h5:not( body .sidebar h5, body .testimonial h5.section-subtitle){
            color: <?php echo esc_attr(get_theme_mod('h5_color', '#ffffff')); ?>;
        }

        body .section-header h5.section-subtitle:not( body .testimonial h5.section-subtitle){
            color: <?php echo esc_attr(get_theme_mod('h5_color', '#ffffff')); ?>;
        }

        body .product-price h5 > a{
            color: <?php echo esc_attr(get_theme_mod('h5_color', '#ffffff')); ?>;
        }

        body h6:not(.sidebar h6, .footer-sidebar h6), body .section-space.contact-detail .contact-area h6 {
            color: <?php echo esc_attr(get_theme_mod('h6_color', '#ffffff')); ?>;
        }
        body p:not(.woocommerce-mini-cart__total, .slider-caption .description, .site-description, .testimonial p, .funfact p,.sidebar p,.footer-sidebar p,.site-info p){
            color: <?php echo esc_attr(get_theme_mod('p_color', '#acacac')); ?>;
        }
    <?php endif;?>
   

    /* Sidebar */
    <?php if (get_theme_mod('apply_sibar_link_hover_clr_enable', false) == true): ?>
        body .sidebar .widget .widget-title, body .sidebar .widget.widget_block :is(h1,h2,h3,h4,h5,h6), body .sidebar .widget .wp-block-search__label, body .sidebar .widget .wc-block-product-search__label
         {
            color: <?php echo esc_attr(get_theme_mod('sidebar_widget_title_color', '#ffffff')); ?>;
        }
        body .sidebar p, body .sidebar .wp-block-latest-posts__post-excerpt, body .sidebar .wp-block-latest-posts__post-author, body .sidebar .wp-block-latest-posts__post-date, body .sidebar .wp-block-latest-comments__comment-date {
            color: <?php echo esc_attr(get_theme_mod('sidebar_widget_text_color', '#acacac')); ?>;
        }
        body .sidebar .widget a, body .woocommerce .sidebar ul.product_list_widget li a {
            color: <?php echo esc_attr(get_theme_mod('sidebar_widget_link_color', '#acacac')); ?>;
        }
        body .sidebar .widget .wp-block-tag-cloud a {
            color: <?php echo esc_attr(get_theme_mod('sidebar_widget_link_color', '#acacac')); ?> !important;
        }
        body .sidebar.s-l-space .sidebar a:hover, body .sidebar .widget a:hover, body .sidebar .widget a:focus {
            color: <?php echo esc_attr(get_theme_mod('sidebar_widget_link_hover_color', '#00BFFF')); ?>;
        }
        body .sidebar .widget .wp-block-tag-cloud a:hover, body .woocommerce .sidebar ul.product_list_widget li a:hover {
            color: <?php echo esc_attr(get_theme_mod('sidebar_widget_link_hover_color', '#00BFFF')); ?> !important ;
        }
    <?php endif; ?>

    /* Footer Widgets */
    <?php if (get_theme_mod('apply_ftrsibar_link_hover_clr_enable', false) == true) { ?>
        body .site-footer {
            background-color: <?php echo esc_attr(get_theme_mod('footer_widget_background_color', '#202022')); ?>;
        }
        body .footer-sidebar .widget .widget-title, body .footer-sidebar .widget.widget_block :is(h1,h2,h3,h4,h5,h6), body .footer-sidebar .widget .wp-block-search__label, body .footer-sidebar .widget .wc-block-product-search__label {
            color: <?php echo esc_attr(get_theme_mod('footer_widget_title_color', '#ffffff')); ?>;
        }
        body .footer-sidebar p, body .footer-sidebar .widget, body .footer-sidebar .widget_text p, body .footer-sidebar .wp-block-latest-posts__post-author, body .footer-sidebar .wp-block-latest-posts__post-date, body .footer-sidebar .wp-block-latest-posts__post-excerpt, body .footer-sidebar .wp-block-latest-comments__comment-date {
            color: <?php echo esc_attr(get_theme_mod('footer_widget_text_color', '#ffffff')); ?>;
        }
        body .footer-sidebar .widget a, body .footer-sidebar .widget_recent_entries .post-date, body .footer-sidebar .widget .wp-block-tag-cloud a, body .footer-sidebar .widget li:before  {
            color: <?php echo esc_attr(get_theme_mod('footer_widget_link_color', '#ffffff')); ?>;
        }
        body .footer-sidebar .widget .wp-block-tag-cloud a {
            color: <?php echo esc_attr(get_theme_mod('footer_widget_link_color', '#ffffff')); ?> !important;
        }
        body .footer-sidebar .widget a:hover{
            color: <?php echo esc_attr(get_theme_mod('footer_widget_link_hover_color', '#926AA6')); ?>;
        }
        body .footer-sidebar .widget .wp-block-tag-cloud a:hover {
            color: <?php echo esc_attr(get_theme_mod('footer_widget_link_hover_color', '#926AA6')); ?> !important;
        }
    <?php } else { ?>
        .site-footer p {
            color: #fff;
        }
    <?php } 
    if (get_theme_mod('search_btn_enable', false) == true ){ if(!is_rtl()) { ?>
    .cart-header {
        border-left: 1px solid #747474;
        padding: 0 0 0 0.5rem;
    } 
    <?php } else{?>
        .cart-header {
        border-right: 1px solid #747474;
        padding: 0 0 0 0.5rem;
    } 
    <?php }
    }?>
.custom-logo{width: <?php echo intval(get_theme_mod('wpkites_logo_length',154));?>px; height: auto;}
.wpkites_header_btn{ -webkit-border-radius: <?php echo intval(get_theme_mod('after_menu_btn_border',0));?>px;border-radius: <?php echo intval(get_theme_mod('after_menu_btn_border',0));?>px;}
#content .container:not(.page-section-space.stretched .container, .section-space.stretched .container) {
    max-width: <?php echo intval(get_theme_mod('container_width','1140'));?>px;
}
#wrapper .site-footer .container{max-width: 1140px;}

@media(min-width: 692px){
    body .page-section-space .row .col-lg-8, body .page-section-space .row .col-md-7, 
    body.woocommerce-page .section-space .row .col-lg-8, body.woocommerce-page .section-space .row .col-md-8,
    body.woocommerce-page .page-section-space .row .col-lg-8, body.woocommerce-page .page-section-space .row .col-md-8 {
        max-width: <?php echo intval( get_theme_mod('content_width','66.6') );?>%;
        flex: <?php echo intval( get_theme_mod('content_width','66.6') );?>%;
    }

    body .page-section-space .row .col-lg-4, body .page-section-space .row .col-md-5,
    body.woocommerce-page .section-space .row .col-lg-4, body.woocommerce-page .section-space .row .col-md-4,
    body.woocommerce-page .page-section-space .row .col-lg-4, body.woocommerce-page .page-section-space .row .col-md-4 {
        max-width: <?php echo intval( get_theme_mod('sidebar_width','33.3') );?>%;
        flex: <?php echo intval( get_theme_mod('sidebar_width','33.3') );?>%;
    }
}
@media (max-width: 691px) {
    body .page-section-space .row .col-sm-12, body.woocommerce-page .section-space .row .col-sm-2, body.woocommerce-page .page-section-space .row .col-sm-12 {
        width: 100%;
    }
}
</style>
<?php
}

if(((get_theme_mod('blog_sidebar_layout','right')=='stretched')  && get_post_meta(get_option('page_for_posts', true),'wpkites_site_layout', true ) == '') || (get_post_meta(get_option('page_for_posts', true),'wpkites_site_layout', true ) == 'wpkites_site_layout_stretched')) { ?>
    <style>
        body #content .page-section-space.blog .container:not(.single-post #content .page-section-space.blog .container) {
            max-width: 100%;
            padding: 0;
            margin: 0;
        }
        body #content .page-section-space.blog .row {
            padding: 0;
            margin: 0;
        }
        body #content .page-section-space.blog .container .col-lg-12, body #content .page-section-space.blog .container .col-md-12, body #content .page-section-space.blog .container .col-sm-12 {
            padding: 0;
            margin: 0;
        }
    </style>
<?php 
}

if(get_theme_mod('blog_sidebar_layout','right')=='stretched' ) { ?>
    <style>
        body.archive #content .page-section-space.blog .container:not(body.archive.woocommerce .page-section-space.blog .container){
            max-width: 100%;
            padding: 0;
            margin: 0;
        }
        body #content .page-section-space.blog .row {
            padding: 0;
            margin: 0;
        }
        body.archive #content .page-section-space.blog .container .col-lg-12, body.archive #content .page-section-space.blog .container .col-md-12, body.archive #content .page-section-space.blog .container .col-sm-12 {
            padding: 0;
            margin: 0;
        }
    </style>
<?php }

if(((get_theme_mod('single_post_sidebar_layout','right')=='stretched')  && get_post_meta(get_the_ID(),'wpkites_site_layout', true ) == '') || ( get_post_meta(get_the_ID(),'wpkites_site_layout', true ) =='wpkites_site_layout_stretched')) { ?>
    <style>
        body.single-post #content .page-section-space.blog .container {
            max-width: 100%;
            padding: 0;
            margin: 0;
        }
        body.single-post #content .page-section-space.blog .row {
            padding: 0;
            margin: 0;
        }
        body.single-post #content .page-section-space.blog .container .col-lg-12, body.single-post #content .page-section-space.blog .container .col-md-12, body.single-post #content .page-section-space.blog .container .col-sm-12 {
            padding: 0;
            margin: 0;
        }
    </style>
<?php }

if(((get_theme_mod('page_sidebar_layout','right')=='stretched')  && get_post_meta(get_the_ID(),'wpkites_site_layout', true )=='') || ( get_post_meta(get_the_ID(),'wpkites_site_layout', true ) == 'wpkites_site_layout_stretched')) { ?>
    <style>
        body #content .page-section-space.stretched .container {
            max-width: 100%;
            padding: 0;
            margin: 0;
        }
        body #content .page-section-space.stretched .row {
            padding: 0;
            margin: 0;
        }
        body #content .page-section-space.stretched .container .col-lg-12, body #content .page-section-space.stretched .container .col-md-12, body #content .page-section-space.stretched .container .col-sm-12 {
            padding: 0;
            margin: 0;
        }
    </style>
<?php }

if (class_exists('WooCommerce')) {
    if(((get_theme_mod('page_sidebar_layout','right')=='stretched')  && get_post_meta(wc_get_page_id('shop'),'wpkites_site_layout', true )=='') || ( get_post_meta(wc_get_page_id('shop'),'wpkites_site_layout', true ) == 'wpkites_site_layout_stretched')) { ?>
        <style>
            body .section-space.stretched .container {
                max-width: 100%;
                padding: 0;
                margin: 0;
            }
            body .section-space.stretched .row {
                padding: 0;
                margin: 0;
            }
            body .section-space.stretched .container .col-lg-12, body .section-space.stretched .container .col-md-12, body .section-space.stretched .container .col-sm-12 {
                padding: 0;
                margin: 0;
            }
        </style>
    <?php } 
}
add_action('wp_head','wpkites_custom_style');