<?php

if (! defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

/**
 * Include templates files
 * 
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */

function pciwgas_template($name, $params = array(), $echo_html = true)
    {
        $filename = PCIWGAS_PATH_TEMPLATES . $name . '.php';

        if (! file_exists($filename)) {
            return;
        }

        foreach ($params as $param => $value) {
            $$param = $value;
        }

        ob_start();
        include $filename;
        $html = ob_get_contents();
        ob_end_clean();

        if (! $echo_html) {
            return $html;
        }

        echo $html;
}

function pciwgas_category_image($params = array(), $echo = false)
    {
        $image_header = CategoryimageLoadFunction::pciwgas_get_category_image($params);

        if (!$echo) {
            return $image_header;
        }

        echo $image_header;
    }
/**
 * Include Get image src
 * 
 * @package Post Category Image With Grid and Slider
 * @since 1.0.0
 */
function pciwgas_category_image_src($params = array(), $echo = false)
    {
        $image_header = CategoryimageLoadFunction::pciwgas_get_category_image($params, true);

        if (!$echo) {
            return $image_header;
        }

        echo $image_header;
    }

function pciwgas_instance()
    {
        return CategoryimageLoadFunction::pciwgas_getInstance();
    }

function pciwgas_error($message, $errno)
    {
        $action = isset($_GET['action']) ? trim($_GET['action']) : null;

        if (!is_null($action) && $action === 'error_scrape') {
            die($message);
        }

        trigger_error($message, $errno);
    }