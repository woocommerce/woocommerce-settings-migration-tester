<?php

namespace SettingsTester\Admin;

/**
 * SettingsTester Setup Class
 */
class Setup {
	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'register_scripts' ) );
		add_action( 'admin_menu', array( $this, 'register_page' ) );
		add_filter( 'woocommerce_get_settings_pages', array( $this, 'add_setting_pages' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_javascript' ) );
	}

	public function enqueue_javascript() {
		wp_enqueue_script( 
			'settings-tester-plain', 
			plugins_url( '/includes/Admin/Settings/Javascript/plain.js', MAIN_PLUGIN_FILE ), 
			array(), 
			'1.0.0', 
			true 
		);
		
		wp_enqueue_script( 
			'settings-tester-jquery', 
			plugins_url( '/includes/Admin/Settings/Javascript/jquery.js', MAIN_PLUGIN_FILE ), 
			array( 'jquery' ), 
			'1.0.0', 
			true 
		);
	}

	public function add_setting_pages( $settings ) {

		$settings[] = include __DIR__ . '/Settings/Settings.php';

		return $settings;
	}

	/**
	 * Load all necessary dependencies.
	 *
	 * @since 1.0.0
	 */
	public function register_scripts() {
		if ( ! method_exists( 'Automattic\WooCommerce\Admin\PageController', 'is_admin_or_embed_page' ) ||
		! \Automattic\WooCommerce\Admin\PageController::is_admin_or_embed_page()
		) {
			return;
		}

		$script_path       = '/build/index.js';
		$script_asset_path = dirname( MAIN_PLUGIN_FILE ) . '/build/index.asset.php';
		$script_asset      = file_exists( $script_asset_path )
		? require $script_asset_path
		: array(
			'dependencies' => array(),
			'version'      => filemtime( $script_path ),
		);
		$script_url        = plugins_url( $script_path, MAIN_PLUGIN_FILE );

		wp_register_script(
			'settings-tester',
			$script_url,
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		wp_register_style(
			'settings-tester',
			plugins_url( '/build/index.css', MAIN_PLUGIN_FILE ),
			// Add any dependencies styles may have, such as wp-components.
			array(),
			filemtime( dirname( MAIN_PLUGIN_FILE ) . '/build/index.css' )
		);

		wp_enqueue_script( 'settings-tester' );
		wp_enqueue_style( 'settings-tester' );
	}

	/**
	 * Register page in wc-admin.
	 *
	 * @since 1.0.0
	 */
	public function register_page() {

		if ( ! function_exists( 'wc_admin_register_page' ) ) {
			return;
		}

		wc_admin_register_page(
			array(
				'id'     => 'settings_tester-example-page',
				'title'  => __( 'Settings Tester', 'settings_tester' ),
				'parent' => 'woocommerce',
				'path'   => '/settings-tester',
			)
		);
	}
}
