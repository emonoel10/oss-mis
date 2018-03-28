<?php

function mesmerize_get_current_template()
{
    global $template;

    $current_template = str_replace("\\", "/", $template);
    $pathParts        = explode("/", $current_template);
    $current_template = array_pop($pathParts);

    return $current_template;
}

function mesmerize_is_page_template()
{

    $templates   = wp_get_theme()->get_page_templates();
    $templates   = array_keys($templates);
    $templates[] = "woocommerce.php";

    $current_template = mesmerize_get_current_template();

    foreach ($templates as $_template) {
        if ($_template === $current_template) {
            return true;
        }

    }

    return false;

}

/**
 * @param bool $include_fp_template
 *
 * @return bool
 */
function mesmerize_is_front_page($include_fp_template = false)
{

    $is_front_page = (is_front_page() && !is_home());
    $template      = "";
    if (!$is_front_page && $include_fp_template) {
        $fileInfo = pathinfo(get_page_template());
        $template = $fileInfo['filename'];
        if ($template === 'homepage') {
            $is_front_page = ($is_front_page || true);
        }

    }

    $is_front_page = apply_filters('mesmerize_is_front_page', $is_front_page, $include_fp_template, $template);

    return $is_front_page;
}

function mesmerize_is_inner_page($include_fp_template = false)
{
    global $post;

    return ($post && $post->post_type === "page" && !mesmerize_is_front_page($include_fp_template));
}

function mesmerize_is_inner($include_fp_template = false)
{

    return !mesmerize_is_front_page($include_fp_template);
}

