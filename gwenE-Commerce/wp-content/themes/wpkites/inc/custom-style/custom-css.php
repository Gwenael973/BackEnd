<?php

// define function for custom color setting
function wpkites_custom_light() {

$link_color = get_theme_mod('link_color', '#926AA6');
list($r, $g, $b) = sscanf($link_color, "#%02x%02x%02x");
$r = $r - 50;
$g = $g - 25;
$b = $b - 40;

if ($link_color != '#ff0000') :?>
<style type="text/css">
<?php if(!is_rtl()):?>
blockquote 
{
border-left: 3px solid <?php echo esc_attr($link_color); ?>;
}
<?php else:?>
blockquote 
{
border-right: 3px solid <?php echo esc_attr($link_color); ?>;
}
<?php endif;?>    
a:hover , a:focus {color: <?php echo esc_attr($link_color); ?>;}
.entry-meta a:hover span,.entry-meta a:focus span {color: <?php echo esc_attr($link_color); ?>;}
dl dd a, dl dd a:hover, dl dd a:focus, ul li a:focus { color: <?php echo esc_attr($link_color); ?>; }

/*--------------------------------------------------------------
2.0 Forms
--------------------------------------------------------------*/
button,
input[type="button"],
input[type="submit"] {
  color: <?php echo esc_attr($link_color); ?>;
  border:1px solid <?php echo esc_attr($link_color); ?>;
}
button:hover,
button:focus,
input[type="button"]:hover,
input[type="button"]:focus,
input[type="submit"]:hover,
input[type="submit"]:focus {
  background: <?php echo esc_attr($link_color); ?>;
  outline: <?php echo esc_attr($link_color); ?>;
  border:1px solid <?php echo esc_attr($link_color); ?>;
}
/* Placeholder text color */
.form-control:focus {
  border: thin dotted <?php echo esc_attr($link_color); ?> !important;
}
.wpkites-preloader-cube .wpkites-cube:before{background: <?php echo esc_attr($link_color); ?>;}
#preloader2 .square {background: <?php echo esc_attr($link_color); ?>;}
/*============================3.0 BUTTONS============================*/
.btn-default { background: <?php echo esc_attr($link_color); ?>;border: 1px solid <?php echo esc_attr($link_color); ?>;}
.btn-light:hover, .btn-light:focus { background: <?php echo esc_attr($link_color); ?>;border: 1px solid <?php echo esc_attr($link_color); ?>; }

.btn-default-dark { background: <?php echo esc_attr($link_color); ?>; }
.btn-default-light { background: <?php echo esc_attr($link_color); ?>;border: 1px solid <?php echo esc_attr($link_color); ?>; }
.btn-default-light:hover, .btn-default-light:focus { color: <?php echo esc_attr($link_color); ?>;border: 1px solid <?php echo esc_attr($link_color); ?>; }

.btn-border { border: 2px solid <?php echo esc_attr($link_color); ?>; }
.btn-border:hover, .btn-border:focus { border: 2px solid <?php echo esc_attr($link_color); ?>;}

.btn-light:not(:disabled):not(.disabled):active {
  background-color: <?php echo esc_attr($link_color); ?>;
  border-color: <?php echo esc_attr($link_color); ?>;
}

/*==================7.0 HEADER CONTACT DETAILS===============================*/
.header-sidebar {
  background: <?php echo esc_attr($link_color); ?>;
}
.btn-style-one {
  color: <?php echo esc_attr($link_color); ?>;
  border: 1px solid <?php echo esc_attr($link_color); ?>;
}
.btn-style-one:hover,.btn-style-one:focus {background-color: <?php echo esc_attr($link_color); ?>;}
.custom-social-icons li > a:hover, 
.custom-social-icons li > a:focus {color:<?php echo esc_attr($link_color); ?>;}

/* ==================== Search Box Style==============================*/

/* 2. Search Bar Fullscreen - hidden search field */
#searchbar_fullscreen .btn {
  background-color: <?php echo esc_attr($link_color); ?>;
}
#searchbar_fullscreen .close {
  background-color: <?php echo esc_attr($link_color); ?>;
  border-color: <?php echo esc_attr($link_color); ?>;
}
.search-box-outer a.text-dark,.search-box-outer a.text-dark:focus,.search-box-outer a.text-dark:hover{color:<?php echo esc_attr($link_color); ?> !important;}

