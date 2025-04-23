<?php
$route_files_includes = [
    'support',
    'css',
    'menus',
    'filters'
];

foreach ($route_files_includes as $file) {
    require_once "include/{$file}.php";
}