function mesmerize_is_blog()
{
    return (is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

function mesmerize_page_content_wrapper_class($default = array())
{

    $class = array('gridContainer', 'content');
    $class = apply_filters('mesmerize_page_content_wrapper_class', $class);
    $class = $class + $default;
    $class = array_unique($class);

    echo esc_attr(implode(' ', $class));
}

function mesmerize_page_content_class()
{
    $class = apply_filters('mesmerize_page_content_class', array());

    echo esc_attr(implode(' ', $class));
}

function mesmerize_posts_wrapper_class()
{
    $class = is_active_sidebar('sidebar-1') ? 'col-sm-8 col-md-9' : 'col-sm-12';

    if (!apply_filters('mesmerize_blog_sidebar_enabled', true)) {
        $class = 'col-sm-12';
    }

    echo esc_attr($class);
}

function mesmerize_get_header($header = null)
{
    $name = apply_filters('mesmerize_header', null);

    if (!$name) {
        $name = $header;
    }
    do_action("mesmerize_before_header", $name);

    $isInPro = locate_template("pro/header-{$name}.php");

    if ($isInPro) {
        do_action('get_header', $name);
        locate_template("/pro/header-{$name}.php", true);
    }

    if (!$isInPro) {
        get_header($name);
    }

}

function mesmerize_get_sidebar($name = null)
{
    $isInPRO = locate_template("pro/sidebar-{$name}.php", false);

    if ($isInPRO) {
        do_action('get_sidebar', $name);
        locate_template("pro/sidebar-{$name}.php", true);
    }

    if (!$isInPRO) {
        get_sidebar($name);
    }
}

function mesmerize_get_navigation($navigation = null)
{
    $template = apply_filters('mesmerize_navigation', null);

    if (!$template || $template === "default") {
        $template = $navigation;
    }

    get_template_part('template-parts/navigation/navigation', $template);
}

function mesmerize_header_main_class()
{
    $inner   = mesmerize_is_inner(true);
    $classes = array();

    $prefix = $inner ? "inner_header" : "header";

    if (get_theme_mod("{$prefix}_nav_boxed", false)) {
        $classes[] = "boxed";
    }

    $transparent_nav = get_theme_mod($prefix . '_nav_transparent', mesmerize_mod_default("{$prefix}_nav_transparent"));

    if (!$transparent_nav) {
        $classes[] = "coloured-nav";
    }

    if (get_theme_mod("{$prefix}_nav_border", mesmerize_mod_default("{$prefix}_nav_border"))) {
        $classes[] = "bordered";
    }

    if (mesmerize_is_front_page(true)) {
        $classes[] = "homepage";
    }

    $classes = apply_filters("mesmerize_header_main_class", $classes, $prefix);

    echo esc_attr(implode(" ", $classes));
}

function mesmerize_print_logo($footer = false)
{

    $preview_atts = "";
    if (mesmerize_is_customize_preview()) {
        $preview_atts = "data-focus-control='blogname'";
    }

    if ($footer) {
        printf('<span data-type="group" ' . $preview_atts . ' data-dynamic-mod="true">%1$s</span>', esc_html(get_bloginfo('name')));

        return;
    }

    if (function_exists('has_custom_logo') && has_custom_logo()) {
        $dark_logo_image = get_theme_mod('logo_dark', false);
        if ($dark_logo_image) {
            $dark_logo_html = sprintf('<a href="%1$s" class="logo-link dark" rel="home" itemprop="url">%2$s</a>',
                esc_url(home_url('/')),
                wp_get_attachment_image(absint($dark_logo_image), 'full', false, array(
                    'class'    => 'logo dark',
                    'itemprop' => 'logo',
                ))
            );

            echo $dark_logo_html;
        }

        the_custom_logo();
    } else {
        printf('<a class="text-logo" data-type="group" ' . $preview_atts . ' data-dynamic-mod="true" href="%1$s">%2$s</a>', esc_url(home_url('/')), mesmerize_bold_text(get_bloginfo('name')));
    }
}

function mesmerize_single_item_title()
{
    if (get_theme_mod('show_single_item_title', true)) {
        the_title();
    }
}

function mesmerize_mod_default($name)
{
    $defaults       = mesmerize_theme_defaults();
    $current_preset = get_theme_mod('theme_default_preset', 1);

    return $defaults[$current_preset][$name];
}

if (!function_exists('mesmerize_print_header_content_holder_class')) {
    function mesmerize_print_header_content_holder_class()
    {
        $align = get_theme_mod('header_text_box_text_align', mesmerize_mod_default('header_text_box_text_align'));
        echo "align-holder " . esc_attr($align);
    }
}

//FOOTER FUNCTIONS

function mesmerize_get_footer_content($footer = null)
{
    $template = apply_filters('mesmerize_footer', null);

    if (!$template) {
        $template = $footer;
    }

    $slug = 'template-parts/footer/footer';

    if (locate_template("pro/{$slug}-{$template}.php")) {
        $slug = "pro/{$slug}";
    }

    get_template_part($slug, $template);
}

function mesmerize_get_footer_copyright()
{
    $copyrightText = __('Built using WordPress and the <a target="_blank" href="%1$s" class="mesmerize-theme-link">Mesmerize Theme</a>', 'mesmerize');

    $copyrightText = sprintf($copyrightText, 'http://extendthemes.com/mesmerize');

    $previewAtts = "";

    if (mesmerize_is_customize_preview()) {
        $previewAtts = 'data-footer-copyright="true"';
    }

    $copyright = '<p ' . $previewAtts . ' class="copyright">&copy;&nbsp;' . "&nbsp;" . date_i18n(__('Y', 'mesmerize')) . '&nbsp;' . esc_html(get_bloginfo('name')) . '.&nbsp;' . wp_kses_post($copyrightText) . '</p>';

    return apply_filters('mesmerize_get_footer_copyright', $copyright, $previewAtts);
}

// PAGE FUNCTIONS

function mesmerize_print_pagination($args = array(), $class = 'pagination')
{
    if ($GLOBALS['wp_query']->max_num_pages <= 1) {
        return;
    }

    $args = wp_parse_args($args, array(
        'mid_size'           => 2,
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'mesmerize') . ' </span>',
        'prev_text'          => __('<i class="fa fa-angle-left" aria-hidden="true"></i>', 'mesmerize'),
        'next_text'          => __('<i class="fa fa-angle-right" aria-hidden="true"></i>', 'mesmerize'),
        'screen_reader_text' => __('Posts navigation', 'mesmerize'),
    ));

    $links = paginate_links($args);

    $next_link = get_previous_posts_link(__('<i class="fa fa-angle-left" aria-hidden="true"></i>', 'mesmerize'));
    $prev_link = get_next_posts_link(__('<i class="fa fa-angle-right" aria-hidden="true"></i>', 'mesmerize'));

    $template = apply_filters('mesmerize_pagination_navigation_markup_template', '
    <div class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links"><div class="prev-navigation">%3$s</div><div class="numbers-navigation">%4$s</div><div class="next-navigation">%5$s</div></div>
    </div>', $args, $class);

    echo sprintf($template, esc_attr($class), $args['screen_reader_text'], $next_link, $links, $prev_link);
}

// POSTS, LIST functions

function mesmerize_print_archive_entry_class()
{
    global $wp_query;
    $classes      = array("post-list-item", "col-xs-12", "space-bottom");
    $index        = $wp_query->current_post;
    $hasBigClass  = (is_sticky() || ($index === 0 && apply_filters('mesmerize_archive_post_highlight', true)));
    $showBigEntry = (is_archive() || is_home());

    if ($showBigEntry && $hasBigClass) {
        $classes[] = "col-sm-12 col-md-12";
    } else {
        $postsPerRow = apply_filters('mesmerize_posts_per_row', 2);
        $classes[]   = "col-sm-12 col-md-" . (12 / intval($postsPerRow));
    }

    $classes = apply_filters('mesmerize_archive_entry_class', $classes);

    $classesText = implode(" ", $classes);

    echo esc_attr($classesText);
}

function mesmerize_print_masonry_col_class($echo = false)
{

    global $wp_query;
    $index        = $wp_query->current_post;
    $hasBigClass  = (is_sticky() || ($index === 0 && apply_filters('mesmerize_archive_post_highlight', true)));
    $showBigEntry = (is_archive() || is_home());

    $class = "";
    if ($showBigEntry && $hasBigClass) {
        $class = "col-md-12";
    } else {
        $postsPerRow = apply_filters('mesmerize_posts_per_row', 2);
        $class       = "col-sm-12.col-md-" . (12 / intval($postsPerRow));
    }

    if ($echo) {
        echo esc_attr($class);

        return;
    }

    return esc_attr($class);
}

function mesmerize_print_post_thumb($classes = "")
{

    $show_placeholder = get_theme_mod('blog_show_post_thumb_placeholder', true);
    if (!has_post_thumbnail() && !$show_placeholder) {
        return;
    }
    ?>
    <div class="post-thumbnail">
        <a href="<?php the_permalink();?>" class="post-list-item-thumb <?php echo esc_attr($classes); ?>">
            <?php
if (has_post_thumbnail()) {
        the_post_thumbnail();
    } else {
        $placeholder_color = get_theme_mod('blog_post_thumb_placeholder_color', mesmerize_get_theme_colors('color2'));
        $placeholder_color = str_replace('#', '', $placeholder_color);
        ?>
                <img src="<?php echo esc_url('https://placehold.it/380X220/' . esc_attr($placeholder_color) . '/ffffff?text=%20'); ?>"
            <?php }?>
        </a>
    </div>
    <?php
}

function mesmerize_is_customize_preview()
{
    $is_preview = (function_exists('is_customize_preview') && is_customize_preview());

    if (!$is_preview) {
        $is_preview = apply_filters('mesmerize_is_shortcode_refresh', $is_preview);
    }

    return $is_preview;

}
