<?php

/**
 * Cria altomaticamente as páginas nescessárias para o tema, e define a página
 * inicial padrão.
 * 
 * @return void
 * @author jonathan matheus da silva <johhn.dev@gmail.com>
 */
function pragmatico_cria_paginas()
{
    $paginas = array(
        'inicial' => 'inicial',
        'sobre' => 'sobre',
        'portfolio' => 'portfolio',
        'servicos' => 'serviços',
        'blog' => 'blog'
    );

    foreach ($paginas as $slug => $title) {
        if (!get_page_by_path($slug)) {
            wp_insert_post(array(
                'post_title' => $title,
                'post_name' => $slug,
                'post_status' => 'publish',
                'post_type' => 'page'
            ));
        }

        if ($slug == 'inicial') {
            update_option('page_on_front', get_page_by_path($slug)->ID);
            update_option('show_on_front', 'page');
        }
    }
}
add_action('after_switch_theme', 'pragmatico_cria_paginas');
