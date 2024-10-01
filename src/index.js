/**
 * External dependencies
 */
import { addFilter } from '@wordpress/hooks';
import { getNewPath, useSettingsLocation } from '@woocommerce/navigation';
import { Link } from '@woocommerce/components';

/**
 * Internal dependencies
 */
import './index.scss';
import './slotFill';

export const ModernScreen = ( { section } ) => {
	return (
		<>
			<h2>Selected section: { section }</h2>
			<Link href={ getNewPath( { quickEdit: true } ) } type="wc-admin">
				Edit
			</Link>
		</>
	);
};

export const ModernScreenEdit = () => {
	return (
		<div style={ { padding: '16px 48px' } }>
			<h2>Modern Screen Edit</h2>
			<Link href={ getNewPath( { quickEdit: false } ) } type="wc-admin">
				Close
			</Link>
		</div>
	);
};

addFilter( 'woocommerce_admin_settings_pages', 'woocommerce', ( pages ) => {
	const { section } = useSettingsLocation();

	pages[ 'settings-tester-modern-screen' ] = {
		areas: {
			content: <ModernScreen section={ section } />,
			edit: <ModernScreenEdit />,
		},
		widths: {
			content: undefined,
			edit: 380,
		},
	};
	return pages;
} );
