<?php

/**
 * Gera a página do tema para gerenciar Textos - Página Inicial.
 *
 * @return void
 */
function pragmatico_textos_front_page()
{
    add_theme_page(
        'Textos - Pagina Inicial',
        'Textos - Pagina Inicial',
        'edit_theme_options',
        'theme-options',
        'pragmatico_textos_front_page_callback'
    );
}
add_action('admin_menu', 'pragmatico_textos_front_page');

/**
 * Manipula o retorno para a página inicial do site.
 *
 * Esta função é responsável por manipular o envio do formulário na página 
 * inicial do site. Ela recupera os dados do formulário, sanitiza-os e executa 
 * as operações necessárias para atualizar a entrada existente ou inserir uma 
 * nova entrada na tabela do banco de dados. Também recupera os valores atuais 
 * do banco de dados e exibe o formulário para permitir que o usuário edite os 
 * valores.
 *
 * @return void
 */
function pragmatico_textos_front_page_callback()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'pragmatico_textos_front';

    // Verifique se o formulário foi submetido
    if (isset($_POST['submit'])) {
        $campos = [
            'banner_top_titulo',
            'banner_top_descricao',
            'servicos_titulo',
            'servicos_descricao',
            'projetos_titulo',
            'projetos_descricao',
            'sobre_titulo',
            'sobre_descricao',
            'experiencia_titulo',
            'experiencia_descricao',
            'banner_bottom_titulo',
            'banner_bottom_descricao',
        ];

        // Recupere os dados do formulário
        $dados = [];
        foreach ($campos as $campo) {
            $dados[$campo] = sanitize_text_field($_POST[$campo]);
        }

        // Verifique se já existe uma entrada no banco de dados
        $existing_entry = $wpdb->get_row("SELECT * FROM $table_name");

        if ($existing_entry) {
            // Atualize os valores existentes
            $wpdb->update(
                $table_name,
                $dados,
                array('id' => 0),
            );
            echo 'Update';
        } else {
            // Insira uma nova entrada
            $wpdb->insert(
                $table_name,
                $dados
            );
            echo 'Insert';
        }
    }

    // Obtenha os valores atuais do banco de dados
    $current_values = $wpdb->get_row("SELECT * FROM $table_name");

    $secoes = [
        'banner_top' => 'Banner - Top',
        'servicos' => 'Serviços',
        'projetos' => 'Projetos',
        'sobre' => 'Sobre',
        'experiencia' => 'Experiência',
        'banner_bottom' => 'Banner - Bottom',
    ];

    echo '<h1>Textos - Pagina Inicial</h1>';
    echo '<form action="" method="post">';

    foreach ($secoes as $chave => $titulo) {
        echo '<h2>' . $titulo . '</h2>';
        echo '<label for="' . $chave . '_titulo">TITULO</label><br>';
        echo '<input type="text" name="' . $chave . '_titulo" id="' . $chave . '_titulo" value="' . esc_attr($current_values->{$chave . '_titulo'}) . '"><br>';

        echo '<label for="' . $chave . '_descricao">DESCRICAO</label><br>';
        echo '<textarea rows="10" cols="50" name="' . $chave . '_descricao" id="' . $chave . '_descricao">' . esc_textarea($current_values->{$chave . '_descricao'}) . '</textarea><br>';
    }

    echo '<br><br>';
    echo '<input type="submit" name="submit" value="SALVAR">';
    echo '</form>';
}
