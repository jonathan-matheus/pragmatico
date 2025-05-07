<?php
/**
 * Enqueues the stylesheets for the Pragmatico theme.
 *
 * This function registers and enqueues the necessary CSS files for the theme,
 * including the main stylesheet, custom fonts, and the Bootstrap framework.
 *
 * @return void
 */
function pragmatico_enqueue_styles()
{
    $args = [
        [
            'handle' => 'pragmatico-style',
            'src' => get_stylesheet_uri(),
            'deps' => [],
            'ver' => wp_get_theme()->get('Version'),
            'media' => 'all'
        ],
        [
            'handle' => 'fonts',
            'src' => get_template_directory_uri() . '/assets/css/fonts.css',
            'deps' => [],
            'ver' => '1.0.0',
            'media' => 'all'
        ],
        [
            'handle' => 'bootstrap',
            'src' => get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css',
            'deps' => ['custom-colors', 'pragmatico-style', 'fonts'],
            'ver' => '5.3.5',
            'media' => 'all'
        ],
        [
            'handle' => 'custom-colors',
            'src' => get_template_directory_uri() . '/assets/css/colors.css',
            'deps' => [],
            'ver' => '1.0.0',
            'media' => 'all'
        ]
    ];

    foreach ($args as $style) {
        wp_enqueue_style(
            $style['handle'],
            $style['src'],
            $style['deps'],
            $style['ver'],
            $style['media']
        );
    }
}
add_action('wp_enqueue_scripts', 'pragmatico_enqueue_styles');