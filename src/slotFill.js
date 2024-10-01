/**
 * External dependencies
 */
import { createRoot } from '@wordpress/element';

const App = () => {
	return <p>This is a fill created by Settings Tester</p>;
};

const slotDomElement = document.getElementById(
	'settings_tester_slotfill_placeholder'
);

if ( slotDomElement ) {
	const root = createRoot( slotDomElement );
	root.render( <App /> );

	console.log( 'slotFill.js' );
}
