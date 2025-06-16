<?php
class Menus
{
    public function registerMenus()
    {
        register_nav_menus([
            'header' => __('Header', 'pragmatico'),
        ]);
    }
}