/* ============================ Search Box =====================================*/
.search-form input[type="submit"] {
  background: <?php echo esc_attr($link_color); ?> none repeat scroll 0 0;
  border: 1px solid <?php echo esc_attr($link_color); ?>;
}
.search-box-outer a:hover, .search-box-outer a:focus {color:<?php echo esc_attr($link_color); ?>; }

/*============================= 9.0 Woocommerce Header Cart==========================*/
.navbar .search-box-outer .dropdown-menu,.header-logo .search-box-outer .dropdown-menu{
  border-top: solid 1px <?php echo esc_attr($link_color); ?>;
}
/*.navbar .nav .nav-item .cart-header > a:focus {color:<?php echo esc_attr($link_color); ?>;}*/
.cart-header > a.cart-total {
  background: <?php echo esc_attr($link_color); ?>;
}

/*======10.0  Main Slider - Owl Carousel============================================*/
.pointer-scroll {
  background: <?php echo esc_attr($link_color); ?>;
}

/*========================11.0  OWL SLIDER NEXT - PREV BUTTONS===================*/
.owl-carousel .owl-prev:hover, 
.owl-carousel .owl-prev:focus { 
  background-color: <?php echo esc_attr($link_color); ?>;
  border-color: <?php echo esc_attr($link_color); ?>;
}
.owl-carousel .owl-next:hover, 
.owl-carousel .owl-next:focus { 
  background-color: <?php echo esc_attr($link_color); ?>;
  border-color: <?php echo esc_attr($link_color); ?>;
}

/* =====================================12.0 Cta Section========================*/
.cta_main { background-color: <?php echo esc_attr($link_color); ?>;}
/*.cta_content .btn-light {color: <?php echo esc_attr($link_color); ?>;}*/
.cta_content .btn-light:hover , .cta_content .btn-light:focus { background: <?php echo esc_attr($link_color); ?>; }
.cta_content .btn-light:not(:disabled):not(.disabled):active {
  background-color: <?php echo esc_attr($link_color); ?>;
}
/*.cta-2 .overlay {
  background-color: rgba( 146,106,166,.8);
}*/
/* ==================================13.0 SECTION HEADER===========================*/
.section-header .section-title { color:<?php echo esc_attr($link_color); ?>;}

/* ==========================14.0 Mixed Classes====================================*/
.section-space .owl-theme .owl-dots .owl-dot.active span { border-color: <?php echo esc_attr($link_color); ?>;}
.separator {
  color: <?php echo esc_attr($link_color); ?>;
}
.separator::before {
  background: linear-gradient(to right, rgba(146,106,166,0), <?php echo esc_attr($link_color); ?>);
}
.separator::after {
  background: linear-gradient(to left, rgba(146,106,166,0), <?php echo esc_attr($link_color); ?>);
}
.owl-theme .owl-dots .owl-dot.active span{border-color: <?php echo esc_attr($link_color); ?>;}
/*===================================================================================
15.0 Service Section , Service Section 2 , Service Section 3 , Service Section 4
===================================================================================*/
.services .post:hover,.services .post:focus { 
  border:1px solid <?php echo esc_attr($link_color); ?>;
  outline: 1px solid <?php echo esc_attr($link_color); ?>;
}
.services .post-thumbnail i.fa { 
  color: <?php echo esc_attr($link_color); ?>;
}
.services .entry-header .entry-title a:hover, .services .entry-header .entry-title a:focus {color: <?php echo esc_attr($link_color); ?>;}

.services2 .post::before {
  background-color: <?php echo esc_attr($link_color); ?>;
}
.services2 .post-thumbnail i.fa { 
  color: <?php echo esc_attr($link_color); ?>;  
}

.services3 .post .entry-header .entry-title a:hover, .services3 .post .entry-header .entry-title a:focus{color: <?php echo esc_attr($link_color); ?>;}
.services3 .post-thumbnail i.fa { 
  background: <?php echo esc_attr($link_color); ?>;
  box-shadow: <?php echo esc_attr($link_color); ?> 0px 0px 0px 1px;
}
.services3 .post:hover .post-thumbnail i.fa, .services3 .post:focus .post-thumbnail i.fa { 
  color: <?php echo esc_attr($link_color); ?>; 
}

