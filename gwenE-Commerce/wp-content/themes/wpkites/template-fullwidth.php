<?php
/**
 * Template Name: Full Width Page
 *
 * @package wpkites
 */
get_header();
wpkites_breadcrumbs();
?>
<section class="page-section-space page" id="content">
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
	     	<div class="col-lg-12 col-md-12 col-sm-12">
            	<?php
             	while ( have_posts()):
            	the_post();
             		get_template_part('template-parts/content','page');
             		if ( comments_open() || get_comments_number() ) :
					comments_template();
					endif;
             	endwhile;
             	?>
			</div>
		</div>
	</div>
</section>
<?php get_footer();?>