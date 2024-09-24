( function () {
	const plainJavascriptCheckbox = document.getElementById(
		'settings_tester_plain_javascript'
	);
	if ( plainJavascriptCheckbox ) {
		plainJavascriptCheckbox.addEventListener( 'change', function () {
			if ( this.checked ) {
				this.parentElement.parentElement.style.backgroundColor =
					'yellow';
			} else {
				this.parentElement.parentElement.style.backgroundColor =
					'initial';
			}
		} );
	}
} )();