.services4 .post .entry-header .entry-title a:hover,
.services4 .post .entry-header .entry-title a:focus{color: <?php echo esc_attr($link_color); ?>;}
.services4 .post-thumbnail i.fa { 
  color: <?php echo esc_attr($link_color); ?>;  
}

/* =========================== 16.0 Portfolio Section ===============*/
.portfolio .portfolio-thumbnail .portfolio-item-description .see-more> :first-child {
  color:<?php echo esc_attr($link_color); ?>;
}
.portfolio .portfolio-thumbnail .overlay {
  background: rgba( 146,106,166,.9);
}
/*--------------------- Portfolio tab -------------------------------*/
.md-pills .nav-link.active,.md-pills .nav-link:hover, .md-pills .nav-link:focus { 
  background-color: <?php echo esc_attr($link_color); ?>;
}

/*===================================================================================*/
/* 18.0 Team Section , Team Section2 , Team Section3 , Team Section4
/*===================================================================================*/
.team figcaption span {color: <?php echo esc_attr($link_color); ?>;}
.team .team-grid .img-holder .custom-social-icons {
  background: <?php echo esc_attr($link_color); ?> padding-box content-box;
}
.team2 .name{color:<?php echo esc_attr($link_color); ?>;}
.team2 .team-grid .card-body .list-inline li > a:hover,
.team2 .team-grid .card-body .list-inline li > a:focus  {color: <?php echo esc_attr($link_color); ?>;}

.team3 .team-grid .card-body .list-inline li > a:hover,
.team3 .team-grid .card-body .list-inline li > a:focus  {color: <?php echo esc_attr($link_color); ?>;}

.team4 .list-inline  > a:hover, .team4 .list-inline  > a:focus { color: <?php echo esc_attr($link_color); ?>;}
.team4 .team-grid .list-inline li > a:hover,
.team4 .team-grid .list-inline li > a:focus { color: <?php echo esc_attr($link_color); ?>;}

/* ====================== 19.0 Funfact Section  ===============*/
.funfact-inner:hover, .funfact-inner:focus { background-color: <?php echo esc_attr($link_color); ?> }

