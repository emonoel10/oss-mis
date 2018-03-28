<?php
/**
 * Function
 * Handles the functionality of plugin
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Function to get featured content column
 *
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
function pciwgas_column($row = '')
{
    if ($row == 2) {
        $per_row = 6;
    } else if ($row == 3) {
        $per_row = 4;
    } else if ($row == 4) {
        $per_row = 3;
    } else if ($row == 1) {
        $per_row = 12;
    } else if ($row == 6) {
        $per_row = 2;
    } else {
        $per_row = 12;
    }

    return $per_row;
}
/**
 * Function to unique number value
 *
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
function pciwgas_get_unique()
{
    static $unique = 0;
    $unique++;

    return $unique;
}

/**
 * Update default settings
 *
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
function pciwgas_default_settings()
{

    global $pciwgas_options;

    $pciwgas_options = array(
        'pciwgas_enable' => '1',

    );

    $default_options = apply_filters('pciwgas_options_default_values', $pciwgas_options);

    // Update default options
    update_option('pciwgas_options', $default_options);

    // Overwrite global variable when option is update
    $pciwgas_options = pciwgas_get_settings();
}

/**
 * Get Settings From Option Page
 *
 * Handles to return all settings value
 *
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
function pciwgas_get_settings()
{

    $options = get_option('pciwgas_options');

    $settings = is_array($options) ? $options : array();

    return $settings;
}

/**
 * Get an option
 * Looks to see if the specified setting exists, returns default if not
 *
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
function pciwgas_get_option($key = '', $default = false)
{
    global $pciwgas_options;

    $value = !empty($pciwgas_options[$key]) ? $pciwgas_options[$key] : $default;
    $value = apply_filters('pciwgas_get_option', $value, $key, $default);
    return apply_filters('pciwgas_get_option_' . $key, $value, $key, $default);
}

/**
 * Escape Tags & Slashes
 *
 * Handles escapping the slashes and tags
 *
 * @package  Post Category Image With Grid and Slider
 * @since 1.0.0
 */
function pciwgas_escape_attr($data)
{
    return esc_attr(stripslashes($data));
}

/**
 * Strip Slashes From Array
 *
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
function pciwgas_slashes_deep($data = array(), $flag = false)
{

    if ($flag != true) {
        $data = pciwgas_nohtml_kses($data);
    }
    $data = stripslashes_deep($data);
    return $data;
}

/**
 * Strip Html Tags
 *
 * It will sanitize text input (strip html tags, and escape characters)
 *
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
function pciwgas_nohtml_kses($data = array())
{

    if (is_array($data)) {

        $data = array_map('pciwgas_nohtml_kses', $data);

    } elseif (is_string($data)) {

        $data = wp_filter_nohtml_kses($data);
    }

    return $data;
}
