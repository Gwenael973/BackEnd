<?php
/**
 * Active Callback for customizer settings
 *
 * @package WPKites Theme
*/

// callback function for the page title
function wpkites_page_title_callback($control) {
    if (false == $control->manager->get_setting('enable_page_title')->value()) {
        return false;
    } else {
        return true;
    }
}

//callback function for the breadcrumbs section
function wpkites_breadcrumb_section_callback($control) {
    if (false == $control->manager->get_setting('banner_enable')->value()) {
        return false;
    } else {
        return true;
    }
}