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

export const MyExample = ( { section } ) => {
	return (
		<>
			<h2>My Example: { section }</h2>
			<Link href={ getNewPath( { quickEdit: true } ) } type="wc-admin">
				Edit
			</Link>
		</>
	);
};

export const MyExampleEdit = () => {
	return (
		<div style={ { padding: '16px 48px' } }>
			<h2>My Example Edit</h2>
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
			content: <MyExample section={ section } />,
			edit: <MyExampleEdit />,
		},
		widths: {
			content: undefined,
			edit: 380,
		},
	};
	return pages;
} );
