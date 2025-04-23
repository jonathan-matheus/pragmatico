<?php
function pragmatico_menus()
{
    register_nav_menus(
        [
            'header-menu' => __('Header Menu', 'pragmatico')
        ]
    );
}
add_action('init', 'pragmatico_menus');

