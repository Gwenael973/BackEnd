<?php //Pro Details
function wpkites_pro_feature_customizer( $wp_customize ) {
    class WP_Pro_Feature_Customize_Control extends WP_Customize_Control {
        public $type = 'new_menu';
        /**
        * Render the control's content.
        */
        public function render_content() {
        ?>
        <div class="wpkites-pro-features-customizer">
            <ul class="wpkites-pro-features">
                <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Advanced Hook Settings','wpkites'  ); ?>
                </li>
                <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Multiple Blog Templates','wpkites'  ); ?>
                </li>   
                <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Portfolio Management','wpkites'  ); ?>
                </li>
                <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Slide Variations','wpkites'  ); ?>
                </li>
              <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Create Unlimited Services','wpkites'  ); ?>
                </li>
                 <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Callout Section','wpkites'  ); ?>
                </li>
              <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Manage Contact Details','wpkites'  ); ?>
                </li>
                <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Testimonial Variations','wpkites'  ); ?>
                </li>
                <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Client Section','wpkites'  ); ?>
                </li>
              <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Team Variations','wpkites'  ); ?>
                </li>
              <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Custom Color Schemes','wpkites'  ); ?>
                </li>
              <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Section Reordering','wpkites'  ); ?>
                </li>
                <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Sections Shortcode','wpkites'  ); ?>
                </li>
                <li>
                    <span class="wpkites-pro-label"><?php esc_html_e( 'PRO','wpkites'  ); ?></span>
                    <?php esc_html_e( 'Quality Support','wpkites'  ); ?>
                </li>
            </ul>
            <a target="_blank" href="<?php echo esc_url('https://spicethemes.com/wpkites-plus');?>" class="wpkites-pro-button button-primary"><?php esc_html_e( 'UPGRADE TO PRO','wpkites'  ); ?></a>
            <hr>
        </div>
        <?php
        }
    }
    $wp_customize->add_section( 'wpkites_pro_feature_section' , array(
    		'title'      => esc_html__('View PRO Details', 'wpkites' ),
    		'priority'   => 1,
       	) );
    $wp_customize->add_setting(
        'upgrade_pro_feature',
        array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )	
    );
    $wp_customize->add_control( new WP_Pro_Feature_Customize_Control( $wp_customize, 'upgrade_pro_feature', array(
    		'section' => 'wpkites_pro_feature_section',
    		'setting' => 'upgrade_pro_feature',
        ))
    );
    class WP_Feature_Document_Customize_Control extends WP_Customize_Control {
        public $type = 'new_menu';
        /**
        * Render the control's content.
        */
        public function render_content() {
        ?>
       
         <div class="wpkites-pro-content">
            <ul class="wpkites-pro-des">
                    <li> <?php esc_html_e('With individual hook settings, you can insert html or php code according to your needs.','wpkites' );?></li>
                    <li> <?php esc_html_e('Theme comes with multiple blog templates like blog full-width, grid blog, switcher blog, etc.','wpkites' );?></li>
                    <li> <?php esc_html_e('Create a professional-looking portfolio.','wpkites' );?></li>
                    <li> <?php esc_html_e('PRO version comes with slide variation options, so you can adjust your content through text alignment.','wpkites' );?></li>
                    <li> <?php esc_html_e('Add as many services as you like. You can even display each service on a separate page.','wpkites' );?></li>       
                    <li> <?php esc_html_e('Theme comes with a beautifully designed section where you can manage your contact details.','wpkites' );?></li>
                    <li> <?php esc_html_e('Show all your team members, clients, testimonials on front page.','wpkites' );?></li>
                    <li> <?php esc_html_e('You can select amongst predefined color skins, or you can create your own without writing any CSS code.','wpkites' );?></li>
                    <li> <?php esc_html_e('The layout manager will help you rearrange all sections.','wpkites' );?></li>
                    <li> <?php esc_html_e('Translation-ready, the theme supports popular plugins WPML and Polylang.','wpkites' );?></li>
                    <li> <?php esc_html_e('The theme comes with a homepage sections shortcode used to add the homepage sections in other pages with any combination.','wpkites' );?></li>
                    <li> <?php esc_html_e('Dedicated support, widget and sidebar management.','wpkites' );?></li>
                </ul>
         </div>
        <?php
        }
    }

    $wp_customize->add_setting(
        'wpkites_pro_feature',
        array(
            'capability'     => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )	
    );
    $wp_customize->add_control( new WP_Feature_Document_Customize_Control( $wp_customize, 'wpkites_pro_feature', array(	
    		'section' => 'wpkites_pro_feature_section',
    		'setting' => 'wpkites_pro_feature',
        ))
    );

}
add_action( 'customize_register', 'wpkites_pro_feature_customizer' ); ?>