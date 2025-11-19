<?php
class NavMenus
{
    // Class implementation goes here
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'register_menus']);
    }

    public function register_menus()
    {
        register_nav_menus([
            'primary' => __('Primary Menu', 'pragmatico'),
        ]);
    }
}