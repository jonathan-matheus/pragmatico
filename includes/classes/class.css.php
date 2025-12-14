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
            [],
            '1.0.0',
        );

        wp_enqueue_style(
            'main-style',
            get_template_directory_uri() . '/assets/css/main.css',
            ['fonts'],
            '1.0.0',
        );
    }
}