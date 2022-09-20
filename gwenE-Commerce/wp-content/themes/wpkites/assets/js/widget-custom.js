(function ($){
jQuery(window).on('load', function() {
	/* Preloader */
      
         setTimeout(function(){
            jQuery('body').addClass('loaded');
          }, 1500);
    
       jQuery('<div class="section-separator">').insertAfter(".sidebar .wp-block-search .wp-block-search__label,.sidebar .widget.widget_block h1,.sidebar .widget.widget_block h2,.sidebar .widget h2,.sidebar .widget.widget_block h3,.sidebar .widget.widget_block h4,.sidebar .widget.widget_block h5,.sidebar .widget.widget_block h6");
});

	}(jQuery));	