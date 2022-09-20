<nav class="navbar navbar-expand-lg navbar-light custom <?php if(get_theme_mod('sticky_header_enable',false)===true):?>header-sticky<?php endif;?>">
	<div class="container">
		<?php the_custom_logo();
		$wpkites_header_text = get_theme_mod('header_text',true);
		if ( $wpkites_header_text==true ) :
			if((get_option('blogname')!='') || (get_option('blogdescription')!='')): ?>		
				<div class="custom-logo-link-url"> 
					<h2 class="site-title"><a class="site-title-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			    	</h2>
			    <?php
					$wpkites_description = get_bloginfo( 'description', 'display' );
					if(get_option('blogdescription')!='') {
						if ( $wpkites_description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $wpkites_description; ?></p>
						<?php endif;
					} ?>
				</div>
		<?php endif; endif; ?>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'wpkites' ); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<div class="<?php echo (!is_rtl()) ? "ml-auto" : "mr-auto"; ?>">
			<?php 
			$wpkites_shop_button = '<ul class="nav navbar-nav mr-auto">%3$s';
			   //Hence This condition only work when woocommerce plugin will be activate
		    if(get_theme_mod('after_menu_btn_new_tabl',false)==true) { $wpkites_target="_blank";}
		 	else { $wpkites_target="_self"; }
		 	if((get_theme_mod('after_menu_btn_txt')!='') && (get_theme_mod('after_menu_multiple_option')=='menu_btn')):
          		$wpkites_shop_button .= '<li class="nav-item menu-item main-header-btn "><div class="btn-box"><a target='.esc_attr($wpkites_target).' class="theme-btn wpkites_header_btn btn-style-one wpkites_header_btn" href='.esc_url(get_theme_mod('after_menu_btn_link','#')).'><span class="txt">'.esc_html(get_theme_mod('after_menu_btn_txt')).'</span></a></div>';
        	endif;
        	if((get_theme_mod('after_menu_btn_txt')!='') && (get_theme_mod('after_menu_multiple_option')=='html')):
         		$wpkites_shop_button .= '<li class="nav-item html menu-item 2">'.get_theme_mod('after_menu_html'); 
        	endif;
			if(get_theme_mod('search_btn_enable',false)==true) { $wpkites_header_border='search_exists'; } 
			else { $wpkites_header_border='shop_exists';} 
			$wpkites_shop_button .= '<li class="nav-item"><div class="'.$wpkites_header_border.' header-module">';
		   
		   //Hence This condition only work when woocommerce plugin will be activate
			if(get_theme_mod('search_btn_enable',false)==true){
		    $wpkites_shop_button .= '<div class="nav-search nav-light-search wrap">
		                           			<div class="search-box-outer">
	                            				<div class="dropdown">
                  									<a href="#" title="'.esc_attr__('Search','wpkites').'" class="search-icon condition has-submenu" aria-haspopup="true" aria-expanded="false">
               										<i class="fa fa-search"></i>
             										<span class="sub-arrow"></span></a>
             										<ul class="dropdown-menu pull-right search-panel"  role="group" aria-hidden="true" aria-expanded="false">
                             							<li class="panel-outer">
                             								<div class="form-container">
                               									 <form role="'.esc_attr('Search','wpkites').'" method="get" class="search-form" action="'.esc_url( home_url( '/' )).'">
                                									 <label>
                                  										<input type="search" class="search-field" placeholder="'.esc_attr__('Search','wpkites').'" value="" name="s" autocomplete="off">
                                 									 </label>
                                 									<input type="submit" class="search-submit" value="'.esc_attr__('Search','wpkites').'">
                                								 </form>                   
                               								</div>
                             							</li>
                           							</ul>
	                       						</div>
		                     				</div>
		                   				</div>';
		                   			}
			   if ( class_exists( 'WooCommerce' ) ) {
			   		if(get_theme_mod('cart_btn_enable',false)==true ){		   	  
					   $wpkites_shop_button .='<div class="cart-header">';
					      global $woocommerce; 
					      $wpkites_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
					      $wpkites_shop_button .= '<a class="cart-icon" href="'.esc_url($wpkites_link).'" >';
					      
					      if ($woocommerce->cart->cart_contents_count == 0){
					          $wpkites_shop_button .= '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
					        }
					        else
					        {
					          $wpkites_shop_button .= '<i class="fa fa-cart-plus" aria-hidden="true"></i>';
					        }
					           
					        $wpkites_shop_button .= '</a>';

					        /* translators: %d: count for number of products in cart */
					        $wpkites_shop_button .= '<a class="cart-total" href="'.esc_url($wpkites_link).'" ><span>'.sprintf(_n('%d <span>item</span>', '%d <span>items</span>', $woocommerce->cart->cart_contents_count, 'wpkites' ), $woocommerce->cart->cart_contents_count).'</span></a>';

					    }
					}
				$wpkites_shop_button .= '</li></div>';
			   $wpkites_shop_button .= '</ul>'; 
			   $wpkites_menu_class='';
			    wp_nav_menu( array
			             (
			             'theme_location'=> 'wpkites-primary', 
			             'menu_class'    => 'nav navbar-nav mr-auto '.$wpkites_menu_class.'',
			             'items_wrap'    => $wpkites_shop_button,
			             'fallback_cb'   => 'WPKites_fallback_page_menu',
			             'walker'        => new WPKites_Nav_Walker()
			             )); ?>
	        </div>
		</div>
</nav>