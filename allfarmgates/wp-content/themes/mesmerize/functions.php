<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 */

if (!defined('MESMERIZE_THEME_REQUIRED_PHP_VERSION')) {
    define('MESMERIZE_THEME_REQUIRED_PHP_VERSION', '5.3.0');
}

add_action('after_switch_theme', 'mesmerize_check_php_version');

if (version_compare(phpversion(), MESMERIZE_THEME_REQUIRED_PHP_VERSION, '>=')) {
    require_once get_template_directory() . "/inc/functions.php";

    do_action("mesmerize_customize_register_options");
} else {
    add_action('admin_notices', 'mesmerize_php_version_notice');
}

add_theme_support("post-thumbnails");

set_post_thumbnail_size(form_option("thumbnail_size_w&&echo=false"), form_option("thumbnail_size_h&&echo=false"), true);
