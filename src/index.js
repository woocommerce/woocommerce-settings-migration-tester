/**
 * External dependencies
 */
import { addFilter } from '@wordpress/hooks';
import { getQueryArgs } from '@wordpress/url';

/**
 * Internal dependencies
 */
import './index.scss';
import './slotFill';

export const ModernScreen = ( { section } ) => {
	return (
		<>
			<h2>This is a modern screen</h2>
			<p>Section: { section }</p>
		</>
	);
};

addFilter( 'woocommerce_admin_settings_pages', 'woocommerce', ( pages ) => {
	const currentArgs = getQueryArgs( window.location.href );
	const section = currentArgs.section ? currentArgs.section : 'mammals';

	pages[ 'settings-tester-modern-screen' ] = {
		areas: {
			content: <ModernScreen section={ section } />,
			edit: null,
		},
		widths: {
			content: undefined,
			edit: 380,
		},
	};
	return pages;
} );
