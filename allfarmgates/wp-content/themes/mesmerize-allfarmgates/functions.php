<?php

add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_footer', 'scroll_top_script', 99);
function scroll_top_script()
{
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){

            //Check to see if the window is top if not then display button
            jQuery(window).scroll(function(){
                if (jQuery(this).scrollTop() > 150) {
                    jQuery('.scrollToTop').fadeIn();
                } else {
                    jQuery('.scrollToTop').fadeOut();
                }
            });

            //Click event to scroll to top
            jQuery('.scrollToTop').click(function(){
                jQuery('html, body').animate({scrollTop : 0},750);
                return false;
            });

        });
    </script>
    <?php
}

add_shortcode('allfarmgates_categories', 'allfarmgates_categories_func');
function allfarmgates_categories_func()
{
    $categories = get_categories(array(
        'show_count'         => 0,
        'use_desc_for_title' => 0,
        'title_li'           => 0,
        'style'              => 'none',
        'echo'               => 0,
    ));

    echo '<div class="container-fluid">' .
        '<div class="row afg_categories_container text-center">';

    foreach ($categories as $category) {
        echo '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';

        if (function_exists('z_taxonomy_image_url')) {
            $catImage = '<img src="' . z_taxonomy_image_url($category->term_id, 'full', false) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)) . '" class="img-responsive img-circle text-center afg_categories_img" id="afgCategoriesImg" />';
        }

        $category_link = sprintf(
            '<a class="afg_categories_link" id="afgCategoriesLink" href="%1$s" alt="%2$s"><div class="clearfix afg_categories_wrapper" id="afgCategoriesWrapper">' . $catImage . '<h3 class="afg_categories_title" id="afgCategoriesTitle">%3$s</h3></div></a>',
            esc_url(get_category_link($category->term_id)),
            esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)),
            esc_html($category->name)
        );
        echo sprintf(esc_html__('%s', 'textdomain'), $category_link);
        echo '</div>';
    }

    echo '</div>' .
        '</div>';
}
