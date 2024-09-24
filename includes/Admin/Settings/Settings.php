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
			'custom-views'    => __( 'Custom Views', 'settings-tester' ),
			'javascript'      => __( 'Javascript', 'settings-tester' ),
			'slotfill'        => __( 'Slotfill', 'settings-tester' ),
			'conditionals'    => __( 'Conditional Views', 'settings-tester' ),
			'save-hooks'      => __( 'Save Hooks', 'settings-tester' ),
			'modern-screens'  => __( 'Modern Screens', 'settings-tester' ),
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
				'type' => 'sectionend',
				'id'   => 'settings_tester_js_settings',
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