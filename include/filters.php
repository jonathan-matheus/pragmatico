<?php
add_filter('nav_menu_css_class', function ($classes, $item, $args, $depth) {
    if (isset($args->theme_location) && $args->theme_location === 'header-menu') {
        $classes[] = 'nav-item';
    }
    return $classes;
}, 10, 4);

add_filter('nav_menu_link_attributes', function ($atts, $item, $args, $depth) {
    if (isset($args->theme_location) && $args->theme_location === 'header-menu') {
        $atts['class'] = 'text-decoration-none text-dark hover-white';
    }
    return $atts;
}, 10, 4);