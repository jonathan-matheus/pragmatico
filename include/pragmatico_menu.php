<?php
/**
 * Pragmatico Menu Class
 */

/**
 * pt-br: Impede que o arquivo seja executado fora do WordPress
 * 
 * en: Prevents the file from running outside of WordPress.
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * pt-br: Classe responsável por registrar os menus do tema.
 * 
 * en: Class responsible for registering theme menus.
 */
class Pragmatico_Menu
{
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'register_menus']);
    }

    public function register_menus()
    {
        register_nav_menus([
            'primary' => __('Main Menu', 'pragmatico'),
        ]);
    }
}

new Pragmatico_Menu();
