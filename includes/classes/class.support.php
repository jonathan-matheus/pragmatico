<?php
class Support
{
    // Class implementation goes here
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'enable_theme_support']);
    }

    public function enable_theme_support()
    {
        add_theme_support('custom-background');
    }
}