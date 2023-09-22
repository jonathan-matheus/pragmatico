<?php

/**
 * Registra o menu
 * 
 * @return void
 * @author Jonathan Matheus Da Silva <johhn.dev@gmail.com>
 */
function pragmatico_registro_menu()
{
    register_nav_menu(
        'menu',
        'Menu'
    );
}
add_action('init', 'pragmatico_registro_menu');