/*--------------------------------------------------------------
20.0 Blog Section
20.1 Blog Article
--------------------------------------------------------------*/
.more-link i{color: <?php echo esc_attr($link_color); ?>;}
.entry-date a { background-color: <?php echo esc_attr($link_color); ?>;color: #ffffff; }
.entry-meta span:after {color: <?php echo esc_attr($link_color); ?>;}
.entry-content p a:hover, .entry-content p a:focus{color: <?php echo esc_attr($link_color); ?>;}
.post .entry-content a:focus i , .post a:focus span{color: <?php echo esc_attr($link_color); ?>;}

/* ========================= 20.2 Sidebar ====================== */
.sidebar .custom-social-icons li > a:hover,
.sidebar .custom-social-icons li > a:focus{background-color: <?php echo esc_attr($link_color); ?>;}
.widget .search-submit , .widget .search-field [type=submit] {
  background: <?php echo esc_attr($link_color); ?>;
}
.widget .tagcloud a:hover, .widget .tagcloud a:focus{background-color: <?php echo esc_attr($link_color); ?>;}
.subscribe-form  .btn-default:hover,.subscribe-form .btn-default:focus {
  background: <?php echo esc_attr($link_color); ?>;
  border: 1px solid <?php echo esc_attr($link_color); ?>;
}
.sidebar .widget .widget-title:after , .sidebar .widget .widget-title:before {background-color: <?php echo esc_attr($link_color); ?>;}
.banner-widget {
  background-color: <?php echo esc_attr($link_color); ?>;
}
.sidebar .widget a:hover, .sidebar .widget a:focus  { color: <?php echo esc_attr($link_color); ?>;}


/* ================ 20.3  Blog Single post =================================*/
.related-post .single-post .fa { 
  color: <?php echo esc_attr($link_color); ?>;
}
.comment-form .comment-reply-title{color: <?php echo esc_attr($link_color); ?>;}
.related-post .single-post a:hover .fa, .related-post .single-post a:focus .fa { 
  background:<?php echo esc_attr($link_color); ?>; 
}

/*21.0 =================== Shop and product section ==========================*/
.view-product-info .btn-default:hover,.view-product-info .btn-default:focus {
  background: <?php echo esc_attr($link_color); ?>;
  border: 1px solid <?php echo esc_attr($link_color); ?>;
}
.add-to-cart .btn-light {color: <?php echo esc_attr($link_color); ?>;}
.add-to-cart a:hover , .add-to-cart a:focus{background: <?php echo esc_attr($link_color); ?>;}

.products h5 a:hover , .products h5 a:focus { color: <?php echo esc_attr($link_color); ?>;}
.product-price .woocommerce-Price-amount { color: <?php echo esc_attr($link_color); ?>; }
.woocommerce ul.products li.product .onsale, .products span.onsale, .woocommerce span.onsale{
  background: <?php echo esc_attr($link_color); ?>;
}
.woocommerce ul.product_list_widget li a:hover, 
.woocommerce ul.product_list_widget li a:focus, 
.woocommerce .posted_in a:hover, 
.woocommerce .posted_in a:focus {
  color: <?php echo esc_attr($link_color); ?>;
}

/* ============== 22.0  footer section site info  ==========================*/
.site-info {
  background-color: <?php echo esc_attr($link_color); ?>;
}
.footer-sidebar .woocommerce .posted_in a:hover, 
.footer-sidebar .woocommerce-product-rating a:hover, 
.footer-sidebar .woocommerce .tagged_as a:hover, 
.footer-sidebar .woocommerce-cart table.cart td a:hover, 
.footer-sidebar .woocommerce ul.cart_list li a:hover, 
.footer-sidebar .woocommerce ul.product_list_widget li a:hover,
.footer-sidebar .woocommerce .posted_in a:focus, 
.footer-sidebar .woocommerce-product-rating a:focus, 
.footer-sidebar .woocommerce .tagged_as a:focus, 
.footer-sidebar .woocommerce-cart table.cart td a:focus, 
.footer-sidebar .woocommerce ul.cart_list li a:focus, 
.footer-sidebar .woocommerce ul.product_list_widget li a:focus  {
  color: <?php echo esc_attr($link_color); ?>;
}
.footer-sidebar a:hover,.footer-sidebar a:focus{color:<?php echo esc_attr($link_color); ?>;}
.footer-sidebar .head-contact-info i ,.footer-sidebar .address-info i {color: <?php echo esc_attr($link_color); ?>}
.footer-sidebar h2 span {color: <?php echo esc_attr($link_color); ?>;}

.site-footer .footer-sidebar .head-contact-info li a:hover,.site-footer .footer-sidebar .head-contact-info li a:focus { color: <?php echo esc_attr($link_color); ?>; }
.site-info .footer-sidebar .widget .tagcloud a:hover,
.site-info .footer-sidebar .widget .tagcloud a:focus  {
  color: <?php echo esc_attr($link_color); ?> !important;
}
.site-info .footer-sidebar .widget .search-submit, .site-info .footer-sidebar .widget .search-field [type=submit] {
  color: <?php echo esc_attr($link_color); ?>;
}

/* =========================== Page Scroll Up ==========================*/
.scroll-up a {
  background: <?php echo esc_attr($link_color); ?>;
}

/* ========================== 24.0 Sponser section  ====================*/
.sponsors .owl-carousel .owl-prev:hover, .sponsors .owl-carousel .owl-prev:focus { opacity: 1;background-color: <?php echo esc_attr($link_color); ?>; border: 1px solid <?php echo esc_attr($link_color); ?>;}
.sponsors .owl-carousel .owl-next:hover, .sponsors .owl-carousel .owl-next:focus { opacity: 1; background-color: <?php echo esc_attr($link_color); ?>;border: 1px solid <?php echo esc_attr($link_color); ?>;}

/*===================================================================================
25.0 Testimonial Section , Testimonial Section 2
===================================================================================*/
.testimonial.testimonial-1 .testimonial-block .inner-box .content-column .inner-column:before{
  background-color:<?php echo esc_attr($link_color); ?>;
}
.testimonial.testimonial-1 .testimonial-block .inner-box .content-column .quote-icon .icon{
  color:<?php echo esc_attr($link_color); ?>;
}
.testimonial.testimonial-1 .testimonial-block .inner-box .content-column .author-info .designation{
  color:<?php echo esc_attr($link_color); ?>;
}
.testimonial.testimonial-1 .client-thumb-outer .thumb-item .thumb-box{
  background-color:<?php echo esc_attr($link_color); ?>;
}
.testimonial.testimonial-1 .owl-nav .owl-prev:hover,
.testimonial.testimonial-1 .owl-nav .owl-next:hover,
.testimonial.testimonial-1 .owl-nav .owl-prev:focus,
.testimonial.testimonial-1 .owl-nav .owl-next:focus{
  color:<?php echo esc_attr($link_color); ?>;
  border-color:<?php echo esc_attr($link_color); ?>;
}
#testimonial-carousel2 .testimonial-block {
  border-left: 0.25rem solid <?php echo esc_attr($link_color); ?>;
}
#testimonial-carousel2 .testimonial-block:before {
  border-top: 1.5625rem solid <?php echo esc_attr($link_color); ?>;
}

