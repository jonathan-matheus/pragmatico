<?php
class Support
{
    // Class implementation goes here
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'enable_theme_support']);
        add_action('init', [$this, 'enable_theme_support_init']);
    }

    public function enable_theme_support()
    {
        add_theme_support('custom-background');
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
    }

    public function enable_theme_support_init()
    {
        add_post_type_support('page', 'excerpt');
    }
}