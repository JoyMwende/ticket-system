<?php

//add bootstrap
function tickettheme_script_enqueue()
{
    wp_register_style('bootstrapstyle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', [], '5.2.3', 'all');
    wp_enqueue_style('bootstrapstyle');

    wp_register_script('jsbootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', [], '5.2.3', false);
    wp_enqueue_script('jsbootstrap');
}
add_action('wp_enqueue_scripts', 'tickettheme_script_enqueue');

//add header and footer menus
function tickettheme_setup()
{
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header');
    register_nav_menu('secondary', 'Footer Navigation');
}

//add navwalker
if (!file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')) {
    return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_action('init', 'tickettheme_setup');
