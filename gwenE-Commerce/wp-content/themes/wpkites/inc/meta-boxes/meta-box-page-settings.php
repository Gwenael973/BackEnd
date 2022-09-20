<?php
$wpkites_site_layout = get_post_meta( get_the_ID(), 'wpkites_site_layout', true );
$wpkites_page_sidebar = get_post_meta( get_the_ID(), 'wpkites_page_sidebar', true );

	$wpkites_sidebar_layout_choices = apply_filters(
								'wpkites_layout_choices',
								array(
									'wpkites_site_layout_left' => array(
										'label' => '',
										'url'   => WPKITES_TEMPLATE_DIR_URI . '/assets/images/left.jpg',
									),
									'wpkites_site_layout_right' => array(
										'label' => '',
										'url'   => WPKITES_TEMPLATE_DIR_URI . '/assets/images/right.jpg',
									),
									'wpkites_site_layout_without_sidebar' => array(
										'label' => '',
										'url'   => WPKITES_TEMPLATE_DIR_URI . '/assets/images/full.jpg',
									),
									'wpkites_site_layout_stretched' => array(
										'label' => '',
										'url'   => WPKITES_TEMPLATE_DIR_URI . '/assets/images/stretched.jpg',
									),
								)
							);

	$wpkites_sidebar_layout_choices = array(
								'' => array(
									'label' => '',
									'url'   => WPKITES_TEMPLATE_DIR_URI . '/inc/meta-boxes/customizer.png',
								),
							) + $wpkites_sidebar_layout_choices; ?>


<table class="form-table">
	<tbody>
		<tr>
			<th><label for="wpkites_site_layout"><?php echo esc_html__('Layout','wpkites'); ?></label></th>
			<td><?php foreach ( $wpkites_sidebar_layout_choices as $layout_id => $value ) : ?>
			<label class="tg-label">
				<input type="radio" class="wpkites_site_layout" name="wpkites_site_layout" value="<?php echo esc_attr( $layout_id ); ?>" <?php checked( $wpkites_site_layout, $layout_id ); ?> />
				<img src="<?php echo esc_url( $value['url'] ); ?>"/>
			</label>
			<?php endforeach; ?>
			</td>	
		</tr>
		<tr>
			<th><label for="seo_tobots"><?php echo esc_html__('Sidebar','wpkites'); ?></label></th>
			<td>
				<select id="wpkites_page_sidebar" name="wpkites_page_sidebar">
					<option value="sidebar-1" <?php selected( 'sidebar-1', $wpkites_page_sidebar ); ?>><?php echo esc_html__('Primary','wpkites'); ?></option>
					<option value="footer-sidebar-1" <?php selected( 'footer-sidebar-1', $wpkites_page_sidebar ); ?> ><?php echo esc_html__('Footer 1','wpkites'); ?></option>
					<option value="footer-sidebar-2" <?php selected( 'footer-sidebar-2', $wpkites_page_sidebar ); ?> ><?php echo esc_html__('Footer 2','wpkites'); ?></option>
					<option value="footer-sidebar-3" <?php selected( 'footer-sidebar-3', $wpkites_page_sidebar ); ?> ><?php echo esc_html__('Footer 3','wpkites'); ?></option>
					<option value="footer-sidebar-4" <?php selected( 'footer-sidebar-4', $wpkites_page_sidebar ); ?> ><?php echo esc_html__('Footer 4','wpkites'); ?></option>
					<option value="woocommerce" <?php selected( 'woocommerce', $wpkites_page_sidebar ); ?> ><?php echo esc_html__('WooCommerce sidebar','wpkites'); ?></option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>
<?php