<?php
/**
 * Template Name: Stretched Width Page
 *
 * @package wpkites
 */
get_header();
wpkites_breadcrumbs();
?>
<section class="page-stretched-template page" id="content">
	<?php 
	if(get_theme_mod('breadcrumb_position','page_header')=='content_area'):
        if(!function_exists( 'wpkites_plus_activate' ) ):
            do_action('wpkites_breadcrumbs_page_title_hook');
        else:
            do_action('wpkites_plus_breadcrumbs_page_title_hook');
        endif;
    endif; 
    the_post();
    if(has_post_thumbnail())
    {
		if ( is_single() ) {
			the_post_thumbnail( '', array( 'class'=>'img-fluid','alt' => esc_attr( get_the_title() ) ) );
		}
		else
		{
			echo '<figure class="post-thumbnail" href="'.esc_url(get_the_permalink()).'">';
			the_post_thumbnail( '', array( 'class'=>'img-fluid','alt' => esc_attr( get_the_title() ) ) );
			echo '</figure>';
		}
	}
    the_content(); ?>
</section>
<?php get_footer();?>