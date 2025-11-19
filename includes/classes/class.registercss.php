<?php
class RegisterCSS
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
    }

    public function register_styles()
    {
        wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/output.css', [], '1.0.0', 'all');
    }
}