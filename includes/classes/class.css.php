<?php
class Css
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'registerCss']);
    }

    public function registerCss()
    {
        wp_enqueue_style(
            'fonts',
            get_template_directory_uri() . '/assets/css/fonts.css',
            array(),
            '1.0.0'
        );

        wp_enqueue_style(
            'main-style',
            get_template_directory_uri() . '/assets/css/main.css',
            array('fonts'),
            '1.0.0'
        );

        // Enfileira apenas em posts individuais e garante dependência correta
        if (is_singular('post')) {
            wp_enqueue_style(
                'single-style',
                get_template_directory_uri() . '/assets/css/single.css',
                array('main-style'),
                '1.1.0'
            );
        }
    }
}