<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

class Pciwgas_Admin {
	
	function __construct() {

		// Action to register admin menu
		add_action( 'admin_menu', array($this, 'pciwgas_register_menu') );

		// Action to register plugin settings
		add_action ( 'admin_init', array($this, 'pciwgas_register_settings') );	

	}

	/**
	 * Function to register admin menus
	 * 
	 * @package Post Category Image With Grid and Slider
	 * @since 1.0.0
	 */
	function pciwgas_register_menu() {
		add_menu_page ( __('Category Image', 'post-category-image-with-grid-and-slider'), __('Category Image', 'post-category-image-with-grid-and-slider'), 'manage_options', 'pciwgaspro-settings', array($this, 'pciwgas_settings_page'), 'dashicons-feedback' );
	}

	/**
	 * Function to handle the setting page html
	 * 
	 * @package Post Category Image With Grid and Slider
	 * @since 1.0.0
	 */
	function pciwgas_settings_page() {
		include_once( PCIWGAS_DIR . '/includes/admin/settings/settings.php' );
	}

	/**
	 * Function register setings
	 * 
	 * @package Post Category Image With Grid and Slider
	 * @since 1.0.0
	 */
	function pciwgas_register_settings()
	{
		register_setting( 'pciwgas_plugin_options', 'pciwgas_options', array($this, 'pciwgas_validate_options') );
	}

	/**
	 * Validate Settings Options
	 * 
	 * @package Post Category Image With Grid and Slider
	 * @since 1.0.0
	 */
	function pciwgas_validate_options( $input ) {
		return $input;
	}
	
	
}

$pciwgas_admin = new Pciwgas_Admin();