/*--------------------------------------------------------------
 27.0 header variation Layout2 , header variation Layout3
--------------------------------------------------------------*/
.site-info .custom-social-icons li > a:hover, .site-info .custom-social-icons li > a:focus {
  color: <?php echo esc_attr($link_color); ?>;
}
.btn-style-two:hover, .btn-style-two:focus{
  color: <?php echo esc_attr($link_color); ?>;
}
.layout2 .head-contact-info li a:hover, .layout2 .head-contact-info li a:focus {  color: <?php echo esc_attr($link_color); ?>;}
.layout3 .contact-icon i {
  color: <?php echo esc_attr($link_color); ?>;
}
.layout2 a.text-dark:focus,.layout2 a.text-dark:hover,
.layout3 a.text-dark:focus,.layout3 a.text-dark:hover{
  color: <?php echo esc_attr($link_color); ?> !important;
}
.layout2.navbar .options-box .nav-search a:hover,
.layout2.navbar .options-box .cart-header > a.cart-icon:hover,
.layout2.navbar .options-box .nav-search a:focus,
.layout2.navbar .options-box .cart-header > a.cart-icon:focus,
.layout3.navbar .options-box .nav-search a:hover,
.layout3.navbar .options-box .cart-header > a.cart-icon:hover,
.layout3.navbar .options-box .nav-search a:focus,
.layout3.navbar .options-box .cart-header > a.cart-icon:focus{
  color: <?php echo esc_attr($link_color); ?>;
}

/* ================= 28.0 Contact Page , Contact Page4 =========*/
.contact-section .contact-info-outer{background-color: <?php echo esc_attr($link_color); ?>;}
.contact-section .contact-form .subtitle{color:<?php echo esc_attr($link_color); ?>;}
.contact-section .contact-form button,
.contact-section .contact-form input[type="button"],
.contact-section .contact-form input[type="submit"]{
  color: <?php echo esc_attr($link_color); ?>;
}
.conatct-page4.contact-info .contact-icon i{
  color: <?php echo esc_attr($link_color); ?>;
}
.conatct-page4.contact-info .contact-widget:hover, .conatct-page4.contact-info .contact-widget:focus {
  background-color: <?php echo esc_attr($link_color); ?>;
}
/* ==================== 28.0 Breadcrumnb ======================*/
.page-title-section .page-title h1 {
  color: <?php echo esc_attr($link_color); ?>;
}
.page-breadcrumb span { color:<?php echo esc_attr($link_color); ?>; }
.page-breadcrumb span a:hover, .page-breadcrumb span a:focus{ color:<?php echo esc_attr($link_color); ?>;}
.page-breadcrumb .icon::before{
  color: <?php echo esc_attr($link_color); ?>;
}
/* ==================== 29.0 Pagination ======================*/
.pagination a.active,.woocommerce .woocommerce-pagination .page-numbers.current {
  background-color: <?php echo esc_attr($link_color); ?>;
  border-color: <?php echo esc_attr($link_color); ?>;
}
.pagination a:before,.woocommerce .woocommerce-pagination li a:before{
  background-color: <?php echo esc_attr($link_color); ?>;
}
.about-section .section-header .section-subtitle{color:<?php echo esc_attr($link_color); ?>;}
.about-section .about-area .title a:hover, .about-section .about-area .title a:focus{ color:<?php echo esc_attr($link_color); ?>;}

