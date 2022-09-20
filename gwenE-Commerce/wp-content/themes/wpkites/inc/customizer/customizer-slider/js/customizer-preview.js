jQuery( document ).ready(function($) {
	// Change the width of logo
	wp.customize('wpkites_logo_length', function(control) {
		control.bind(function( controlValue ) {
			$('.custom-logo').css('max-width', '500px');
			$('.custom-logo').css('width', controlValue + 'px');
			$('.custom-logo').css('height', 'auto');
		});
	});

	// Change button border radius
	wp.customize('after_menu_btn_border', function(control) {
		control.bind(function( borderRadius ) {
		$('.wpkites_header_btn').css('border-radius', borderRadius + 'px');
			
		});
	});

	// Change container width
	wp.customize('container_width', function(control) {
		control.bind(function( containerWidth ) {
		$('#content .container:not(.page-section-space.stretched .container)').css('max-width', containerWidth + 'px');
		$("#content .site-footer .container").css('max-width','1140px');
			
		});
	});

	// Change content width
	wp.customize('content_width', function(control) {
		
		control.bind(function( contentWidth ) {
			$('body .page-section-space .row .col-lg-8, body .page-section-space .row .col-md-7, body.woocommerce-page .section-space .row .col-lg-8, body.woocommerce-page .section-space .row .col-md-8, body.woocommerce-page .page-section-space .row .col-lg-8, body.woocommerce-page .page-section-space .row .col-md-8').css('max-width', contentWidth + '%');
			$('body .page-section-space .row .col-lg-8, body .page-section-space .row .col-md-7, body.woocommerce-page .page-section-space .row .col-lg-8, body.woocommerce-page .page-section-space .row .col-md-8').css('flex', contentWidth + '%');
		});

	});

	// Change sidebar width
	wp.customize('sidebar_width', function(control) {
		
		control.bind(function( sidebarWidth ) {
			$('body .page-section-space .row .col-lg-4, body .page-section-space .row .col-md-5, body.woocommerce-page .section-space .row .col-lg-4, body.woocommerce-page .section-space .row .col-md-4, body.woocommerce-page .page-section-space .row .col-lg-4, body.woocommerce-page .page-section-space .row .col-md-4').css('max-width', sidebarWidth + '%');
			$('body .page-section-space .row .col-lg-4, body .page-section-space .row .col-md-5, body.woocommerce-page .section-space .row .col-lg-4, body.woocommerce-page .section-space .row .col-md-4, body.woocommerce-page .page-section-space .row .col-lg-4, body.woocommerce-page .page-section-space .row .col-md-4').css('flex', sidebarWidth + '%');
		});

	});

});