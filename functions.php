<?php
require_once get_template_directory() . '/include/pragmatico_menu.php';
require_once get_template_directory() . '/include/pragmatico_styles.php';
require_once get_template_directory() . '/include/pragmatico_style_header.php';
require_once get_template_directory() . '/include/pragmatico_style_about.php';
require_once get_template_directory() . '/include/pragmatico_style_footer.php';
require_once get_template_directory() . '/include/pragmatico_custom_post.php';

function pragmatico_theme_setup()
{
    add_theme_support('custom-background', [
        'default-color' => '#202023',
    ]);
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'pragmatico_theme_setup');

function pragmatico_flush_rewrite_rules_on_switch()
{
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'pragmatico_flush_rewrite_rules_on_switch');