/* ===============  31.0  Error 404 page =====================*/
.error-page .title {
  color: <?php echo esc_attr($link_color); ?>;
}
/* ==================== Smartmenus Navbar ======================*/
.navbar .nav .nav-item .nav-link:hover,
.navbar .nav .nav-item .nav-link:focus,
.navbar .nav .nav-item.active .nav-link,
.navbar .nav .dropdown-item.active, 
.navbar .nav .dropdown-item:active,
.navbar .nav .dropdown-item:hover,
.navbar .nav .dropdown-item:focus {
    color: <?php echo esc_attr($link_color); ?>;
}
.dropdown-item.active, .dropdown-item:active,.dropdown-item:hover ,.dropdown-item:focus {
    background-color: transparent;
    color:<?php echo esc_attr($link_color); ?>;
}
.services5 .post-thumbnail i.fa {
    background: <?php echo esc_attr($link_color); ?>;
}
.services5 .post:hover .post-thumbnail i.fa {
    color: <?php echo esc_attr($link_color); ?>;
}
.services5 .post:hover {
    background: <?php echo esc_attr($link_color); ?>;
}
.cta_content .btn-light{background-color: <?php echo esc_attr($link_color); ?>;}
.cta_content .btn-light:hover,.cta_content .btn-light:focus {background-color: #ffffff; color: <?php echo esc_attr($link_color); ?>;}
.entry-date a:hover span, .entry-date a:focus span{
    background-color: <?php echo esc_attr($link_color); ?>;
    color: #ffffff;
}
.site-footer .subscribe-form .btn-default, 
.site-footer .subscribe-form .btn-default:hover,
.site-footer .subscribe-form .btn-default:focus {
    color: #ffffff;
    background: <?php echo esc_attr($link_color); ?>;
}
.about-section .about-area .about-icon {
    color: <?php echo esc_attr($link_color); ?>;
}
.footer-sidebar .wp-block-search .wp-block-search__button, .sidebar .wp-block-search .wp-block-search__button{
    background-color: <?php echo esc_attr($link_color); ?>;
}
.sidebar .wp-block-search .wp-block-search__label:before,
.sidebar .widget.widget_block h1:before,
.sidebar .widget.widget_block h2:before,
.sidebar .widget.widget_block h3:before,
.sidebar .widget.widget_block h4:before,
.sidebar .widget.widget_block h5:before,
.sidebar .widget.widget_block h6:before {    
    background-color: <?php echo esc_attr($link_color); ?>;    
}

.sidebar .wp-block-search .wp-block-search__label:after,
.sidebar .widget.widget_block h1:after,
.sidebar .widget.widget_block h2:after,
.sidebar .widget.widget_block h3:after,
.sidebar .widget.widget_block h4:after,
.sidebar .widget.widget_block h5:after,
.sidebar .widget.widget_block h6:after {
    background-color: <?php echo esc_attr($link_color); ?>;
}

.sidebar .widget .wp-block-tag-cloud a:hover ,
.sidebar .widget .wp-block-tag-cloud a:focus ,
.footer-sidebar .widget .wp-block-tag-cloud a:hover ,
.footer-sidebar .widget .wp-block-tag-cloud a:focus {background-color: <?php echo esc_attr($link_color); ?>;}
.sidebar .wp-block-search .wp-block-search__button {
    background-color: <?php echo esc_attr($link_color); ?>;
}
@media (min-width: 992px) {
  
    .navbar4 .header-lt::before {
        background-color: <?php echo esc_attr($link_color); ?>;        
    }
    .navbar4 .header-lt::after {        
        background-color: <?php echo esc_attr($link_color); ?>;
    }
}
@media (max-width: 991px) {
  .navbar4 .header-lt {
      background-color: <?php echo esc_attr($link_color); ?>;
  }
}
.navbar.navbar6 .nav .nav-item .nav-link:hover, 
.navbar.navbar6 .nav .nav-item .nav-link:focus, 
.navbar.navbar6 .nav .nav-item.active .nav-link, 
.navbar.navbar6 .nav .nav-item:hover .nav-link, 
.navbar.navbar6 .nav .nav-item .nav-link:focus {
    background: <?php echo esc_attr($link_color); ?>;
}
.navbar.navbar6 .nav .nav-item.active .nav-link {
    background-color: <?php echo esc_attr($link_color); ?>;
}
.navbar .bg-light{
background-color: <?php echo esc_attr($link_color); ?> !important;
}
.navbar-nav:not(.sm-collapsible) .sm-nowrap > li.show > .dropdown-item,
.navbar-nav:not(.sm-collapsible) .sm-nowrap > li.current_page_parent > .dropdown-item,
.navbar-nav .current_page_ancestor .nav-link,
.navbar-nav:not(.sm-collapsible) .sm-nowrap > li.show > .dropdown-item.text-dark:hover  {
  color:<?php echo esc_attr($link_color); ?> !important;
}
.portfolio .md-pills .nav-link.active,
.portfolio .md-pills .nav-link:hover,
.portfolio .md-pills .nav-link:focus{
    background-color: <?php echo esc_attr($link_color); ?>;
}
.woocommerce-info{
    border-top-color: <?php echo esc_attr($link_color); ?>;
}
.woocommerce-info::before {
   color: <?php echo esc_attr($link_color); ?>;
}
.woocommerce .widget_price_filter .ui-slider .ui-slider-range{
  color: <?php echo esc_attr($link_color); ?>;
}

.woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span:hover {
    background-color: <?php echo esc_attr($link_color); ?>;
}
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce ul.products li.product .button, 
.woocommerce div.product form.cart .button,
.woocommerce .widget_price_filter .price_slider_amount .button,
.woocommerce a.button.alt,.woocommerce .coupon .button:hover,.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,.woocommerce button.button.alt,.woocommerce #review_form #respond .form-submit input,
.woocommerce .woocommerce-message .button,.woocommerce a.button, .woocommerce a.button:hover {
   background-color: <?php echo esc_attr($link_color); ?>;
}

.woocommerce ul.products li.product .price ins, 
.woocommerce div.product p.price ins, 
.woocommerce ul.products li.product .price .woocommerce-Price-amount.amount, 
.woocommerce .variations td.label, 
.woocommerce .woocommerce-ordering select, 
.woocommerce-cart table.cart td.actions .coupon .input-text, 
.select2-container .select2-choice{
  color:<?php echo esc_attr($link_color); ?> ;
}
.woocommerce nav.woocommerce-pagination ul li a:before {
   background-color: <?php echo esc_attr($link_color); ?>;
}
.page-numbers.current {
  background-color: <?php echo esc_attr($link_color); ?>;
  color: #fff;
}
.navbar .nav .nav-item:hover .nav-link, .navbar .nav .nav-item.active .nav-link,body .navbar .nav .dropdown-menu > li.active > a, .navbar .nav .nav-item.current_page_parent .nav-link {
    color: <?php echo esc_attr($link_color); ?>;
}
blockquote {
    border-left: 0.1875rem solid <?php echo esc_attr($link_color); ?>;
}
@media (max-width: 600px) {
.page-section-space.page .alignleft {
    float: initial;
}
}

.not-found-btn .btn-small {
    background-color: #ffffff;
    color: <?php echo esc_attr($link_color); ?>;
    border: 1px solid <?php echo esc_attr($link_color); ?>;
}
.not-found-btn .btn-small:hover,
.not-found-btn .btn-small:focus {
    background-color: <?php echo esc_attr($link_color); ?>;
    color: #ffffff;
    border: 1px solid <?php echo esc_attr($link_color); ?>;
}
.woocommerce-loop-product__title:hover{
color: <?php echo esc_attr($link_color); ?>;
}
        </style>
        <?php
    endif;
}
?>