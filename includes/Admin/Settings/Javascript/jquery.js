( function ( $ ) {
	const $jqueryCheckbox = $( '#settings_tester_jquery_javascript' );

	if ( $jqueryCheckbox.length ) {
		$jqueryCheckbox.on( 'change', function () {
			if ( $( this ).is( ':checked' ) ) {
				$( "label[for='settings_tester_jquery_javascript']" ).css(
					'background-color',
					'yellow'
				);
			} else {
				$( "label[for='settings_tester_jquery_javascript']" ).css(
					'background-color',
					''
				);
			}
		} );
	}
} )( jQuery );
