<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpkites
 */
if ( ! function_exists( 'wpkites_plus_activate' ) ):
	do_action('wpkites_footer_section_hook');
else:
	do_action('wpkites_plus_footer_section_hook');
endif;

global $template;
if(basename($template) == 'template-business.php'): ?>                
    </div>
<?php endif; ?>
</div>
<?php wp_footer(); ?>	
</body>
</html>