jQuery(document).ready(function($) {

	/* Move widgets to general settings panel */
	wp.customize.section( 'sidebar-widgets-featured-area' ).panel( 'general_settings' );
    wp.customize.section( 'sidebar-widgets-featured-area' ).priority( '15' ); 

	$( 'input[name=chic-lite-flush-local-fonts-button]' ).on( 'click', function( e ) {
        var data = {
            wp_customize: 'on',
            action: 'chic_lite_flush_fonts_folder',
            nonce: chic_lite_cdata.flushFonts
        };  
        $( 'input[name=chic-lite-flush-local-fonts-button]' ).attr('disabled', 'disabled');

        $.post( ajaxurl, data, function ( response ) {
            if ( response && response.success ) {
                $( 'input[name=chic-lite-flush-local-fonts-button]' ).val( 'Successfully Flushed' );
            } else {
                $( 'input[name=chic-lite-flush-local-fonts-button]' ).val( 'Failed, Reload Page and Try Again' );
            }
        });
    });

});

( function( api ) {

	// Extends our custom "example-1" section.
	api.sectionConstructor['chic-lite-pro-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );