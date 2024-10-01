<?php
/**
 * Modern Screen.
 */
class ST_Settings_ModernScreen extends WC_Settings_Page {
	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id = 'settings-tester-modern-screen';
		$this->label = __( 'Modern Screen', 'settings-tester' );
		$this->is_modern = true;

		parent::__construct();
	}

    protected function get_own_sections() {
        return array(
            'mammals' => __( 'Mammals', 'settings-tester' ),
            'birds'   => __( 'Birds', 'settings-tester' ),
            'fish'    => __( 'Fish', 'settings-tester' ),
        );
    }
}

return new ST_Settings_ModernScreen();