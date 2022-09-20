<?php
/**
 * Getting started template
 */
$wpkites_name = wp_get_theme();
?>
<div id="getting_started" class="wpkites-tab-pane active">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="wpkites-info-title text-center"><?php 
					/* translators: %s: theme name */
					printf( esc_html__('%s Theme Configuration','wpkites'), $wpkites_name ); ?></h1>
			</div>
		</div>
		<div class="row" style="margin-top: 20px;">

			<div class="col-md-12">
			    <div class="wpkites-page" style="border: none;box-shadow: none;">
					<div class="mockup">
			    		<img src="<?php echo esc_url(WPKITES_TEMPLATE_DIR_URI.'/admin/assets/img/mockup-lite.png');?>"  width="100%">
			    	</div>
				</div>	
			</div>	

		</div>
		
		<div class="row" style="margin-top: 20px;">
			<div class="col-md-6"> 
				<div class="wpkites-page">
					<div class="wpkites-page-top"><?php 
						/* translators: %s: theme name */
						printf( esc_html__( 'Additional features in %s Plus', 'wpkites' ), $wpkites_name ); ?></div>
					<div class="wpkites-page-content">
						<ul class="wpkites-page-list-flex">
							<li>
								<?php echo esc_html__('Unlimited Slides','wpkites'); ?>
							</li>
							<li>
								<?php echo esc_html__('Unlimited Services','wpkites'); ?>
							</li>					
							<li>
								<?php echo esc_html__('Header Presets','wpkites'); ?>
							</li>
							<li>
								<?php echo esc_html__('Portfolio Section','wpkites'); ?>
							</li>
							<li>
								<?php echo esc_html__('Funfact Section','wpkites'); ?>
							</li>
							<li>
								<?php echo esc_html__('Client Section','wpkites'); ?>
							</li>
							<li>
								<?php echo esc_html__('Multiple Blog Templates','wpkites'); ?>
							</li>
							<li>
								<?php echo esc_html__('Predefined Color Schemes','wpkites'); ?>
							</li>
							<li>
								<?php echo esc_html__('Multiple Preloader Designs','wpkites'); ?>
							</li>
							<li>
								<?php echo esc_html__('Multiple Search Effects','wpkites'); ?>
							</li>
							<li>
								<?php echo esc_html__('Post Navigation Styles','wpkites'); ?>
							</li>						
							<li>
								<?php echo esc_html__('WPML Support','wpkites'); ?>
							</li>
							
							<li>
								<?php echo esc_html__('Drag and Drop Section Orders','wpkites'); ?>
							</li>
							
							<li>
								<?php echo esc_html__('Team Section With Grid Effect','wpkites'); ?>
							</li>
							
							<li>
								<?php echo esc_html__('Shop Section With Unlimited Items','wpkites'); ?>
							</li>
							<li>
								<?php echo esc_html__('Shop Section With Carousel Effect','wpkites'); ?>
							</li>
							<li>
								<?php echo esc_html__('Testimonial Section With Grid Effect','wpkites'); ?>
							</li>
							<li>
								<?php echo esc_html__('Homepage Sections Before/After Hooks','wpkites'); ?>
							</li>
							
							<li>
								<?php echo esc_html__('Homepage Sections Shortcode','wpkites'); ?>
							</li>
							
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-6"> 
				<div class="wpkites-page">
					<div class="wpkites-page-top"><?php esc_html_e( 'Links to Customizer Settings', 'wpkites' ); ?></div>
					<div class="wpkites-page-content">
						<ul class="wpkites-page-list-flex">
							<li>
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=title_tagline' ) ); ?>" target="_blank"><?php esc_html_e('Site Logo','wpkites'); ?></a>
							</li>
							<li>
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=wpkites_theme_panel' ) ); ?>" target="_blank"><?php esc_html_e('Blog Options','wpkites'); ?></a>
							</li>
							 <li>
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=widgets' ) ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','wpkites'); ?></a>
							</li>
							<li>
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=section_settings' ) ); ?>" target="_blank"><?php esc_html_e('Homepage Sections','wpkites'); ?></a>
							</li>
							<li>
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=wpkites_general_settings' ) ); ?>" target="_blank"><?php esc_html_e('General Settings','wpkites'); ?></a>
							</li>
							<li>
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=colors_back_settings' ) ); ?>" target="_blank"><?php esc_html_e('Colors & Background','wpkites'); ?></a>
							</li>
							<li>
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=wpkites_typography_setting' ) ); ?>" target="_blank"><?php esc_html_e('Typography Settings','wpkites'); ?></a>
							</li>
							<li>
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=theme_style' ) ); ?>" target="_blank"><?php esc_html_e('Theme Style Settings','wpkites'); ?></a>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="wpkites-page">
					<div class="wpkites-page-top"><?php esc_html_e( 'Useful Links', 'wpkites' ); ?></div>
					<div class="wpkites-page-content">
						<ul class="wpkites-page-list-flex">
							<li>
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url('https://wpkites.spicethemes.com/'); ?>" target="_blank"><?php 
									/* translators: %s: theme name */
									printf ( esc_html__('%s Demo','wpkites'), $wpkites_name ); ?></a>
							</li>
							<li>
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url('https://wpkites-pro.spicethemes.com/'); ?>" target="_blank"><?php 
									/* translators: %s: theme name */
									printf ( esc_html__('%s Plus Demo','wpkites'), $wpkites_name ); ?></a>
							</li>

							<li>
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url('https://wordpress.org/support/theme/wpkites/'); ?>" target="_blank"><?php 
									/* translators: %s: theme name */
									printf ( esc_html__('%s Theme Support','wpkites'), $wpkites_name ); ?></a>
							</li>
														
						    <li> 
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url('https://wordpress.org/support/theme/wpkites/reviews/#new-post'); ?>" target="_blank"><?php echo esc_html__('Your feedback is valuable to us','wpkites'); ?></a>
							</li>
							
							<li>
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/wpkites-plus'); ?>" target="_blank"><?php 
									/* translators: %s: theme name */
									printf ( esc_html__('%s Plus Details','wpkites'), $wpkites_name ); ?></a>
							</li>
							
						    <li> 
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/contact/'); ?>" target="_blank"><?php echo esc_html__('Pre-sales enquiry','wpkites'); ?></a>
							</li> 

							<li> 
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/wpkites-free-vs-plus/'); ?>" target="_blank"><?php echo esc_html__('Free vs Plus','wpkites'); ?></a>
							</li> 

							<li> 
								<a class="wpkites-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/wpkites-changelog/'); ?>" target="_blank"><?php echo esc_html__('Changelog','wpkites'); ?></a>
							</li> 
						</ul>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>