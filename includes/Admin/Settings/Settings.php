<?php
/**
 * WooCommerce General Settings
 *
 * @package WooCommerce\Admin
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'ST_Settings', false ) ) {
	return new ST_Settings();
}

/**
 * WC_Admin_Settings_General.
 */
class ST_Settings extends WC_Settings_Page {
	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'settings-tester';
		$this->label = __( 'Settings Tester', 'settings-tester' );

		add_action( 'woocommerce_admin_field_custom_view_type', array( $this, 'render_custom_view_type' ) );

		parent::__construct();
	}

	/**
	 * Get sections.
	 *
	 * @return array
	 */
	public function get_sections() {
		$sections = array(
			''                => __( 'Components', 'settings-tester' ),
			'custom_views'    => __( 'Custom Views', 'settings-tester' ),
			'javascript'      => __( 'Javascript', 'settings-tester' ),
			'slotfill'        => __( 'Slotfill', 'settings-tester' ),
			'save-hooks'      => __( 'Save Hooks', 'settings-tester' ),
		);

		return $sections;
	}

	/**
	 * Get settings array.
	 *
	 * @param string $current_section Section being shown.
	 * @return array
	 */
	public function get_settings_for_default_section() {
        $settings = array(
            array(
                'title' => __( 'Inputs', 'settings-tester' ),
                'type'  => 'title',
                'desc'  => '',
                'id'    => 'settings_tester_general_options',
            ),
            array(
                'title'    => __( 'Example Option', 'settings-tester' ),
                'desc'     => __( 'This is an example option.', 'settings-tester' ),
                'id'       => 'settings_tester_example_option',
                'default'  => 'yes',
                'type'     => 'checkbox',
            ),
            array(
                'type' => 'sectionend',
                'id'   => 'settings_tester_general_options',
            ),
            array(
                'title'    => __( 'Text Input', 'settings-tester' ),
                'desc'     => __( 'This is a text input field.', 'settings-tester' ),
                'id'       => 'settings_tester_text_input',
                'default'  => '',
                'type'     => 'text',
            ),
            array(
                'title'    => __( 'Number Input', 'settings-tester' ),
                'desc'     => __( 'This is a number input field.', 'settings-tester' ),
                'id'       => 'settings_tester_number_input',
                'default'  => '0',
                'type'     => 'number',
                'custom_attributes' => array(
                    'min'  => '0',
                    'step' => '1',
                ),
            ),
            array(
                'title'    => __( 'Select', 'settings-tester' ),
                'desc'     => __( 'This is a select dropdown.', 'settings-tester' ),
                'id'       => 'settings_tester_select',
                'default'  => 'option1',
                'type'     => 'select',
                'options'  => array(
                    'option1' => __( 'Option 1', 'settings-tester' ),
                    'option2' => __( 'Option 2', 'settings-tester' ),
                    'option3' => __( 'Option 3', 'settings-tester' ),
                ),
            ),
            array(
                'title'    => __( 'Textarea', 'settings-tester' ),
                'desc'     => __( 'This is a textarea field.', 'settings-tester' ),
                'id'       => 'settings_tester_textarea',
                'default'  => '',
                'type'     => 'textarea',
            ),
            array(
                'title'    => __( 'Color Picker', 'settings-tester' ),
                'desc'     => __( 'This is a color picker field.', 'settings-tester' ),
                'id'       => 'settings_tester_color',
                'default'  => '#ffffff',
                'type'     => 'color',
            ),
        );

		return apply_filters( 'settings_tester_get_settings_' . $this->id, $settings );
	}

	/**
	 * Get settings for the JavaScript section.
	 *
	 * @return array
	 */
	public function get_settings_for_javascript_section() {
		$settings = array(
			array(
				'title' => __( 'Javascript Settings', 'settings-tester' ),
				'type'  => 'title',
				'desc'  => __( 'Execute Javascript from external script. The label will change color when the checkbox is checked.', 'settings-tester' ),
				'id'    => 'settings_tester_js_settings',
			),
			array(
				'title'    => __( 'Plain javascript', 'settings-tester' ),
				'desc'     => __( 'External javascript wrapped in self-invoking function', 'settings-tester' ),
				'id'       => 'settings_tester_plain_javascript',
				'default'  => 'no',
				'type'     => 'checkbox',
            ),
			array(
				'title'    => __( 'jQuery script', 'settings-tester' ),
				'desc'     => __( 'External javascript using jQuery', 'settings-tester' ),
				'id'       => 'settings_tester_jquery_javascript',
				'default'  => 'no',
				'type'     => 'checkbox',
            ),
			array(
				'title'    => __( 'DOMContentLoaded script', 'settings-tester' ),
				'desc'     => __( 'External javascript using DOMContentLoaded event', 'settings-tester' ),
				'id'       => 'settings_tester_domready_javascript',
				'default'  => 'no',
				'type'     => 'checkbox',
			),
			array(
				'title'    => __( 'jQuery Ready script', 'settings-tester' ),
				'desc'     => __( 'External javascript using jQuery ready function', 'settings-tester' ),
				'id'       => 'settings_tester_jquery_ready_javascript',
				'default'  => 'no',
				'type'     => 'checkbox',
			),
			array(
				'title' => __( 'Echoing HTML', 'settings-tester' ),
				'desc'  => __( 'Echoing HTML with <script> tags to output JS that interacts with the DOM.', 'settings-tester' ),
				'id'    => 'settings_tester_echoing_html',
				'default' => 'no',
				'type' => 'checkbox',
			),
			array(
				'type' => 'sectionend',
				'id'   => 'settings_tester_js_settings',
			),
		);

		return $settings;
	}

	public function get_settings_for_custom_views_section() {
		$settings = array(
			array(
				'title'    => __( 'Custom Type', 'settings-tester' ),
				'desc'     => __( 'Declaring a settings type not found in the Settings API.', 'settings-tester' ),
				'id'       => 'settings_tester_custom_type',
				'type'     => 'title',
			),
			array(
				'type' => 'custom_view_type',
			),
			array(
				'type'  => 'title',
				'title' => __( 'Custom Output Method', 'settings-tester' ),
			),
			array(
				'type' => 'custom_view_output_method',
			),
		);

		return $settings;		
	}

	public function render_custom_view_type() {
		?>
		<h3 style="background-color: yellow; padding: 10px;">
			This html has been generated by PHP using the `woocommerce_admin_field_` hook.
		</h3>
		<?php
	}

	public function output() {
		global $current_section;

		// Render configured output method.
		parent::output();

		if ( 'custom_views' === $current_section ) {
			?>
			<h3 style="background-color: yellow; padding: 10px;">
				This html has been generated by PHP using a custom the `output` method.
			</h3>
			<?php
		}

		if ( 'javascript' === $current_section ) {
			?>
			<script type="text/javascript">
				const $jqueryCheckbox = jQuery( '#settings_tester_echoing_html' );
				if ( $jqueryCheckbox.length ) {
					$jqueryCheckbox.on( 'change', function () {
						if ( jQuery( this ).is( ':checked' ) ) {
							jQuery( "label[for='settings_tester_echoing_html']" ).css(
								'background-color',
								'yellow'
							);
						} else {
							jQuery( "label[for='settings_tester_echoing_html']" ).css(
								'background-color',
								''
							);
						}
					} );
				}
			</script>
			<?php
		}
	}

	public function get_settings_for_slotfill_section() {
		$settings = array(
			array(
				'title' => __( 'Slotfill Settings', 'settings-tester' ),
				'type'  => 'title',
				'desc'  => __( 'Slotfill insertion points.', 'settings-tester' ),
				'id'    => 'settings_tester_slotfill_settings',
			),
			array(
				'type' => 'slotfill_placeholder',
				'id'   => 'settings_tester_slotfill_placeholder',
			),
		);
		
		return $settings;
	}

	/**
	 * Save settings.
	 */
	public function save() {
		$settings = $this->get_settings( $this->get_current_section() );
		WC_Admin_Settings::save_fields( $settings );
	}
}