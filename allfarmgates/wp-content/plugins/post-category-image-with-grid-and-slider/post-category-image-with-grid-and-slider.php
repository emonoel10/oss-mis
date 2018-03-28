<?php
/**
 * Plugin Name: Post Category Image With Grid and Slider
 * Plugin URI: https://www.wponlinesupport.com/plugins
 * Description: Post Category Image With Grid and Slider plugin allow users to upload  category (taxonomy) image and display in grid and slider.
 * Author: WP Online Support
 * Author URI: https://www.wponlinesupport.com
 * Text Domain: post-category-image-with-grid-and-slider
 * Domain Path: languages
 * Version: 1.0.1
 * 
 * @package WordPress
 * @author WP Online Support
 */

 /**
 * Basic plugin definitions
 * 
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
if( !defined( 'PCIWGAS_WP_VERSION' ) ) {
	define( 'PCIWGAS_WP_VERSION', get_bloginfo('version') ); 
} 
if( !defined( 'PCIWGAS_VERSION' ) ) {
	define( 'PCIWGAS_VERSION', '1.0.1' ); // Version of plugin
}
if( !defined( 'PCIWGAS_URL' ) ) {
    define( 'PCIWGAS_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( !defined( 'PCIWGAS_DIR' ) ) {
    define( 'PCIWGAS_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( !defined( 'PCIWGAS_PLUGIN_BASE' ) ) {
	define( 'PCIWGAS_PLUGIN_BASE',  plugin_dir_path(__FILE__)); // plugin base
}
if( !defined( 'PCIWGAS_PATH_TEMPLATES' ) ) {
    define( 'PCIWGAS_PATH_TEMPLATES', PCIWGAS_PLUGIN_BASE . 'templates/');
}

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */

register_activation_hook( __FILE__, 'pciwgas_install' );

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * stest default values for the plugin options.
 * 
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
function pciwgas_install(){

	// Get settings for the plugin
    $pciwgas_options = get_option( 'pciwgas_options' );
    
    if( empty( $pciwgas_options ) ) { // Check plugin version option
        
        // Set default settings
        pciwgas_default_settings();
        
        // Update plugin version to option
        update_option( 'pciwgas_plugin_version', '1.0' );
    }
}

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'pciwgas_uninstall');

/**
 * Plugin Setup (On Deactivation)
 * 
 * Delete  plugin options.
 * 
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
function pciwgas_uninstall() {
    // Uninstall functionality
}
/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
function pciwgas_load_textdomain() {

    global $wp_version;

    // Set filter for plugin's languages directory
    $pciwgas_lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
    $pciwgas_lang_dir = apply_filters( 'pciwgas_languages_directory', $pciwgas_lang_dir );
    
    // Traditional WordPress plugin locale filter.
    $get_locale = get_locale();

    if ( $wp_version >= 4.7 ) {
        $get_locale = get_user_locale();
    }

    // Traditional WordPress plugin locale filter
    $locale = apply_filters( 'plugin_locale',  $get_locale, 'post-category-image-with-grid-and-slider' );
    $mofile = sprintf( '%1$s-%2$s.mo', 'post-category-image-with-grid-and-slider', $locale );

    // Setup paths to current locale file
    $mofile_global  = WP_LANG_DIR . '/plugins/' . basename( PCIWGAS_DIR ) . '/' . $mofile;

    if ( file_exists( $mofile_global ) ) { // Look in global /wp-content/languages/plugin-name folder
        load_textdomain( 'post-category-image-with-grid-and-slider', $mofile_global );
    } else { // Load the default language files
        load_plugin_textdomain( 'post-category-image-with-grid-and-slider', false, $pciwgas_lang_dir );
    }
}
add_action('plugins_loaded', 'pciwgas_load_textdomain');

/**
 * Include require files 
 * 
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
require_once( PCIWGAS_DIR . '/includes/admin/pciwgas-admin-functions.php' );
require_once( PCIWGAS_DIR . '/includes/admin/CategoryimageLoadFunction.php' );
add_action('init', array('CategoryimageLoadFunction', 'pciwgas_initialize'));
require_once( PCIWGAS_DIR . '/includes/admin/class-pciwgas-admin.php' );
/** Load js and css files */
require_once( PCIWGAS_DIR . '/includes/class-pciwgas-script.php' );

global $pciwgas_options;
/** Load function files */
require_once( PCIWGAS_DIR . '/includes/pciwgas-function.php' );
$pciwgas_options = pciwgas_get_settings();
/** Shortcode files */
require_once( PCIWGAS_DIR . '/includes/shortcode/pciwgas-grid.php' );
require_once( PCIWGAS_DIR . '/includes/shortcode/pciwgas-slider.php' );