document.addEventListener( 'DOMContentLoaded', function () {
	const domReadyCheckbox = document.getElementById(
		'settings_tester_domready_javascript'
	);

	if ( domReadyCheckbox ) {
		domReadyCheckbox.addEventListener( 'change', function () {
			if ( this.checked ) {
				this.parentElement.parentElement.style.backgroundColor =
					'yellow';
			} else {
				this.parentElement.parentElement.style.backgroundColor =
					'initial';
			}
		} );
	}
} );
