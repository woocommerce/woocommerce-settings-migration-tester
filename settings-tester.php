<?php
/**
 * Plugin Name: Settings Tester
 * Version: 0.1.0
 * Author: The WordPress Contributors
 * Author URI: https://woocommerce.com
 * Text Domain: settings-tester
 * Domain Path: /languages
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package extension
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'MAIN_PLUGIN_FILE' ) ) {
	define( 'MAIN_PLUGIN_FILE', __FILE__ );
}

require_once plugin_dir_path( __FILE__ ) . '/vendor/autoload_packages.php';

use SettingsTester\Admin\Setup;

// phpcs:disable WordPress.Files.FileName

/**
 * WooCommerce fallback notice.
 *
 * @since 0.1.0
 */
function settings_tester_missing_wc_notice() {
	/* translators: %s WC download URL link. */
	echo '<div class="error"><p><strong>' . sprintf( esc_html__( 'Settings Tester requires WooCommerce to be installed and active. You can download %s here.', 'settings_tester' ), '<a href="https://woocommerce.com/" target="_blank">WooCommerce</a>' ) . '</strong></p></div>';
}

register_activation_hook( __FILE__, 'settings_tester_activate' );

/**
 * Activation hook.
 *
 * @since 0.1.0
 */
function settings_tester_activate() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		add_action( 'admin_notices', 'settings_tester_missing_wc_notice' );
		return;
	}
}

if ( ! class_exists( 'settings_tester' ) ) :
	/**
	 * The settings_tester class.
	 */
	class settings_tester {
		/**
		 * This class instance.
		 *
		 * @var \settings_tester single instance of this class.
		 */
		private static $instance;

		/**
		 * Constructor.
		 */
		public function __construct() {
			new Setup();
		}

		/**
		 * Cloning is forbidden.
		 */
		public function __clone() {
			wc_doing_it_wrong( __FUNCTION__, __( 'Cloning is forbidden.', 'settings_tester' ), $this->version );
		}

		/**
		 * Unserializing instances of this class is forbidden.
		 */
		public function __wakeup() {
			wc_doing_it_wrong( __FUNCTION__, __( 'Unserializing instances of this class is forbidden.', 'settings_tester' ), $this->version );
		}

		/**
		 * Gets the main instance.
		 *
		 * Ensures only one instance can be loaded.
		 *
		 * @return \settings_tester
		 */
		public static function instance() {

			if ( null === self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}
	}
endif;

add_action( 'plugins_loaded', 'settings_tester_init', 10 );

/**
 * Initialize the plugin.
 *
 * @since 0.1.0
 */
function settings_tester_init() {
	load_plugin_textdomain( 'settings_tester', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

	if ( ! class_exists( 'WooCommerce' ) ) {
		add_action( 'admin_notices', 'settings_tester_missing_wc_notice' );
		return;
	}

	settings_tester::instance();

}
