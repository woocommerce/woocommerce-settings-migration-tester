/**
 * External dependencies
 */
import { addFilter } from '@wordpress/hooks';

/**
 * Internal dependencies
 */
import './index.scss';
import './slotFill';

export const ModernScreen = () => {
	return (
		<>
			<h2>This is a modern screen</h2>
		</>
	);
};

addFilter( 'woocommerce_admin_settings_pages', 'woocommerce', ( pages ) => {
	pages[ 'settings-tester-modern-screen' ] = {
		areas: {
			content: <ModernScreen />,
			edit: null,
		},
		widths: {
			content: undefined,
			edit: 380,
		},
	};
	return pages;
} );
