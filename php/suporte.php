<?php

/**
 * Adiciona os seguintes suportes
 * - Thumbnail
 * - Logo
 * 
 * @return void
 * @author Jonathan Matheus Da Silva <johhn.dev@gmail.com>
 */
function pragmatico_suporte()
{
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
}
add_action('init', 'pragmatico_suporte');
