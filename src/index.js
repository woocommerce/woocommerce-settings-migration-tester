/**
 * External dependencies
 */
import { addFilter } from '@wordpress/hooks';
import { getQueryArgs, addQueryArgs } from '@wordpress/url';
import { Sidebar } from '@woocommerce/settings-editor';

/**
 * Internal dependencies
 */
import './index.scss';
import './slotFill';

export const ModernScreen = ( { section } ) => {
	return (
		<div className="woocommerce-settings-content">
			<h2>This is a modern screen</h2>
			<p>Section: { section }</p>
		</div>
	);
};

addFilter( 'woocommerce_admin_settings_routes', 'woocommerce', ( pages ) => {
	const currentArgs = getQueryArgs( window.location.href );
	const section = currentArgs.section ? currentArgs.section : 'mammals';
	const backPath = addQueryArgs( 'wc-settings', {} );
	const backLabel = 'Modern Settings';

	const sidebarItems = [
		{
			slug: 'settings-tester-modern-screen-mammals',
			label: 'Mammals',
			icon: 'bug',
			to: addQueryArgs( 'wc-settings', {
				tab: 'settings-tester-modern-screen',
				section: 'mammals',
			} ),
			withChevron: false,
			isCurrent: section === 'mammals',
			backLabel,
			backPath,
		},
		{
			slug: 'settings-tester-modern-screen-birds',
			label: 'Birds',
			icon: 'starEmpty',
			to: addQueryArgs( 'wc-settings', {
				tab: 'settings-tester-modern-screen',
				section: 'birds',
			} ),
			withChevron: false,
			isCurrent: section === 'birds',
			backLabel,
			backPath,
		},
		{
			slug: 'settings-tester-modern-screen-fish',
			label: 'Fish',
			icon: 'color',
			to: addQueryArgs( 'wc-settings', {
				tab: 'settings-tester-modern-screen',
				section: 'fish',
			} ),
			withChevron: false,
			isCurrent: section === 'fish',
			backLabel,
			backPath,
		},
	];

	pages[ 'settings-tester-modern-screen' ] = {
		areas: {
			sidebar: (
				<Sidebar
					routeKey={ 'settings-tester-modern-screen' }
					sidebarItems={ sidebarItems }
					currentNestLevel={ 1 }
				/>
			),
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
