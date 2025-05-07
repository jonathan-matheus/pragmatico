<?php
$route_files_includes = [
    'support',
    'css',
    'menus',
    'filters',
    'customizer'
];

foreach ($route_files_includes as $file) {
    require_once "include/{$file}.php";
}