// JavaScript Document
jQuery(document).ready(function($){
	var wphi_pro = (wphi_obj.wphi_pro=='yes');
	
	function parse_query_string(query) {
	  var vars = query.split("&");
	  var query_string = {};
	  for (var i = 0; i < vars.length; i++) {
		var pair = vars[i].split("=");
		// If first entry with this name
		if (typeof query_string[pair[0]] === "undefined") {
		  query_string[pair[0]] = decodeURIComponent(pair[1]);
		  // If second entry with this name
		} else if (typeof query_string[pair[0]] === "string") {
		  var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
		  query_string[pair[0]] = arr;
		  // If third or later entry with this name
		} else {
		  query_string[pair[0]].push(decodeURIComponent(pair[1]));
		}
	  }
	  return query_string;
	}		

	$('.wphi.wrap a.nav-tab').click(function(){
		$(this).siblings().removeClass('nav-tab-active');
		$(this).addClass('nav-tab-active');
		$('.nav-tab-content').hide();
		$('.nav-tab-content').eq($(this).index()).show();
		window.history.replaceState('', '', wphi_obj.this_url+'&t='+$(this).index());
		$('form input[name="wphi_tab"]').val($(this).index());
		$('.wrap.wphi').attr('class', 'wrap wphi tab-'+$(this).index());
	});	
	var query = window.location.search.substring(1);
	var qs = parse_query_string(query);		
	
	if(typeof(qs.t)!='undefined'){
		$('.wrap.wphi a.nav-tab').eq(qs.t).click();
		
	}
	
	$('body').on('click', '.wphi .wphi-settings h3', function(){
		var target = '.wphi .wphi-settings ul.menu-class.pages_'+$(this).attr('data-id');		
		
		if($(this).data('premium')!=true || wphi_pro){
		
			if(!$(target).is(':visible')){	
				$('.wphi .wphi-settings ul.menu-class').hide();
				$(target).fadeToggle();
			}else{
				$('.wphi .wphi-settings ul.menu-class').hide();
			}
		}
	});
	
	if ($('.wphi div.banner_wrapper').length > 0) {

		if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
			$('.wphi').on('click', 'div.banner_wrapper:not(.gluri_banner_wrapper)', function(e) {
				e.preventDefault();
				var no_slider = $(this).find('.wphi_no_slider');
				if(no_slider.length > 0){
					no_slider.show();
					return ;
				}
				
				$('.wphi_submit_btn').hide();
				
				var parent_obj = $(this).parent();
				var wphi_uid = parent_obj.data('uid');
				var wphi_type = parent_obj.data('type');
				
				$('input[name="hi_fields_focus"]').val(wphi_uid);
				parent_obj.find('.wphi_submit_btn').show();
				
				var id = $(this).find('.hi_vals');
				//console.log(wphi_type);
				//console.log(id.length);
				
				var img_placeholder = $(this).find('.wphi_header_image_placeholder');
				
				wp.media.editor.send.attachment = function(props, attachment) {


					var file_obj = attachment.url;
					var file = file_obj.split('/');
					file = file[file.length-1];	
					
					
					var ext_obj = file;
					var ext = ext_obj.split('.');
					ext = ext[ext.length-1];
					
				
					
					var is_image = (!$(id).parents().eq(1).hasClass('gluri_video_wrapper') && wphi_obj.video_extensions.indexOf(ext)<0);
					var is_video = ($(id).parents().eq(1).hasClass('gluri_video_wrapper') && wphi_obj.video_extensions.indexOf(ext)>=0);
					
					//console.log($(id).parents().eq(1));
					//console.log(is_image);
					//console.log(is_video);
					//console.log(ext);
					
					id.val(attachment.id);
					
					if(is_image){	
											
						img_placeholder.prop('src', attachment.url);
						img_placeholder.show();
						$(id).parent().attr('style', "background:url('"+attachment.url+"'); background-repeat:no-repeat;");						
					}
					
					if(is_video){
						$(id).parents().eq(1).find('span').html(file);
						
						switch(wphi_type){
							case 'default':
								// id.attr('name', 'header_videos['+wphi_type+']');
							break;
							default:
							// id.attr('name', 'header_videos['+wphi_type+']');
							break;
						}
					}
					
				};
				
				wp.media.editor.open($(this));
				return false;
			});			
		}
		
		
		
	};
	
	if ($('.wphi').length > 0) {
			setInterval(function(){
				wphi_methods.update_hi();
				//console.clear();
				
				
					
				
			}, 1000);
			
			if(wphi_obj.hi_fields_focus!=''){
				setTimeout(function(){
					
					$('li[data-uid="'+wphi_obj.hi_fields_focus+'"]').closest('ul').show();
					
					$([document.documentElement, document.body]).animate({
						scrollTop: $('li[data-uid="'+wphi_obj.hi_fields_focus+'"]').offset().top					
					}, 3000);
					
					
				}, 1000);
			}
	}
	
	$('.wphi').on('click', '.head_area a.how', function(){
		$('.wphi .head_area .pre, .wphi .head_area a.templates').toggle();
	});
	$('.wphi').on('click', '.head_area a.templates', function(){
		
		$(this).toggleClass('clicked');
		$('.wphi .head_area .pre, .wphi .head_area a.how').toggle();
		$('.wphi .shortcode_area, .wphi .templates_area').toggle();
		
		
		$(this).find('span').html($(this).find('span').html()!=$(this).data('close')?$(this).data('close'):$(this).data('text'));
		
		
	});	

	$('.wphi li a.wphi_clear_btn').on('click', function(){
		//console.log($(this));
		var parent_obj = $(this).parent();
		parent_obj.find('.hi_vals').val('');
		parent_obj.find('.banner_wrapper').removeAttr('style');
		parent_obj.find('.banner_wrapper span').hide();
		$('.wphi_submit_btn').hide();
		parent_obj.find('.wphi_submit_btn').show();
		var wphi_uid = parent_obj.data('uid');
		$('input[name="hi_fields_focus"]').val(wphi_uid);
	});
	
	$('.wphi form.templates ul li').on('click', function(){

		$('.wphi form.templates input[name="wphi_template"]').val($(this).data('id'));
		var selected_item = $(this).parent().find('.selected').data('id');
		$(this).parent().find('.selected').removeClass('selected');
		$(this).addClass('selected');
		switch($(this).data('id')){
			case "reset":
				if(selected_item!=$(this).data('id'))
				alert(wphi_obj.wphi_tempalte_reset);
			break;
			case "custom":
				if(selected_item!=$(this).data('id'))
				alert(wphi_obj.wphi_html_styles);
				
				$('.wphi_template_custom').fadeIn();
			break;
		}
		
	});
	
	$('h3[data-premium="true"]').on('click', function(e){
		e.preventDefault();
		if(!wphi_pro)
		alert(wphi_obj.wphi_premium_alert);
	});
	
	$('.wphi_submit_btn').on('click', function(){
		$('form#wphi-headers-section').submit();
	});

	function dom_row_hide_show(status = 'show'){

	    var input_rows = $('.wphi_dom_area table.form-table tr.input_row');

	    if(status == 'show'){

            input_rows.removeClass('dom_off');

//            input_rows.find('input').prop('readonly', false);
//            input_rows.find('select').prop('readonly', false);

	    }else{


            input_rows.addClass('dom_off');
//            input_rows.find('input').prop('readonly', true);
//            input_rows.find('select').prop('readonly', true);

	    }


	}


	$('body').on('change', '#wphi_dom_switch', function(e){

        var this_switch = $(this);


        if(this_switch.prop('checked')){

            dom_row_hide_show();


        }else{


           dom_row_hide_show('hide');


        }

	});




	$('[name="wphi_dom[type]"]').on('change', function(){

	    if($(this).val() == 'bg'){

            var placement_type_row = $("#wphi_placement_type").parents('tr:first').hide();

	    }else{

            var placement_type_row = $("#wphi_placement_type").parents('tr:first').show();


	    }


	});


	$('[name="wphi_dom[type]"]:checked').change();
    $('#wphi_dom_switch').change();

	
	$('.wphi .accordion').on('click', function(){

        var next_panel = $(this).next('.panel:first');
        var this_parent = $(this).parents('.accordion_wrapper:first');
		this_parent.find('.panel').not(next_panel).slideUp();
        $(this).next('.panel:first').slideDown();
	});

	$('.wphi_range').on('input', function(){

		var this_range = $(this);

		var input_number = $(this).parents('.wphi_form_group:first').find('input[type=number]');

		input_number.val(this_range.val());

	});

	$('.wphi_form_group input[type=number]').on('input', function(){

		var this_input = $(this);

		var range_slider = $(this).parents('.wphi_form_group:first').find('.wphi_range');

		range_slider.val(this_input.val());

	});



	$('.wp-core-ui .button.wphi-settings-button').on('click', function(e){
		e.preventDefault();

	});

	var sidebar_spinner = $('.wphi_sidebar .wphi_spinner');
	var wphi_done = $('.wphi_sidebar .wphi_done');

	$('.wphi_sidebar_update').on('click', function(e){

		e.preventDefault();

		var wphi_inputs = $('.wphi_sidebar .wphi_input');
		var wphi_sidebar_settings_obj = {};
		var error_array = [];

		$.each(wphi_inputs, function(){
			var consider = true;
			var input_name = $(this).prop('name');
			var required = $(this).prop('required');
			var value = $(this).val();
			
			switch($(this).attr('type')){
				case 'checkbox':
					if($(this).prop('checked')){
					
					}else{
						consider = false;
					}
				break;
			}

			var parent_group = $(this).parents('.wphi_form_group:first');
			var type = parent_group.find('a.suffix').data('value');

			if(required && value == ''){
				error_array.push(true);
			}
			if(consider){
				wphi_sidebar_settings_obj[input_name] = value;
				wphi_sidebar_settings_obj[input_name+'_type'] = type;
			}


		});

		if($.inArray(true, error_array) > -1){
			alert(wphi_obj.value_required);
			return;
		}
		wphi_done.hide();
		sidebar_spinner.css('display', 'inline-block');


		var data = {

			action : 'wphi_update_sidebar_settings',
			wphi_sidebar_settings : wphi_sidebar_settings_obj,
			wphi_nonce : wphi_obj.nonce,

		}

		$.post(ajaxurl, data, function(response){
			sidebar_spinner.css('display', 'none');
			if(response.status){

				wphi_done.css('display', 'inline-block');

				setTimeout(function(){
					wphi_done.hide();

				}, 3000);
			}

		});


	});

	$('body').on('click', '.wphi_form_group a.suffix', function(e){

		e.preventDefault();

		var suf_value = $(this).data('value');
		var parent_group = $(this).parents('.wphi_form_group:first');
		var range_input = parent_group.find('input[type="range"]');
		var number_input = parent_group.find('input[type="number"]');

		if(suf_value == 'px'){
			suf_value = '%';
			range_input.show();
			number_input.prop('max', '100');
			if(number_input.val() > 100){
				number_input.val(100);
				range_input.val(100);
			}


		}else{
			suf_value = 'px';
			range_input.hide();
			number_input.prop('max', '');
		}

		$(this).data('value', suf_value);
		$(this).html(suf_value);



	});

	
});
	
	function wphi_open_nav() {
		document.getElementById("wphi_sidebar_wrapper").style.width = "400px";
	}
	
	function wphi_close_nav() {
		document.getElementById("wphi_sidebar_wrapper").style.width = "0";
	}
		
							
	var wphi_methods = {
	
			update_hi: function(){
				jQuery.each(jQuery('.banner_wrapper .hi_vals'), function(){
					if(jQuery(this).val()>0){
						jQuery(this).parent().find('.dashicons').fadeIn();
					}else{
						jQuery(this).parent().find('.dashicons').fadeOut();
					}
				});
			}
	}

